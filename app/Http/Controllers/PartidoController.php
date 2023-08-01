<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partidos = Partido::all();

        return view("partidos.index", [
            "partidos" => $partidos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("partidos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
        ]);

        $partido = new Partido();
        $partido->name = $request->input("name");
        $partido->save();

        return view("partidos.create", [
            "msg" => "Partido político creadao correctamente"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partido $partido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partido = Partido::find($id);
        return view("partidos.edit", [
            "partido" => $partido
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255"
        ]);

        $partido = Partido::find($id);
        $partido->name = $request->input("name");
        $partido->save();

        // Retorna a la vista de edición de la mesa editada
        return view("partidos.edit", [
            "partido" => $partido,
            "msg" => "Partido político editado correctamente"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partido = Partido::find($id);
        $partido->delete();

        return redirect("partidos");
    }
}
