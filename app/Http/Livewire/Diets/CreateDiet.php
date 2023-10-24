<?php

namespace App\Http\Livewire\Diets;

use Livewire\Component;
use App\Models\Analysis;
use App\Models\Diet;
use App\Models\Food;

class CreateDiet extends Component
{
    public $open = false;
    public $user_id, $user;
    public $tmb = 0;
    public $name, $description, $food_id;
    public $mealCount = 0;

    public $groups = [], $foods = [], $meals = [];
    public $foodsArray = [
        ['food_id' => null, 'name' => null, 'group' => null, 'portion' => null]
    ];

    protected $rules = [
        'user_id' => 'required',
        'description' => 'required',
        // 'foodsArray.*.food_id' => 'required',
        // 'foodsArray.*.name' => 'required',
        // 'foodsArray.*.group' => 'required',
        // 'foodsArray.*.portion' => 'required'
    ];


    public function mount()
    {
        // $this->resetForm();
        $this->foods = collect();
    }

    public function updateFoodOptions($key)
    {
        $selectedGroup = $this->foodsArray[$key]['group'];

        // Obtenemos las comidas relacionadas con el grupo seleccionado
        $foods = Food::where('group', $selectedGroup)->get();
        $this->foodsArray[$key]['food_id'] = null; // Reinicia el valor de food_id
        $this->foods = $foods; // Actualiza las opciones de food_id
    }


    public function updatingOpen()
    {
        if ($this->open == true) {
            $this->reset(['open', 'user_id', 'name', 'description', 'foodsArray','mealCount']);
            $this->resetValidation();
        }
    }

    public function save()
    {
        $this->validate();

        $diet = Diet::create([
            'description' => $this->description,
            'type' => $this->user->goal,
            'kcal' => $this->tmb
        ]);
        // foreach ($this->foodsArray as $foodData) {
        //     if ($foodData['food_id']) {
        //         $diet->foods()->attach($foodData['food_id'], ['name' => $foodData['name']]);
        //     }
        // }
        foreach ($this->meals as $mealData) {
            dd($mealData);
            if ($mealData['foods']['food_id']) {
                $diet->foods()->attach($mealData['foods']['food_id'], ['name', $mealData['name']]);
            }
        }
        // $diet->foods()->attach($diet, ['name' => $this->name]);
        Analysis::where('user_id', $this->user_id)->whereNull('diet_id')->update(['diet_id' => $diet->id]);
        // $diet->analysis()->where('user_id', $this->user_id)->->toSql();
        // Analysis::update(['id_diet' =>$this->id_analysis]);

        //Reseteamos todos los valores del form/modal
        $this->reset(['open', 'user_id', 'description']);
        $this->emitTo('diets.show-diets', 'render');
        $this->emit('alert', 'La dieta se creó correctamente.');

    }

    public function tmb()
    {
        $this->user = Analysis::with('users')->where('user_id', $this->user_id)->first();

        if (!empty($this->user->id)) {
            if ($this->user->gender == 'masculino') {
                $tmb = 88.362 + (13.397 * $this->user->weight) + (4.799 * $this->user->height) - (5.677 * $this->user->age);
            } else {
                $tmb = 447.593 + (9.247 * $this->user->weight) + (3.098 * $this->user->height) - (4.330 * $this->user->age);
            }
            if ($this->user->activity == 'baja')
                $this->tmb = intval($tmb * 1.375);
            elseif ($this->user->activity == 'media')
                $this->tmb = intval($tmb * 1.55);
            elseif ($this->user->activity == 'alta')
                $this->tmb = intval($tmb * 1.725);
            elseif ($this->user->activity == 'superAlta')
                $this->tmb = intval($tmb * 1.9);
        }
    }
    public function updatePortion($key)
    {
        $selectedFoodId = $this->foodsArray[$key]['food_id'];

        // Obtiene la porción de la comida seleccionada
        $food = Food::find($selectedFoodId);

        if ($food) {
            $this->foodsArray[$key]['portion'] = $food->portion;
        } else {
            $this->foodsArray[$key]['portion'] = '';
        }
    }
    public function mealCount($count)
    {
        $this->mealCount = $count;
    }
    public function addFood()
    {
        $this->foodsArray[] = ['food_id' => null, 'name' => null];
    }
    public function addMeal()
    {
        $this->meals[] = [
            'name' => null,
            'foods' => [
                ['group' => null, 'food_id' => null, 'portion' => null],
                ['group' => null, 'food_id' => null, 'portion' => null],
                // ['group' => null, 'food_id' => null, 'portion' => null],
                // ['group' => null, 'food_id' => null, 'portion' => null],
                // ['group' => null, 'food_id' => null, 'portion' => null],
            ]
        ];
    }

    public function render()
    {
        $userAnalysis = Analysis::with('users')->get();
        // $foods = Food::whereJsonContains('info->Energia', '70 kcal')->get();
        // $foods = Food::all();
        $this->groups = Food::pluck('group')->unique();
        $this->tmb();
        // $this->infoFood();
        return view('livewire.diets.create-diet', compact('userAnalysis'));
    }

}
