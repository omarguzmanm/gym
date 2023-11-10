<?php

namespace App\Http\Livewire\Diets;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
use Barryvdh\DomPDF\Facade\Pdf;
use Hashids\Hashids;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowDiets extends Component
{
    public $search = '';
    public $diet, $identifier;

    protected $listeners = ['render', 'delete'];

    public function mount()
    {
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
            ->whereNotNull('diet_id')
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('livewire.diets.show-diets', compact('userDiet'));
    }

    public function delete(Diet $diet)
    {
        Analysis::where('diet_id', $diet->id)->update(['diet_id' => null]);
        $diet->delete();
    }

    public function reportDiet($id)
    {
        $hashids = new Hashids('', 20);
        $idDecode = $hashids->decode($id);
        $diet = Analysis::with('diets', 'users')->where('user_id', $idDecode)->first();
        $dietId = $diet->diet_id;

        $dietUser = Diet::with([
            'foods' => function ($query) use ($dietId) {
                $query->select('foods.id', 'foods.name', 'foods.portion')
                    ->where('diet_id', $dietId);
            }
        ])->find($dietId);
        $meals = $dietUser->foods->unique('pivot.name')->pluck('pivot.name');


        // Creamos un array que contiene las comidas como índice y un array como valor
        $mealData = [];
        foreach ($meals as $meal) {
            $mealData[$meal] = [];
        }
        // Asignamos cada alimento de acuerdo a su comida
        foreach ($dietUser->foods as $food) {
            $mealData[$food->pivot->name][] = [
                'name' => $food->name,
                'portion' => $food->portion,
            ];
        }
        // dd($mealData);

        $pdf = Pdf::loadView('reports.report-diet', compact('diet', 'meals', 'dietUser', 'mealData'));
        return $pdf->stream('usersReportPDF.pdf');
    }

}