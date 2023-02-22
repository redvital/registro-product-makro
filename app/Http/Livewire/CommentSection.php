<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Product;
use Livewire\Component;

class CommentSection extends Component
{
    public $body;
    public $product;
    public $comments;

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    protected $listeners = [
        'commentAdded' => 'render'
     ];
    public function render()
    {
        return view('livewire.comment-section', [
            'comments' => $this->product->comments()->with('user')->latest()->get(),
        ]);
    }

    public function storeComment()
    {
        $this->validate([
            'body' => 'required',
        ]);

        $comment = $this->product->comments()->create([
            'body' => $this->body,
            'user_id' => auth()->id(),
        ]);

        $this->comments = $this->product->comments;
        $this->body = '';

        session()->flash('success', 'Comment added successfully.');

        $this->emit('commentAdded', $comment->id);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $this->product = Product::find($this->product->id);

    }

}
