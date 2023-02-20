<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProductComments extends Component
{
    public $product;
    public $comment;
    public $newComment;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function saveComment()
    {
        $this->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'body' => $this->comment,
            'commentable_type' => get_class($this->product),
            'commentable_id' => $this->product->id,
            'user_id' => Auth::id()
        ]);

        $this->comment = '';

        $this->emit('commentAdded');
    }

    public function render()
    {
        return view('livewire.product-comments', [
            'comments' => $this->product->comments
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required'
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->body = $this->newComment;

        $this->product->comments()->save($comment)->with('success', 'El comentario se agregó con exito...');

        $this->newComment = '';

        $this->emit('commentAdded');
    }
}
