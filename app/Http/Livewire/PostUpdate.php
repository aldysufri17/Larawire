<?php

namespace App\Http\Livewire;

use App\Models\post;
use Livewire\Component;

class PostUpdate extends Component
{
    public $name, $start, $end, $postId;
    protected $listeners = [
        'getPost' => 'editPost'
    ];

    public function render()
    {
        return view('livewire.post-update');
    }

    public function editPost($post)
    {
        $this->name = $post['name'];
        $this->start = $post['start_date'];
        $this->end = $post['end_date'];
        $this->postId = $post['id'];
    }

    public function update()
    {
        $this->validate([
            'name'   => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $update = post::find($this->postId)->update([
            'name' => $this->name,
            'start_date' => $this->start,
            'end_date' => $this->end,
        ]);

        $this->emit('handleUpdate', $update);
    }
}
