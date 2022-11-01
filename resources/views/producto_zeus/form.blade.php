@extends('adminlte::page')

	@section('title', 'Dashboard')

	@section('content_header')
    <div class="container py-5">
        <div class="container">
            <h1>DATOS PRODUCTO</h1>
        </div>

        <form action="{{ route('producto_zeus.store') }}" method="post">    
        
        @csrf
            <div class="mb-3">
                <input id="sku" name="sku" type="hidden" value="{{ old('sku') ?? @$producto_zeus->code }}" >
                <div class="text-center">
                    <label for="sku" class="form-label">Sku</label>
                </div>
                <input type="text" name="sku1" class="form-control" placeholder="Sku de producto" value="{{ old('sku') ?? @$producto_zeus->code }}" disabled readonly>
                <p class="form-text">Sku del producto</p>
                @error('sku')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="text-center">
                    <label for="name" class="form-label">Nombre del producto</label>
                </div>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del producto" value="{{ old('name') ?? @$producto_zeus->name }}" >
                <p class="form-text">Escribe el nombre del producto</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput">Categorias(PAGINA WEB)</label>
                <select name="category" class="form-control">
                    <option value="" selected disabled>-- Elige una opción --</option>
                    @foreach($category as $item)
                            <option value="{{ old('category') ?? @$item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select> 
                @error('category')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="text-center">
                    <label for="description" class="form-label">Descripción</label>
                </div>
                <textarea name="description" cols="30" rows="4" class="form-control">{{ old('description') ?? @$producto_zeus->spec }}</textarea>
                <p class="form-text">Descripción del producto</p>
                @error('description')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="text-center">
                    <label for="regular_price" class="form-label">Precio producto</label>
                </div>
                <input type="number" name="regular_price" class="form-control" placeholder="Precio del producto" step="0.01" value="{{ old('regular_price') ?? @$producto_zeus->retail_price }}">
                <p class="form-text">Precio del producto</p>
                @error('regular_price')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <div class="text-center">
                    <label for="stock_quantity" class="form-label">Stock del producto</label>
                </div>
                <input type="number" name="stock_quantity" class="form-control" placeholder="Stock del producto" step="0" value="{{ old('stock_quantity') ?? @$producto_zeus->brand_id }}">
                <p class="form-text">Stock de producto</p>
                @error('stock_quantity')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-info">Guardar Producto</button>  
            
        </form>
    </div>
    @stop

	@section('css')
    		<link rel="stylesheet" href="/css/admin_custom.css">
	@stop

	@section('js')
        <script src="./resources/js/app.js"></script>
	@stop