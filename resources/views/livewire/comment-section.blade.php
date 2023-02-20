<div>
    @foreach ($product->comments as $comment)
        <div class="card">
            <div class="card-body elevation-1" style="background-color: rgba(243, 244, 246, 1)">
                <strong><i class="far fa-user-circle text-blue"></i> - {{ $comment->user->name }} {{ $comment->user->last_name }} </strong>
                <br>
                {{ $comment->body }}
                <br>
                <small>
                    <cite>
                        {{ $comment->created_at->diffForHumans() }}
                    </cite>
                </small>
                @if(auth()->id() === $comment->user_id)
                <button type="submit" class="float-right text-danger btn btn-link formulario-eliminar" wire:click="destroy({{$comment}})"><i class="fas fa-trash-alt"></i></button>
                @endif
            </div>
        </div>
    @endforeach
    <span class="float-right">
        <small>
            <cite>

            ({{ $product->comments->count() }}) Comentarios...
            </cite>
        </small>
    </span>
</div>

{{-- @foreach($comments as $comment)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->user->name }}</h5>
            <p class="card-text">{{ $comment->body }}</p>
            <div class="d-flex justify-content-end">
                @if($comment->user_id === auth()->id())
                    <button class="btn btn-link" wire:click="editComment({{ $comment->id }})">Edit</button>
                    <button class="btn btn-link" wire:click="deleteComment({{ $comment->id }})">Delete</button>
                @endif
            </div>
        </div>
    </div>
@endforeach --}}

