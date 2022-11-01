@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
	
<div class="content text-center">
    <div class="p-4 row">
        <div class="col-sm-12">
            <h1>PRODUCTOS WEB</h1>
        </div>
    </div>
</div>
              
<div class="col-md-12">
    <!--Contenido-->
        <div class="row"> 
            <div class="form-group col-md-6">
                <form action="{{ route('productoweb.index') }}" class="row g-3" method="get">
                    <div class="p-2 col-auto">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Productos Zeus">
                    </div>
                    <div class="p-2 col-auto">
                        <input type="text" class="form-control" name="busqueda" placeholder="Buscar:">
                    </div>
                    <div class="p-2 col-auto">
                        <button type="submit" vulue="enviar" class="btn btn-primary mb-3">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="form-group col-md-6 text-center">
                <div class="p-2 col-auto">
                    <a href="{{ route('producto_zeus.index') }}" class="btn btn-success">AGREGAR PRODUCTO</a>
                </div>
            </div>
        </div>
    <!--Fin Contenido-->
</div>
                
@if (Session::has('mensaje'))
                
<div class="alert alert-info mt-5">
    {{ Session::get('mensaje') }}
</div>
                
@endif

<div class="table-responsive">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">SKU</th>
                <th scope="col">NAME</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <th scope="col">STOCK</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>

        @forelse($productWeb as $item) 
            <tr>
                <td>{{ $item->id}}</td>
                <td>{{ $item->sku}}</td>
                <td>{{ $item->name}}</td>
                @foreach ($item->categories as $c)
                    <td>{{ $c->name}}</td>
                @endforeach  
                <td>{{ $item->description}}</td>
                <td>{{ $item->regular_price}}</td>
                <td>{{ $item->stock_quantity}}</td>
                <td>               
                    <a href="{{ route('productoweb.edit',$item->id) }}" class="btn btn-success">Editar</a>                 
                    <form action="{{ route('productoweb.destroy',$item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este Producto')">Eliminar P</button>
                    </form>
                </td>
            </tr> 
        @empty
            <tr>
                <td colspan="3">No hay registros</td>
            </tr>        
        @endforelse 

        </tbody>
    </table>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@stop

@section('js')
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
@stop