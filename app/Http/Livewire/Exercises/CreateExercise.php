<?php

namespace App\Http\Livewire\Exercises;

use App\Models\Exercise;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class CreateExercise extends Component
{
    use WithFileUploads;

    public $open = false;
    public $identifier;
    public $name, $description, $muscle_group, $type, $equipment = 'ninguno', $media;
    // public $url = false, $img = false;

    public function mount()
    {
        $this->identifier = rand();
    }

    public function render()
    {
        return view('livewire.exercises.create-exercise');
    }

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'muscle_group' => 'required',
        // 'type' => 'required',
        'equipment' => 'required',
        'media' => 'required',
    ];

    public function save()
    {
        $this->validate();
        if($this->media){
            $image = Cloudinary::upload($this->media->getRealPath(), ['folder' => 'gym/exercises']);
            $public_id = $image->getPublicId();
            $url = $image->getSecurePath();
        }

        $exercise = Exercise::create([
            'name' => $this->name,
            'description' => $this->description,
            'muscle_group' => $this->muscle_group,
            // 'type' => $this->type,
            'equipment' => $this->equipment,
            'media' => $url ?? null,
            'public_id_media' => $public_id ?? null
        ]);

        // Eliminamos la imagen temporal
        if($this->media)
            File::delete($this->media->getRealPath());

        $this->reset(['open', 'name', 'description', 'muscle_group', 'equipment', 'media']);
        $this->emitTo('exercises.show-exercises', 'render');

        $this->emit('alert', 'El ejercicio se creó satisfactoriamente');

    }

    // public function addUrl()
    // {
    //     $this->url = true;
    // }
    // public function addImg()
    // {
    //     $this->url = false;
    //     $this->img = true;
    // }


}
