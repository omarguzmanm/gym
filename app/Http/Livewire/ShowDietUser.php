<?php

namespace App\Http\Livewire;

use App\Models\Analysis;
use App\Models\Diet;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class ShowDietUser extends Component
{
    public $search = '';
    public $diet, $identifier;

    protected $listeners = ['render', 'delete'];

    public function mount(){
        // $this->identifier = rand();
        $this->diet = new Diet(); 
    }

    protected $rules = [
        'diet.description' => 'required',
    ];


    public function render()
    {
        $userDiet = Analysis::with('users', 'diets')
            ->whereHas('users', function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%');
            })
            ->whereNotNull('id_diet')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.diets.show-diet-user', compact('userDiet'));
    }

    public function delete(Diet $diet){
        Analysis::where('id_diet', $diet->id)->update(['id_diet' => null]);
        $diet->delete();
    }


    public function reportDiet($id)
    {
        $diets = Analysis::with('diets', 'users')->where('id_user', $id)->get();
        $pdf = Pdf::loadView('reports.report-diet', compact('diets'));
        return $pdf->stream('usersReportPDF.pdf');
    }
}
