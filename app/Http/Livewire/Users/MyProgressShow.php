<?php

namespace App\Http\Livewire\Users;

use App\Models\Exercise;
use App\Models\PrRecord;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class MyProgressShow extends Component
{
    public $identifier;

    public function render()
    {
        $this->identifier = uniqid();
        return view('livewire.users.my-progress-show');
    }

}
