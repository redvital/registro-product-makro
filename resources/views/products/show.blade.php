@extends('adminlte::page')

@section('title', 'MAKRO | Lista Productos')

@section('content_header')

    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Incidencia</h3>
    </x-card-header>
@stop

@section('content')


    <x-card-body>

        @include('sweetalert::alert')

        <div class="invoice p-3 mb-3" style="border-radius: 0.95rem">
            <div class="row invoice-info" style="border-radius: 0.95rem">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <small class="float-left">Ingreso:
                                    {{ $product->created_at }}</small>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="card elevation-2" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                            <h3 class="card-title text-blue text-underline">
                                <strong>
                                    <i class="fas fa-info-circle"></i> Informacion del producto <span class="undeline">{{ $product->name }}</span> 
                                </strong>
                            </h3>
                            <div class="card-tools" bis_skin_checked="1">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="card-body" bis_skin_checked="1" style="display: block;">
                            <div class="row">
                                <div class="col-md-6 invoice-col">
                                    <address>
                                        <strong>Responsable :</strong> {{ $product->user->name }}
                                        {{ $product->user->last_name }}<br>
                                        <strong>Tienda:</strong> {{ $product->store->name }}<br>
                                        <strong>Incidencia:</strong> {{ $product->incidence->type }}<br>
                                        @isset($product->sku)
                                        <strong>SKU:</strong> {{ $product->sku }}<br>
                                        @endisset
                                    </address>
                                </div>

                                <div class="col-md-6 invoice-col">
                                    <address>
                                        <strong>Estatus :@if ($product->status_id == 1)
                                                            <span class="elevation-2 badge badge-warning">{{ $product->status->type }}</span> 
                                                             <a class="float-right" href="{{ route('products.edit', $product) }}"> <i class="fas fa-edit"></i></a>
                                                        @elseif ($product->status_id == 2)
                                                            <span class="elevation-2 badge badge-info ">{{ $product->status->type }}</span>
                                                             <a class="float-right" href="{{ route('products.edit', $product) }}"> <i class="fas fa-edit"></i></a>
                                                        @elseif ($product->status_id == 3)
                                                            <span class="elevation-2 badge badge-primary ">{{ $product->status->type }}</span>
                                                             <a class="float-right" href="{{ route('products.edit', $product) }}"> <i class="fas fa-edit"></i></a>
                                                        @elseif ($product->status_id == 4)
                                                            <span class="elevation-2 badge badge-olive ">{{ $product->status->type }}</span>
                                                             <a class="float-right" href="{{ route('products.edit', $product) }}"> <i class="fas fa-edit"></i></a>
                                                        @elseif ($product->status_id == 5)
                                                            <span class="elevation-2 badge badge-success ">{{ $product->status->type }}</span>
                                                             <a class="float-right" href="{{ route('products.edit', $product) }}"> <i class="fas fa-edit"></i></a>
                                                        @endif
                                        </strong>
                                        <br>
                                        <strong>Categoria :</strong> {{ $product->category->name }}<br>
                                        <strong>Se registró :</strong> {{ $product->created_at->format('d-m-Y') }}<br>
                                        <strong>Se Actualizó :</strong> {{ $product->updated_at->format('d-m-Y') }}<br>
                                        <strong>Contacto :</strong> {{ $product->phone }}<br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <address>
                                        <strong>Observación :</strong> {{ $product->description }}

                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card elevation-2" bis_skin_checked="1">
                        <div class="card-header" bis_skin_checked="1">
                            <h3 class="card-title text-blue text-underline">
                                <strong>
                                    <i class="fas fa-image"></i>  Foto del producto
                                </strong>
                            </h3>
                            <div class="card-tools" bis_skin_checked="1">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                            
                        <div class="card-body" bis_skin_checked="1" style="display: block;">
                            <div class="row">
                                <div class="">
                                    <div class="">
                                        {{-- <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($product->image->url) }}" alt=""> --}}
                                        @isset($product->image)
                                            <img id="picture" class="img-fluid rounded mx-auto d-block" src="{{ Storage::url($product->image->url) }}"
                                                alt="" srcset="">
                                        @else
                                            <img id="picture" class="" src="https://via.placeholder.com/400x230"
                                                alt="" srcset="">
                                        @endisset

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="col-sm-6 mt-6 ">
                    <div class="row">
                        <div class="col-md-12">

                            <a href="{{ URL::previous() }}"
                                class="btn bg-navy btn-sm float-right mb-1 px-2 elevation-4"><i
                                    class="fas fa-reply mt-2 px-3"></i>
                            </a>

                        </div>
                    </div>
                    <hr class="mt-0">
                    <div class="row invoice-info" style="border-radius: 0.95rem">
                        <div class="col-sm-12 invoice-col">
                            <div class="card elevation-2" bis_skin_checked="1">
                                <div class="card-header" bis_skin_checked="1">
                                    <h3 class="card-title text-blue text-underline">
                                        <strong>
                                            <i class="fas fa-comments"></i> Comentarios...
                                        </strong>
                                    </h3>
                                    <div class="card-tools" bis_skin_checked="1">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="card-body" bis_skin_checked="1" style="display: block;">
                                    @livewire('comment-section', ['product' => $product])
                                    <hr>
                                    @livewire('product-comments', ['product' => $product])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mb-4">
            
        </div>
    </x-card-body>


@stop

@section('css')
    <style>
        .view-img {
            width: 400px;
            height: 250px;
        }

        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('js')
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/popper.min.js') }} "></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@stop
