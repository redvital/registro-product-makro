<div>
    <form wire:submit.prevent="addComment">
        <div class="form-group">
            <textarea class="form-control" rows="2" placeholder="Ingrese un comentario" wire:model="newComment"></textarea>
            @error('newComment')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn bg-navy float-right"> Guardar </button>
    </form>
</div>
