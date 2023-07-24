<?php

namespace App\Http\Livewire;
use App\Models\Analysis;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diet;


use Livewire\Component;

class DietUser extends Component
{
    public $user,  $gender, $age, $weight, $height, $activity, $goal, $meal_frecuency,
           $meal_schedule, $hours_sleep, $stress_levels,$substance_use,
           $regularly_consumed, $notes;

    public $name;
    public $email;

    public $id_analysis;
    public $description;
 
    protected $rules = [
        // 'id_analysis' => 'required',
        'user' => 'required',
        // 'name' => 'required|min:6',
        // 'email' => 'required|email',
    ];
 
    public function submit()
    {
        // $this->validate();
 
        // Execution doesn't reach here if validation fails.
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
    }
    public function render()
    {
        $analysis = Analysis::select('id','id_user')->get();
        // dd($analysis);
        $users = User::select('id','name')->get();
        return view('livewire.diet-user', compact('analysis', 'users'));
    }

}
