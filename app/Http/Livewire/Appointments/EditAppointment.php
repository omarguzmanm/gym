<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class EditAppointment extends Component
{
    public $open_edit = false;
    public $noHoursAvailable, $selectedHour;
    public $appointment;
    public $hourAvailable = false;
    protected $rules = [
        'appointment.day' => 'required|date',
        'appointment.hour' => 'required',
        'appointment.reason' => 'required',
    ];

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function render()
    {
        $sheduleSelected = Appointment::where('day', $this->appointment->day)->get(['day', 'hour']);

        $availableHours = range(9, 15);

        foreach ($sheduleSelected as $schedule) {
            $index = array_search($schedule->hour, $availableHours); //return the key
            if ($index !== false) {
                unset($availableHours[$index]);
            }
        }

        $this->noHoursAvailable = count($availableHours) === 0;

        return view('livewire.appointments.edit-appointment', compact('sheduleSelected', 'availableHours') );
    }


    public function edit(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->open_edit = true;
    }


    public function update()
    {
        $this->validate();

        $this->appointment->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'hourAvailable', 'selectedHour']);
        $this->emitTo('appointments.show-appointments', 'render');
        $this->emit('alert', 'La cita se actualizó satisfactoriamente');
    }

    public function selectHour($hour)
    {
        // dd($hour);
        $this->selectedHour = $hour;
        $this->appointment->hour = $hour;

    }
    public function toggleHourAvailable()
    {
        $this->hourAvailable = !$this->hourAvailable;
    }

}