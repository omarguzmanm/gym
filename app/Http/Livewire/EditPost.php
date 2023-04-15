<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    use WithFileUploads;

    public $open = false;
    public $post, $image, $identifier;   //Propiedad post

    protected $rules = [
        'post.title'    => 'required',
        'post.content'  => 'required'
    ];

    public function mount(Post $post){
        $this->post = $post;
        $this->identifier = rand();
    }

    // Metodo que actualiza la informacion del post
    public function save(){
        $this->validate();

        if($this->image){
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        //Borramos los valores de los inputs
        $this->reset(['open', 'image']);

        $this->identifier = rand();

        $this->emitTo('show-posts', 'render');

        $this->emit('alert', 'El post se actualizó satisfactoriamente');

    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
