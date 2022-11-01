<?php

namespace App\Http\Controllers;

use Codexshaper\WooCommerce\Facades\Product;
use Codexshaper\WooCommerce\Facades\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductoZeusController extends Controller
{
    public function __construct(){ //protection Controller
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        Paginator::useBootstrap();

        $producto_zeus = DB::connection('sqlsrv')->table('starnet_products')
                                                 ->where('disabled','=', 0 ) 
                                                 ->where('brand_id','=', 18)
                                                 ->where('code','Like','%'.$busqueda.'%')
                                                 ->where('name','Like','%'.$busqueda.'%')
                                                 ->orderBy('code', 'desc')
                                                 ->paginate(10);

        return view('producto_zeus.index',['producto_zeus' => $producto_zeus]);
        
    }

    public function edit($id)
    {   
         
        $producto_zeus = DB::connection('sqlsrv')->table('starnet_products')->find($id);

        $category = Category::all();

        return view('producto_zeus.form', compact('producto_zeus', 'category'));
    }

    public function store(Request $request)
    { 
        $manage_stock = 1;

        $request->validate([
            'name' => 'required',
            'description' => 'required | max:255',
            'regular_price' => 'required | numeric',
            'stock_quantity' => 'required | numeric',
            'category' => 'required',               
        ]);

        $item_data[] = [
            'sku' => $request['sku'],
            'name' => $request['name'],
            'description' => $request['description'],
            'regular_price' => $request['regular_price'],
            'manage_stock' => $manage_stock,
            'stock_quantity' => $request['stock_quantity'],
            'categories' => [
                [
                    'id' => $request['category']
                ]
            ]
        ];
        
        $data = [
            'create' => $item_data,
        ];

        //We enter the data in Woocomerce and choose your id
        $produc = Product::batch($data);

        
        foreach($produc as $objet){
            foreach($objet as $key)
            {
                $id1 = $key->id;
                $sku1 = $key->sku;
            }
        }
        
        $affected = DB::connection('sqlsrv')->table('starnet_products')
            ->where('code', $sku1)
            ->update(['id_woo' => $id1]);

        Session::flash('mensaje', 'Producto editado con exito!');
        
        return redirect()->route('productoweb.index');
    }   
}
