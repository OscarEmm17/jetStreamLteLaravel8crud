@extends('adminlte::page')

	@section('title', 'Dashboard')

	@section('content_header')
    <div class="container py-5 text-center">

    <h1>Editar Producto</h1>
   
    <form action="{{ route('productoweb.store') }}" method="post">
        
        @csrf

            <div class="mb-3">
                <label for="id" class="form-label">Id Zeus</label>
                <input type="text" name="id" class="form-control" placeholder="Sku de producto" value="{{ old('id_woo') ?? @$data["id"] }}" disabled readonly>
                <p class="form-text">Id Zeus del putos producto</p>
                @error('id')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sku" class="form-label">Sku</label>
                <input type="text" name="sku" class="form-control" placeholder="Sku de producto" value="{{ old('sku') ?? @$data["sku"] }}" disabled readonly>
                <p class="form-text">Sku del producto</p>
                @error('sku')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del producto" value="{{ old('name') ?? @$data["name"] }}">
                <p class="form-text">Escribe el nombre del producto</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput">Categorias(PAGINA WEB)</label>
                <select name="category" class="form-control">
                    @foreach($data['categories'] as $c)
                            <option value="{{ old('category') ?? @$c->id }}">{{ $c->name }}</option>
                    @endforeach
                    @foreach($category as $item)
                            @if ($item->id != $c->id)
                                <option value="{{ old('category') ?? @$item->id }}">{{ $item->name }}</option>   
                            @endif           
                    @endforeach
                    
                </select> 
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea name="description" cols="30" rows="4" class="form-control">{{ old('description') ?? @$data["description"] }}</textarea>
                <p class="form-text">Descripción del producto</p>
                @error('description')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="regular_price" class="form-label">Precio</label>
                <input type="number" name="regular_price" class="form-control" placeholder="Precio del producto" step="0.01" value="{{ old('regular_price') ?? @$data["regular_price"] }}">
                <p class="form-text">Precio del producto</p>
                @error('regular_price')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock_quantity" class="form-label">Stock</label>
                <input type="number" name="stock_quantity" class="form-control" placeholder="Stock del producto" step="0" value="{{ old('stock_quantity') ?? @$data["stock_quantity"] }}">
                <p class="form-text">Stock de producto</p>
                @error('stock_quantity')
                    <p class="form-text text-danger">{{ $message }} </p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-info">EDITAR PRODUCTO</button> 
            <a href="{{ route('productoweb.index') }}" class="btn btn-success">REGRESAR</a>
            
        </form>
    </div>
	@stop

	@section('css')
    		<link rel="stylesheet" href="/css/admin_custom.css">
	@stop

	@section('js')
    		<script> console.log('Hi!'); </script>
	@stop

