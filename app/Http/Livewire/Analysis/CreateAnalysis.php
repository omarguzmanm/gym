<?php

namespace App\Http\Livewire\Analysis;

use Livewire\Component;
use App\Models\User;
use App\Models\Analysis;

class CreateAnalysis extends Component
{
    public $user_id, $gender, $age, $weight, $height, $imc, $activity, $goal, $hours_sleep, $stress_levels, $substance_use,
    $regularly_consumed, $notes, $otherGoal;

    public $open = false;

    protected $rules = [
        'user_id' => 'required',
        'gender' => 'required',
        'age' => 'required',
        'weight' => 'required',
        'height' => 'required',
        // 'imc' => 'required',
        'activity' => 'required',
        'goal' => 'required',
        'regularly_consumed' => 'required',
        'notes' => 'required',
    ];


    public function save()
    {
        // dd($this->user);
        // Si la opción seleccionada es "otro", establece $otherGoal en blanco
        // if ($this->goal === 'otro') {
        //     $this->otherGoal = '';
        // }

        $this->validate();

        Analysis::create([
            'user_id' => $this->user_id,
            'age' => $this->age,
            'gender' => $this->gender,
            'weight' => $this->weight,
            'height' => $this->height,
            'imc' => $this->imc,
            'activity' => $this->activity,
            'goal' => $this->goal,
            'regularly_consumed' => $this->regularly_consumed,
            'notes' => $this->notes,
            // 'meal_frecuency' => $this->meal_frecuency,
            // 'meal_schedule' => $this->meal_schedule,
            // 'hours_sleep' => $this->hours_sleep,
            // 'stress_levels' => $this->stress_levels,
            // 'substance_use' => $this->substance_use,
        ]);

        $this->reset(['open','user_id', 'gender', 'age', 'weight', 'height', 'imc','activity', 'goal', 'regularly_consumed', 'notes']);

        $this->emitTo('analysis.show-analysis', 'render');
        $this->emit('alert', 'El analisis se creó correctamente.');


    }

    public function render()
    {
        // Calcular el IMC
        if(isset($this->height) && isset($this->weight) ){
            $height = $this->height / 100;
            $imc = $this->weight / ($height * $height);
            $this->imc = number_format($imc, 2);
        }
        $users = User::select('id', 'name')->orderBy('name', 'asc')->get();
        return view('livewire.analysis.create-analysis', compact('users'));
    }
}
