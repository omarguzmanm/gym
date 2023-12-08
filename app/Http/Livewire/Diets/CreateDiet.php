<?php

namespace App\Http\Livewire\Diets;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
use App\Models\Food;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateDiet extends Component
{
    public $open = false;
    public $analysis_id, $user;
    public $tmb = 0;
    public $name, $description;
    public $meals = [], $foods = [];
    public $count = 0; // contador para nombres únicos de comidas

    protected $rules = [
        'analysis_id' => 'required',
        'description' => 'required|string',
        'meals.*.name' => 'required',
        // 'meals.*.groups.*' => 'required',
        'meals.*.foods.*' => 'required',
        // 'meals.*.portions.*' => 'required',
    ];

    public function mount()
    {
        // $this->resetForm();
        $this->foods = collect();
    }

    public function updatingOpen()
    {
        if ($this->open == true) {
            $this->reset(['open', 'foods', 'name', 'description', 'meals', 'count']);
            $this->resetValidation();
        }
    }

    public function updateFoodOptions($mealId, $index)
    {
        // dd($this->meals[$mealId]['group'][$index]);
        $group = $this->meals[$mealId]['groups'][$index];
        $this->foods = Food::where('group', $group)->get();
    }


    public function updatePortion($mealId, $index)
    {
        $selectedFoodId = $this->meals[$mealId]['foods'][$index];
        $food = Food::find($selectedFoodId);
        $this->meals[$mealId]['portions'][$index] = $food->portion;
        // dd($this->meals[$mealId]['foods'][$index]);
    }

    public function addFood($foodId, $food)
    {
        // Encuentra la comida correcta por su ID (Asociación)
        $mealKey = array_search($foodId, array_column($this->meals, 'id'));
        $this->meals[$mealKey]['foods'][] = $food;
    }

    public function addMeal()
    {
        $this->meals[] = [
            'id' => $this->count,
            'name' => '',
            'foods' => [],
            'groups' => [],
            'portions' => [],
        ];
        $this->count++; // Incrementa el contador para nombres únicos
    }

    public function save()
    {
        $this->validate();

        $diet = Diet::create([
            'description' => $this->description,
            // 'type' => $this->user->goal,
            'kcal' => $this->tmb
        ]);
        foreach ($this->meals as $mealData) {
            $mealName = $mealData['name'];
            $foods = $mealData['foods'];

            foreach ($foods as $foodId) {
                // Asocia el alimento con el nombre de la comida a la tabla pivote
                $diet->foods()->attach($foodId, ['name' => $mealName]);
            }
        }
        $analysis = Analysis::find($this->analysis_id);
        $user = $analysis->users[0];
        $user_id = $user->id;

        // $user->analyses()->sync([$analysis->id => ['diet_id' => $diet->id, 'user_id' => $user_id]]);

        DB::table('analysis_diet_user')
            ->where('user_id', $user_id)
            ->where('analysis_id', $analysis->id)
            ->update(['diet_id' => $diet->id]);

        //Reseteamos todos los valores del form/modal
        $this->reset(['open', 'analysis_id', 'description', 'meals', 'count']);
        $this->emitTo('diets.show-diets', 'render');
        $this->emit('alert', 'La dieta se creó correctamente');

    }

    public function tmb()
    {
        $this->user = Analysis::with(['users' => function ($query) {
            $query->where('users.id', $this->analysis_id);
        }])->first();

        if (!empty($this->user->id)) {
            if ($this->user->gender == 'masculino') {
                $tmb = 88.362 + (13.397 * $this->user->weight) + (4.799 * $this->user->height) - (5.677 * $this->user->age);
            } else {
                $tmb = 447.593 + (9.247 * $this->user->weight) + (3.098 * $this->user->height) - (4.330 * $this->user->age);
            }
            if ($this->user->activity == 'Baja')
                $this->tmb = intval($tmb * 1.375);
            elseif ($this->user->activity == 'Media')
                $this->tmb = intval($tmb * 1.55);
            elseif ($this->user->activity == 'Alta')
                $this->tmb = intval($tmb * 1.725);
            elseif ($this->user->activity == 'Super Alta')
                $this->tmb = intval($tmb * 1.9);
        }
    }

    public function render()
    {
        // Relación inversa - Obtenemos resultados donde no existan la relaciób de la condiciob
        $userAnalysis = Analysis::with('users', 'diets')
            ->whereDoesntHave('diets', function ($query) {
                $query->where('diet_id', '!=', null);
            })
            ->get();

        // dd($userAnalysis);
        // $foods = Food::whereJsonContains('info->Energia', '70 kcal')->get();
        // $this->foods = Food::all();
        $groups = Food::pluck('group')->unique();
        $this->tmb();
        // $foods2 = Food::all(); 
        return view('livewire.diets.create-diet', compact('userAnalysis', 'groups'));
    }

}
