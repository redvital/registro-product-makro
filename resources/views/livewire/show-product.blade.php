<div class="card elevation-5 col-md-12 col-sm-12 pt-3" style="border-radius: 0.95rem">
    <div class="card-header" style="padding: .75rem .25rem">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input wire:model="search" type="text" class="form-control mr-2" placeholder="Buscar">
            
                <a href="{{ route('products.create') }}" class="btn bg-navy btn-sm px-2 elevation-4"><i
                        class="fas fa-plus mt-2 px-3"></i>
                </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        @if ($products->count())
            <table class="table table-striped table-hover text-nowrap">
                <thead>
                    <tr class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                        <th scope="col" role="button"
                            wire:click="order('id')">
                            Nro.
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif

                        </th>
                        <th scope="col" role="button"
                            wire:click="order('name')">
                            Tipo
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button"
                            wire:click="order('store_id')">
                            Tienda
                            @if ($sort == 'store_id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" role="button"
                            wire:click="order('incidence_id')">
                            incidencia
                            @if ($sort == 'incidence_id')
                                @if ($direction == 'asc')
                                    <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-amount-down float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th>
                            Registro
                        </th>
                        
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="text-secondary font-weight-bold text-sm">
                            <td>
                                {{$product->id}}
                            </td>
                            <td>
                                {{ $product->name }}
                            </td>
                            <td>
                                {{$product->store->name}}
                            </td>
                            
                            <td>
                                {{$product->incidence->type}}
                            </td>
                            <td>
                                {{$product->created_at}}
                            </td>                               
                            
                            <td width="4px">
                                <div class="btn-group">
                                        <a class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;"
                                            href=" {{ route('products.edit', $product) }} "><i
                                                class="fas fa-edit text-blue"></i>
                                        </a>
                                        <a type="button" class="btn btn-default btn-sm"
                                            style="border-color: rgb(158, 157, 157); border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                                            <form class="formulario-eliminar"
                                                action="{{ route('products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-default btn-sm border-0 p-0 text-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="py-2 px-4 float-right ">
                {{ $products->links() }}
            </span>
        @else
            <div class="px-6 py-4 text-center text-sm">
                No existe ninguna coincidencia
            </div>
        @endif
    </div>
</div>
