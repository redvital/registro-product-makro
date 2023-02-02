<div>
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
                <th>
                    Registro
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($store->products as $product)
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
                    <td>
                        {{ $product->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
