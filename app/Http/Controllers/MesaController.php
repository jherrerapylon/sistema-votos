<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesas = Mesa::all();

        return view("mesas.index", [
            "mesas" => $mesas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("mesas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:10",
            "address" => "required|max:100"
        ]);

        $mesa = new Mesa();
        $mesa->name = $request->input("name");
        $mesa->address = $request->input("address");
        $mesa->save();

        return view("mesas.create", [
            "msg" => "Mesa electoral creada correctamente"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mesa = Mesa::find($id);
        return view("mesas.edit", [
            "mesa" => $mesa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:10",
            "address" => "required|max:100"
        ]);

        $mesa = Mesa::find($id);
        $mesa->name = $request->input("name");
        $mesa->address = $request->input("address");
        $mesa->save();

        // Retorna a la vista de edición de la mesa editada
        return view("mesas.edit", [
            "mesa" => $mesa,
            "msg" => "Mesa electoral editada correctamente"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mesa = Mesa::find($id);
        $mesa->delete();

        return redirect("mesas");
    }
}
