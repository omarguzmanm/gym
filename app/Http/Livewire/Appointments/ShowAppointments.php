<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ShowAppointments extends Component
{
    public $current_date;

    protected $listeners = ['render', 'delete'];


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
        $appointments = Appointment::with('users')->where('day', $this->current_date->format('Y/m/d'))->orderBy('hour', 'asc')->get();
        // dd($appointments);
        return view('livewire.appointments.show-appointments', compact('appointments'));
    }

    
    public function delete(Appointment $appointment)
    {   
        $appointment->delete();
    }
}
