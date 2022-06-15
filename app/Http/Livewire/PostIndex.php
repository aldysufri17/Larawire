<?php

namespace App\Http\Livewire;

use App\Models\post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    public $paginate = 5;
    public $search;
    public $status = false;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        // 'dataBaru' => 'NewCreate'
        'dataBaru',
        'handleUpdate'
    ];

    // public $data;
    public function render()
    {
        // $this->data = post::latest()->get();
        return view('livewire.post-index', [
            'data' => $this->search == null ?
                post::latest()->paginate($this->paginate) :
                post::where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate),
        ]);
    }

    // Store
    public function dataBaru($post)
    {
        session()->flash('message', 'Berhasil Menambah Daftar');
    }

    // Update
    public function handleUpdate()
    {
        $this->status = false;
        session()->flash('message', 'Berhasil Mengubah Data');
    }

    // Edit
    public function getPost($id)
    {
        $this->status = true;
        $post = post::find($id);
        $this->emit('getPost', $post);
    }

    // Delete
    public function postDelete($id)
    {
        post::find($id)->delete();
        session()->flash('message', 'Berhasil Menghapus Data');
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = "";
        $this->start = "";
        $this->end = "";
    }
}
