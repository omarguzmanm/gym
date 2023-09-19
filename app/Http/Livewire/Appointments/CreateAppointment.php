<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAppointment extends Component
{
    public $day, $selectedHour, $reason, $noHoursAvailable;

    public function render()
    {
        $sheduleSelected = Appointment::where('day', $this->day)->get(['day', 'hour']);

        $availableHours = range(9, 15);
        
        foreach ($sheduleSelected as $schedule) {
            $index = array_search($schedule->hour, $availableHours); //return the key
            if ($index !== false) {
                unset($availableHours[$index]);
            }
        }

        $this->noHoursAvailable = count($availableHours) === 0;

        return view('livewire.appointments.create-appointment', compact('sheduleSelected', 'availableHours'));
    }

    protected $rules = [
        'day' => 'required',
        'selectedHour' => 'required',
        'reason' => 'required'
    ];

    public function save()
    {
        // dd($this->selectedHour);
        if (is_null($this->selectedHour)) {
            return session()->flash('alert', 'Selecciona una hora antes de continuar.');
        }
        $this->validate();
        $appointment = Appointment::create([
            'user_id' => Auth::user()->id,
            'day' => $this->day,
            'hour' => $this->selectedHour,
            'status' => 1
        ]);
        $this->resetForm();

        $this->emitTo('appointments.show-appointments', 'render');
        $this->emit('alert', 'La cita se creó correctamente.');
    }
    private function resetForm()
    {
        $this->day = null;
        $this->selectedHour = null;
        $this->reason = null;
    }

    public function selectHour($hour)
    {
        // dd($hour);
        $this->selectedHour = $hour;

    }

}