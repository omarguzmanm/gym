<?php

namespace App\Http\Livewire;
use App\Models\Analysis;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diet;


use Livewire\Component;

class DietUser extends Component
{
    public $search = '';
    public $readyToLoad = false;

    public function render()
    {
        // $search = '';
        if ($this->readyToLoad) {
            $userDiet = Diet::where('id', $this->search)->get();
            // $userDiet = Diet::with([
            //     'analysis' => function ($query) use ($search) {
            //         $query->where('id_user', $search);
            //     }
            // ])->get();
            // dd($userDiet);
        }else{
            $userDiet = [];
        }
        // dd($userDiet);

        $userAnalysis = Analysis::with('user')->get();
        return view('livewire.diets.diet-user', compact('userAnalysis', 'userDiet'));
    }
    public function loadUser(){
        $this->readyToLoad =  true;
    }

}
