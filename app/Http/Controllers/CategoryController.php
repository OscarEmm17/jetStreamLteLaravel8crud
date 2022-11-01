<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct(){ //protection Controller
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {  
        $busqueda = $request->busqueda;
        Paginator::useBootstrap();
        if (isset($busqueda)){ 
            $category = Category::where('name',$busqueda)->get();
        }
        else{
            $category = Category::all();
        } 
        
        return view('category.index')
        ->with('category', $category );
    }
    
    public function create()
    {   
        return view('category.form');
    }

    public function store(Request $request){
        
        $categoria = $request['id'];

        //Agregar categoria
        if (isset($categoria)) {
            $item_data[] = [
                'id' => $request['id'],
                'name' => $request['name'],
                'slug' => Str::slug($request['slug']),
                'description' => $request['description'],
            ];
                
            $data = [
                'update' => $item_data,
            ];
                
            Category::batch($data);
        
            Session::flash('mensaje', 'Se edito la categoria!');
        }
        //Ingresar categoria
        else{
            $item_data[] = [
                'name' => $request['name'],
                'slug' => Str::slug( $request['slug']),
                'description' => $request['description'],
            ];
                
            $data = [
                'create' => $item_data,
            ];
                
            Category::batch($data);
        
            Session::flash('mensaje', 'Se agrego la categoria!');
        }
        
        return redirect()->route('category.index');
    }

    public function edit($categoria)
    {
        $category = Category::find($categoria);
       
        return view('category.form')
            ->with('category', $category);
    }

    public function destroy($id)
    {   
        $data = [
            'delete' => [
                $id,
            ]
        ];
        
        Category::batch($data);

        Session::flash('mensaje', 'Producto ELIMINADO con exito!');
        
        return redirect()->route('productoweb.index');
    }
}
