<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nombre = "mercado pago";
        return view('prueba', compact('nombre'));
    }


    public function recibirParametros($id){
        return "El id recibido es: " .$id;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return "Soy la vista crear"; //
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
    public function show()
    {
        return "Soy la vista"; //return view('prueba'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return "Soy la vista editar";  //
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
    public function destroy()
    {
        return "Soy la vista Destruir";  //
    }
}

