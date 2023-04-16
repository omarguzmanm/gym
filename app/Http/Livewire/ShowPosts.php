<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;    //Paginación dinamica


class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $post, $image, $identifier;
    public $search = ''; 
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;
    public $open_edit = false;

    // Escucha el evento y pasamos el nombre del metodo que queremos escuchar
    // protected $listeners = ['render' => 'render'];
    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant'              =>          ['except' => '10'],
        'sort'              =>          ['except' => 'id'],
        'direction'         =>          ['except' => 'desc'],
        'search'            =>          ['except' =>  '']
    ];

    public function mount(){
        $this->identifier = rand();
        $this->post = new Post(); 
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $rules = [
        'post.title'    => 'required',
        'post.content'  => 'required'
    ];




    public function render()
    {
        if($this->readyToLoad){
            $posts = Post::where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate($this->cant); //Se quitó get para no mostrar todos los registros, se paginará de 10 en 10
        }else{
            $posts = [];
        }

        return view('livewire.show-posts', compact('posts'));
    }

    public function loadPost(){
        $this->readyToLoad =  true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
            
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        
        $this->sort = $sort;
    }    

    public function edit(Post $post){
        $this->post = $post;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();

        if($this->image){
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        //Borramos los valores de los inputs
        $this->reset(['open_edit', 'image']);

        $this->identifier = rand();

        $this->emit('alert', 'El post se actualizó satisfactoriamente');
    }

    public function delete(Post $post){
        Storage::delete([$post->image]);

        $post->delete();
    }
}
