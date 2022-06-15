<?php

namespace App\Http\Livewire;

use App\Models\post;
use Livewire\Component;

class PostCreate extends Component
{
    // public $data;
    // public function mount($data)
    // {
    //     dd($data);
    //     $this->data = $data;
    // }
    public $name;
    public $start;
    public $end;

    public function render()
    {
        return view('livewire.post-create');
    }

    public function store()
    {
        $this->validate([
            'name'   => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $post = post::create([
            'name' => $this->name,
            'start_date' => $this->start,
            'end_date' => $this->end,
        ]);

        $this->resetInput();
        $this->emit('dataBaru', $post);
    }

    private function resetInput()
    {
        $this->name = "";
        $this->start = "";
        $this->end = "";
    }
}
