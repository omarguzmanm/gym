<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class ShowAppointments extends Component
{
    public $current_date;

    protected $listeners = ['render'];


    public function mount()
    {
        $this->current_date = now();
    }


    public function nextDay()
    {
        $this->current_date->addDay();
    }

    public function previousDay()
    {
        $this->current_date->subDay();
    }

    public function render()
    {
        $appointments = Appointment::with('users')->where('day', $this->current_date->format('Y/m/d'))->get();
        // dd($appointments);
        return view('livewire.appointments.show-appointments', compact('appointments'));
    }
}
