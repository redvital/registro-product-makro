<div>
    <div class="row">
        <div class="col-md-11">
            <label for="status_id">Filtrar por estatus</label>
            <select class="form-control w-full select2" wire:model="statuFilter">
                <option value="">Todos los estatus</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->type }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1">
            <br>
            
            <a href="{{ route('stores.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 mt-2 elevation-4"><i
                    class="fas fa-reply mt-2 px-3"></i>
            </a>
        </div>
    </div>

    <table class="table table-striped table-hover text-nowrap">
        <thead>
            <tr class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                <th colspan="1"></th>

                <th scope="col" role="button" wire:click="order('name')">
                    Producto
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
                <th scope="col" role="button" wire:click="order('name')">
                    Tienda
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

                <th scope="col" role="button" wire:click="order('user_id')">
                    Usuario
                    @if ($sort == 'user_id')
                        @if ($direction == 'asc')
                            <i class="fas fas fa-sort-amount-down-alt float-right mt-1"></i>
                        @else
                            <i class="fas fa-sort-amount-down float-right mt-1"></i>
                        @endif
                    @else
                        <i class="fas fa-sort float-right mt-1"></i>
                    @endif
                </th>
                <th class="text-center">
                    Estatus
                </th>
                <th>
                    Registro
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="text-secondary font-weight-bold text-sm">
                    <td width="4px">
                        <a class="btn btn-default btn-sm elevation-2" style="border-color: rgb(158, 157, 157); "
                            href="{{ route('products.show', $product) }}"><i class="fas fa-eye text-yellow"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }}
                        </a>
                    </td>
                    <th>
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->store->name }}
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->user->name }}
                        </a>

                    </th>
                    <th class="text-center items-center">
                        @if ($product->status_id == 1)
                            <span class="elevation-4 badge badge-warning">{{ $product->status->type }}</span>
                        @elseif ($product->status_id == 2)
                            <span class="elevation-4 badge badge-info ">{{ $product->status->type }}</span>
                        @elseif ($product->status_id == 3)
                            <span class="elevation-4 badge badge-primary ">{{ $product->status->type }}</span>
                        @elseif ($product->status_id == 4)
                            <span class="elevation-4 badge badge-olive ">{{ $product->status->type }}</span>
                        @elseif ($product->status_id == 5)
                            <span class="elevation-4 badge badge-success ">{{ $product->status->type }}</span>        
                        @endif
                    </th>
                    <td>
                        {{ $product->created_at }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
