<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAppointment extends Component
{
    public $patient, $day, $selectedHour, $reason, $noHoursAvailable;

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

        $patients = User::all();

        return view('livewire.appointments.create-appointment', compact('sheduleSelected', 'availableHours', 'patients'));
    }

    protected $rules = [
        // 'start_date' => 'date',
        'patient' => 'required',
        'day' => 'required|date',
        'selectedHour' => 'required',
        'reason' => 'required'
    ];

    public function save()
    {
        if (is_null($this->selectedHour)) {
            return session()->flash('alert', 'Selecciona una hora antes de continuar.');
        }
        $this->validate();
        
        if(now()->format('Y-m-d') <= $this->day ){
            Appointment::create([
                'user_id' => $this->patient,
                'day' => $this->day,
                'hour' => $this->selectedHour,
                'status' => 1
            ]);
            $this->resetForm();
            $this->emitTo('appointments.show-appointments', 'render');
            $this->emit('alert', 'La cita se creó correctamente.');
        }else{
                return session()->flash('alert', 'Selecciona un dia despues del ' . now()->format('d-m-Y'));
        }

    }
    private function resetForm()
    {
        $this->patient = null;
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