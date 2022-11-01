@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
        
<div class="content text-center">
    <div class="p-4 row">
        <div class="col-sm-12">
            <h1>PRODUCTOS ZEUS</h1>
        </div>
    </div>
</div>

<div class="col-md-12">
    <!--Contenido-->
        <div class="row"> 
            <div class="form-group col-md-6">
                <form action="{{ route('producto_zeus.index') }}" class="row g-3" method="get">
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
                <th scope="col">ID ZUES</th>
                <th scope="col">SKU</th>
                <th scope="col">NAME</th>
                <th scope="col">DESCRIPTION</th>
                <th scope="col">PRICE</th>
                <th scope="col">STOCK</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($producto_zeus as $p)
            
                @if ($p->id_woo == false)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->code}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->spec}}</td>
                    <td>{{$p->retail_price}}</td>
                    <td>{{$p->actual_inventory_qty}}</td>
                    <td>
                        <a href="{{ route('producto_zeus.edit',$p->id) }}" class="btn btn-warning">Agregar Web</a>
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

{{$producto_zeus->links()}}
        
    
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