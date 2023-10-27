<?php

namespace App\Http\Livewire\Diets;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
use Barryvdh\DomPDF\Facade\Pdf;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;

class ShowDiets extends Component
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
        // $id = Auth::id();
        // $hashids = new Hashids();
        // $id = $hashids->encode($id);
        // dd($id);

        $userDiet = Analysis::with('users', 'diets')
        ->whereHas('users', function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%');
        })
        ->whereNotNull('diet_id')
        ->orderBy('id', 'asc')
        ->paginate(10);
        return view('livewire.diets.show-diets', compact('userDiet'));
    }


    public function delete(Diet $diet){
        Analysis::where('diet_id', $diet->id)->update(['diet_id' => null]);
        $diet->delete();
    }


    public function reportDiet($id)
    {
        $hashids = new Hashids('', 20);
        $idDecode = $hashids->decode($id);
        $diets = Analysis::with('diets', 'users')->where('user_id', $idDecode)->get();
        $pdf = Pdf::loadView('reports.report-diet', compact('diets'));
        return $pdf->stream('usersReportPDF.pdf');
    }
    
}
