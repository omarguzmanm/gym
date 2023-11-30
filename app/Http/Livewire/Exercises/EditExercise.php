<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class EditExercise extends Component
{
    use WithFileUploads;

    public $exercise, $media;
    public $open_edit = false;

    protected $rules = [
        'exercise.name' => 'required',
        'exercise.description' => 'required',
        'exercise.muscle_group' => 'required',
        'media' => 'required|image|max:2048',
        // 'exercise.type' => 'required',
        'exercise.equipment' => 'required',
        // 'exercise.type' => 'required',
    ];
    public function mount(Exercise $exercise)
    {
        $this->exercise = $exercise;
    }

    public function edit(Exercise $exercise)
    {
        $this->exercise = $exercise;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();
        if ($this->media) {
            // Eliminamos la imagen anterior
            Cloudinary::destroy($this->exercise->public_id_media);
            // Subimos la nueva imagen
            $newImage = Cloudinary::upload($this->media->getRealPath(), ['folder' => 'gym/exercises'])->getSecurePath();
            $this->exercise->media = $newImage;
            // Eliminamos la imagen temporal
            File::delete($this->media->getRealPath());
        }
        $this->exercise->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'media']);
        $this->emitTo('exercises.show-exercises', 'render');
        $this->emit('alert', 'El ejercicio se actualizó satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.exercises.edit-exercise');
    }
}
