@extends('adminlte::page')

	@section('title', 'Dashboard')

	@section('content_header')
    <div class="container py-5">
        <section class="content">
            <div class="container">
                @if (isset($category))
                    <h1>EDITAR CATEGORIA</h1>
                @else
                    <h1>AGREGAR CATEGORIA</h1>    
                @endif
            </div>
        </section>
        <div class="container py-5">        
            <section class="content">  
                <div class="col-md-12">
                    <!--Contenido-->
                        <div class="row"> 
                            <div class="form-group col-md-12">
                            
                                <form action="{{ route('category.store') }}" method="post">    
                            
                                    @csrf
                                    <div class="mb-3">
                                        <input id="id" name="id" type="hidden" value="{{ old('id') ?? @$category["id"]}}">
                                        <div class="text-center">
                                            <label for="name" class="form-label">Nombre</label>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="Categoria" value="{{ old('name') ?? @$category['name'] }}">
                                        <p class="form-text">Nombre de la Categoria</p>
                                        @error('sku')
                                            <p class="form-text text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                    @if (isset($category))
                                    
                                    <div class="mb-3">
                                        <div class="text-center">
                                            <label for="slug" class="form-label">Slug de la categoria</label>
                                        </div>
                                        <input type="text" name="slug" class="form-control" placeholder="Slug de la categoria" value="{{ old('slug') ?? @$category['slug'] }}">
                                        <p class="form-text">El "slug" es la versión amigable de la URL para el nombre. Suele estar en todo en minúsculas y contiene solo letras, números y guiones.</p>
                                        @error('slug')
                                            <p class="form-text text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>
                                    
                                    @endif

                                    <div class="mb-3">
                                        <div class="text-center">
                                            <label for="description" class="form-label">Descripción</label>
                                        </div>
                                        <textarea name="description" cols="30" rows="4" class="form-control">{{ old('description') ?? @$category['description'] }}</textarea>
                                        <p class="form-text">Descripción de la Categoria</p>
                                        @error('description')
                                            <p class="form-text text-danger">{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <a href="{{ route('category.index') }}" class="btn btn-success">REGRESAR</a>
                                    <button type="submit" class="btn btn-info">Guardar Categoria</button>  
                                </form>
                            </div>
                        </div>
                    <!--Fin Contenido-->
                </div>
            </div>
        </section>    
    </div>
    @stop

	@section('css')
    		<link rel="stylesheet" href="/css/admin_custom.css">
	@stop

	@section('js')
	@stop