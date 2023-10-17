<?php

namespace App\Http\Livewire\Analysis;


use App\Models\Analysis;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination; //Paginación dinamica
use Barryvdh\DomPDF\Facade\Pdf;


class ShowAnalysis extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';
    public $analysis, $identifier;
    public $sort = 'id';
    public $readyToLoad = false;

    public $direction = 'desc';
    public $cant = '10';
    public $open_edit = false;
    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];

    protected $listeners = ['render', 'delete'];

    public function mount()
    {
        $this->identifier = rand();
        $this->analysis = new Analysis();
    }
    public function render()
    {
        
        // $users = User::all();
        // if ($this->readyToLoad) {
            $userAnalysis = Analysis::with('users', 'diets')
                ->whereHas('users', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%');
                })
                // ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        // } else {
        //     $userAnalysis = [];
        // }
        return view('livewire.analysis.show-analysis', compact('userAnalysis'));
    }

    public function loadUser()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        $this->sort = $sort;
    }
    public function delete(Analysis $analysis){
        // Analysis::where('id_diet', $diet->id)->update(['id_diet' => null]);
        $analysis->delete();
    }

    public function reportAnalysis($id)
    {
        $ticket = Pdf::loadView('reports.report-analysis');
        return $ticket->stream('Analisis.pdf');
    }
}
