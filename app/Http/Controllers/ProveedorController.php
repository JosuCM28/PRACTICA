<?php

namespace App\Http\Controllers;
use App\Models\ProveedorModel;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$proveedores=ProveedorModel::get();
        $proveedor = ProveedorModel::select('*')->orderBy('idProveedor','desc');
        $limit=(isset($request->limit)) ? $request->limit :5;
        if(isset($request->search)){
            $proveedor = $proveedor
            ->where('idProveedor','like','%'.$request->search.'%')
            ->where('razonSocial','like','%'.$request->search.'%')
            ->where('nombreCompleto','like','%'.$request->search.'%')
            ->where('direccion','like','%'.$request->search.'%')
            ->where('telefono','like','%'.$request->search.'%')
            ->where('correo','like','%'.$request->search.'%')
            ->where('rfc','like','%'.$request->search.'%');
        }
        $proveedores = $proveedor->paginate($limit)->appends($request->all());

        return view('proveedores.index',compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
