<?php

namespace App\Http\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class PostForm extends Component
{
    public Post $post;

    public $title;
    public $content;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    protected function getMessages()
    {
        return [
            'title.required' => 'Please type title',
            'content.required' => 'Please enter content',
        ];
    }

    public function mount()
    {
        $this->title = $this->post->title;
        $this->content = $this->post->content;
    }

    public function save()
    {
        $this->validate();

        $this->post->title = $this->title;
        $this->post->content = $this->content;
        $this->post->slug = Str::slug($this->title);

        $this->post->save();

        session()->flash('post.edit.success', 'Save successfully!');
    }

    public function render()
    {
        return view('livewire.forms.post-form');
    }
}
