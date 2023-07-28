<?php

namespace App\Http\Livewire;


use App\Models\Analysis;
use App\Models\Diet;
use Livewire\Component;

class ShowDietUser extends Component
{
    public $search = '';
    public $readyToLoad = false;


    public function render()
    {
        // $search = '';
        // if ($this->readyToLoad) {
        //     $userDiet = Diet::with([
        //         'analysis' => function ($query) use ($search) {
        //             $query->where('id_user', $search);
        //         }
        //     ])->get();
        // }else{
        //     $userDiet = [];
        // }
        // dd($userDiet);

        return view('livewire.diets.show-diet-user' );
    }
}