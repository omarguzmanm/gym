<?php

namespace App\Http\Livewire;

use App\Models\Analysis;
use App\Models\User;
use Illuminate\Http\Request;

use Livewire\Component;

class AnalysisUser extends Component
{

    public $user, $gender, $age, $weight, $height, $activity, $goal, $meal_frecuency,
    $meal_schedule, $hours_sleep, $stress_levels, $substance_use,
    $regularly_consumed, $notes;


    protected $rules = [
        // 'id_analysis' => 'required',
        'age' => 'required',
        // 'name' => 'required|min:6',
        // 'email' => 'required|email',
    ];

    protected $messages = [
        'age.required' => 'La edad es requerida'
    ];

    public function submit()
    {

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

        session()->flash('message', 'El análisis fue creado con exito.');

    }
    public function render()
    {
        $users = User::select('id', 'name')->get();
        return view('livewire.analysis-user', compact('users'));
    }
}