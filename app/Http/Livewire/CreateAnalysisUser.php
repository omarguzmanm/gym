<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Analysis;
use Livewire\Component;

class CreateAnalysisUser extends Component
{
    public $user, $gender, $age, $weight, $height, $activity, $goal, $meal_frecuency,
    $meal_schedule, $hours_sleep, $stress_levels, $substance_use,
    $regularly_consumed, $notes, $otherGoal;

    public $showForm = false;

    protected $rules = [
        // 'id_analysis' => 'required',
        'age' => 'required',
        // 'name' => 'required|min:6',
        // 'email' => 'required|email',
    ];

    protected $messages = [
        'age.required' => 'La edad es requerida'
    ];

    // Constructor del componente para establecer todas las propiedades en su estado inicial
    public function __construct()
    {
        $this->resetForm();
    }

    public function mount()
    {
       // Restablecer las propiedades cuando se monta el componente
        $this->resetForm();
         // Propiedades que deseas inicializar con la opción predeterminada 'selecciona'
         $defaultProperties = ['user','gender','activity','goal',
            'meal_frecuency','stress_levels','substance_use',];

        foreach ($defaultProperties as $property) {
            $this->{$property} = $this->{$property} ?? 'selecciona';
        }
    }
    public function resetForm()
    {
        $this->user = null;
        $this->gender = null;
        $this->age = null;
        $this->weight = null;
        $this->height = null;
        $this->activity = null;
        $this->goal = null;
        $this->meal_frecuency = null;
        $this->meal_schedule = null;
        $this->hours_sleep = null;
        $this->stress_levels = null;
        $this->substance_use = null;
        $this->regularly_consumed = null;
        $this->notes = null;
        $this->otherGoal = null;
    }


    public function submit()
    {
        // dd($this->user);
        // Si la opción seleccionada es "otro", establece $otherGoal en blanco


        $this->validate();

        Analysis::create([
            'id_user' => $this->user,
            'age' => $this->age,
            'gender' => $this->gender,
            'weight' => $this->weight,
            'height' => $this->height,
            'activity' => $this->activity,
            'notes' => $this->notes,
            'goal' => $this->goal,
            'meal_frecuency' => $this->meal_frecuency,
            'meal_schedule' => $this->meal_schedule,
            'regularly_consumed' => $this->regularly_consumed,
            'hours_sleep' => $this->hours_sleep,
            'stress_levels' => $this->stress_levels,
            'substance_use' => $this->substance_use,
        ]);
        // if ($this->goal === 'otro') {
        //     $this->otherGoal = '';
        // }

        session()->flash('messageAnalysis', 'El análisis fue creado con exito.');
    }

    public function mostrarFormulario()
    {
        $this->showForm = true;
    }

    public function mostrarTabla()
    {
        $this->showForm = false;
    }

    public function render()
    {
        $users = User::select('id', 'name')->get();
        return view('livewire.analysis.create-analysis-user', compact('users'));
    }
}
