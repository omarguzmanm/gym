<?php

namespace App\Http\Livewire\Analysis;

use App\Models\Analysis;
use App\Models\User;
use Livewire\Component;

class EditAnalysis extends Component
{
    public $open_edit = false;
    public $analysis;

    protected $rules = [
        'analysis.user_id' => 'required',
        'analysis.gender' => 'required',
        'analysis.age' => 'required',
        'analysis.weight' => 'required',
        'analysis.height' => 'required',
        'analysis.imc' => 'required',
        'analysis.activity' => 'required',
        'analysis.goal' => 'required',
        'analysis.regularly_consumed' => 'required',
        'analysis.notes' => 'required',
    ];
    public function mount(Analysis $analysis)
    {
        $this->analysis = $analysis;
    }

    public function render()
    {
        // Calcular el IMC
        if (isset($this->analysis->height) && isset($this->analysis->weight)) {
            $height = $this->analysis->height / 100;
            $imc = $this->analysis->weight / ($height * $height);
            $this->analysis->imc = number_format($imc, 2);
        }
        $users = User::all();
        return view('livewire.analysis.edit-analysis', compact('users'));
    }

    public function edit(Analysis $analysis)
    {
        $this->analysis = $analysis;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->analysis->save();
        // $this->open_edit = false;  Cierra el modal después de la actualización

        //Borramos los valores de los inputs
        $this->reset(['open_edit']);
        $this->emitTo('analysis.show-analysis', 'render');
        $this->emit('alert', 'El analisis se actualizó satisfactoriamente');
    }

}