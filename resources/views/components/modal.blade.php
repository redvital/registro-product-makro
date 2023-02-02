<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-blue">Registrar un nuevo producto</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.productos.store']) !!}

                @include('admin.productos.partials.form')
                {!! Form::submit('Guardar producto', ['class' => 'btn bg-navy btn-block']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>