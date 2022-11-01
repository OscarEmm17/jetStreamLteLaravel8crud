<?php

namespace App\Http\Controllers;

use Codexshaper\WooCommerce\Facades\Product;
use Codexshaper\WooCommerce\Facades\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductWebController extends Controller
{
    public function __construct(){ //protection Controller
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;

        Paginator::useBootstrap();
        if (isset($busqueda)){
            $productWeb = Product::where('sku',$busqueda)->get();
        }
        else{
            $productWeb = Product::all();
        }
        
        return view('productoweb.index')
        ->with('productWeb', $productWeb);
    }

    public function store(Request $request)
    {    
        $request->validate([
            'name' => 'required',
            'description' => 'required | max:255',
            'regular_price' => 'required | numeric',
            'stock_quantity' => 'required | numeric',
            'category' => 'required',               
        ]);
            
        $item_data[] = [
            'id' => $request['id'],
            'name' => $request['name'],
            'description' => $request['description'],
            'regular_price' => $request['regular_price'],
            'stock_quantity' => $request['stock_quantity'],
            'categories' => [
                [
                    'id' => $request['category']
                ]
            ]
        ];
            
        $data = [
            'update' => $item_data,
        ];
            
        Product::batch($data);
    
        Session::flash('mensaje', 'Producto editado con exito!');

        return redirect()->route('productoweb.index');
    }
	
    public function edit($productoweb)
    {
        $data = Product::find($productoweb);
        $category = Category::all();
        return view('productoweb.form', compact('data', 'category'));
    }

    public function destroy($id)
    {   
        $data = [
            'delete' => [
                $id,
            ]
        ];
        
        $p = Product::batch($data);
        
        foreach($p as $objet){      //Let's get from the array the id that I generated
            foreach($objet as $key){
                $s = $key->sku;
            }
        }
        $affected = DB::connection('sqlsrv')->table('starnet_products')      //we enter the id to the database
              ->where('code', $s)
              ->update(['id_woo' => 0 ]);


        Session::flash('mensaje', 'Producto ELIMINADO con exito!');
        
        return redirect()->route('productoweb.index');
    }
}