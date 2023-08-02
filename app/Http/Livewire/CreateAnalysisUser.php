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

    public $open = false;

    protected $rules = [
        // 'id_analysis' => 'required',
        'age' => 'required',
        // 'name' => 'required|min:6',
        // 'email' => 'required|email',
    ];

    protected $messages = [
        'age.required' => 'La edad es requerida'
    ];


    public function mount()
    {
       // Restablecer las propiedades cuando se monta el componente
        // $this->resetForm();
         // Propiedades que deseas inicializar con la opción predeterminada 'selecciona'
         $defaultProperties = ['user','gender','activity','goal',
            'meal_frecuency','stress_levels','substance_use',];

        foreach ($defaultProperties as $property) {
            $this->{$property} = $this->{$property} ?? 'selecciona';
        }
    }


    public function submit()
    {
        // dd($this->user);
        // Si la opción seleccionada es "otro", establece $otherGoal en blanco
        if ($this->goal === 'otro') {
            $this->otherGoal = '';
        }

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

        $this->reset(['open','user', 'gender', 'age', 'weight', 'height', 'activity', 'goal', 'meal_frecuency',
        'meal_schedule', 'hours_sleep', 'stress_levels', 'substance_use',
        'regularly_consumed', 'notes', 'otherGoal']);

        $this->emitTo('show-analysis-user', 'render');
        $this->emit('alert', 'El analisis se creó correctamente.');


    }


    public function render()
    {
        $users = User::select('id', 'name')->get();
        return view('livewire.analysis.create-analysis-user', compact('users'));
    }
}
