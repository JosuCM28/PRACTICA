<?php

namespace App\Http\Controllers;
use App\Models\ProveedorModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\Facade\Pdf;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$proveedores=ProveedorModel::get();
        $proveedores = ProveedorModel::select('*')->orderBy('idProveedor','desc');
        $limit=(isset($request->limit)) ? $request->limit :10;
        if(isset($request->search)){
            $proveedores = $proveedores
            ->where('idProveedor','like','%'.$request->search.'%')
            ->orWhere('razonSocial','like','%'.$request->search.'%')
            ->orWhere('nombreCompleto','like','%'.$request->search.'%')
            ->orWhere('direccion','like','%'.$request->search.'%')
            ->orWhere('telefono','like','%'.$request->search.'%')
            ->orWhere('correo','like','%'.$request->search.'%')
            ->orWhere('rfc','like','%'.$request->search.'%');
        }
        $proveedores = $proveedores->paginate($limit)->appends($request->all());

        return view('proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedor = new proveedorModel();
        $proveedor = $this->createUpdateProveedor($request, $proveedor);
        return redirect()
        ->route('proveedores.index')
        ->with('message','Se ah creao el registro Correctamente.');

    }


    public function createUpdateProveedor(Request $request, $proveedor){
        $proveedor->razonSocial=$request->razonSocial;
        $proveedor->nombreCompleto=$request->nombreCompleto;
        $proveedor->direccion=$request->direccion;
        $proveedor->telefono=$request->telefono;
        $proveedor->correo=$request->correo;
        $proveedor->rfc=$request->rfc;
        $proveedor->save();
        return $proveedor;




    }
    /**.ce.
     */
    public function show(string $id)
    {
        $proveedor=ProveedorModel::where('idProveedor', $id)->firstOrFail();
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor=ProveedorModel::where('idProveedor', $id)->firstOrFail();
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedor=ProveedorModel::where('idProveedor', $id)->firstOrFail();
        $proveedor=$this->createUpdateProveedor( $request, $proveedor);
        return redirect()
        ->route('proveedores.index')
        ->with('message','Se ah actualizado el registro correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor=ProveedorModel::findOrFail($id);

        try{
            $proveedor->delete();
            return redirect()
            ->route('proveedores.index')
            ->with('message', 'registro eliminado correctamente.');
            }catch(QueryException $e){
            return redirect()
            ->route('proveedores.index')
            ->with('danger', 'registro relacionado imposible de eliminar');
        }
    }

    public function exportPDF() 
    {
        $proveedores = ProveedorModel::get();
        $pdf = Pdf::loadView('proveedores.exportPDF', compact('proveedores'));

        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
