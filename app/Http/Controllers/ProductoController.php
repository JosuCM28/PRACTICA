<?php

namespace App\Http\Controllers;
use App\Models\ProductoModel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->orderBy('idProducto','desc');
        $limit=(isset($request->limit)) ? $request->limit :5;
        if(isset($request->search)){
            $productos = $productos    
            ->where('idProducto','like','%'.$request->search.'%')
            ->where('nombre','like','%'.$request->search.'%')
            ->where('descripcion','like','%'.$request->search.'%')
            ->where('precio','like','%'.$request->search.'%')
            ->where('expiracion','like','%'.$request->search.'%')
            ->where('stock','like','%'.$request->search.'%');
        }
        $productos = $productos->paginate($limit)->appends($request->all());
        return view('productos.index', compact('productos'));

    }

    public function create()
    {
        return view('productos.create');
    }


    public function store(Request $request)
    {
        $productos = new productoModel();
        $productos = $this->createUpdateProducto($request, $productos);
        return redirect()
        ->route('productos.index')
        ->with('message','Se ah creado el registro Correctamente.');
    }


    public function createUpdateProducto(Request $request, $productos)
    {
        $productos->nombre=$request->nombre;
        $productos->descripcion=$request->descripcion;
        $productos->precio=$request->precio;
        $productos->expiracion=$request->expiracion;
        $productos->stock=$request->stock;
        $productos->save();
        return $productos;
    }

    public function show(string $id)
    {
        $productos=ProductoModel::where('idProducto', $id)->firstOrFail();
        return view('productos.show', compact('productos'));
    }

    public function edit(string $id)
    {
        $productos=ProductoModel::where('idProducto', $id)->firstOrFail();
        return view('productos.edit', compact('productos'));
    }

    public function update (Request $request, string $id)
    {
        $productos=ProductoModel::where('idProducto', $id)->firstOrFail();
        $productos=$this->createUpdateProducto($request, $productos);
        return redirect()
        ->route('productos.index')
        ->with('message','Se ah actualizado elregistro correctamente.');
    }


    public function destroy(string $id)
    {
        $productos=ProductoModel::findOrFail($id);
        try{
            $productos->delete();
            return redirect()
            ->route('productos.index')
            ->with('message','registro eliminado correctamente.');
        }catch(QueryException $e){
            return redirect()
            ->route('productos.index')
            ->with('danger','registro relacionado imposible de eliminar');
        }

    }

    public function exportPDF() 
    {
        $productos = ProductoModel::get();
        $pdf = Pdf::loadView('productos.exportPDF', compact('productos'));

        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}


