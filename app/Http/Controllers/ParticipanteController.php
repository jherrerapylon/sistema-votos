<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Mesa;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantes = Participante::all();

        return view("participantes.index", [
            "participantes" => $participantes
        ]);
    }

    /**
     * Display a listing of the resource filtering by voted.
     */
    public function votes($mesa_id)
    {
        if (isset($mesa_id)) {
            $mesa = Mesa::find($mesa_id);
            $haveNotVoted = Participante::where('voted', false)->where('mesa_id', $mesa_id)->get();
            $haveVoted = Participante::where('voted', true)->where('mesa_id', $mesa_id)->get();
        } else {
            $haveNotVoted = Participante::where('voted', false)->get();
            $haveVoted = Participante::where('voted', true)->get();
        }
        

        return view("votos.index", [
            "pendientes" => $haveNotVoted,
            "voted" => $haveVoted,
            "mesa" => $mesa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mesas = Mesa::all();
        return view("participantes.create", [
            "mesas" => $mesas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:50",
            "surname" => "required|max:50",
            "dni" => "required|max:9",
            //TODO: photo
            "mesa" => "required"
        ]);

        $participantes = new Participante();
        $participantes->name = $request->input("name");
        $participantes->surname = $request->input("surname");
        $participantes->dni = $request->input("dni");
        $participantes->mesa_id = $request->input("mesa");
        $participantes->save();

        return view("participantes.create", [
            "mesas" => Mesa::all(),
            "msg" => "Participante creado correctamente"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $participante = Participante::find($id);
        $mesas = Mesa::all();
        return view("participantes.edit", [
            "participante" => $participante,
            "mesas" => $mesas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:50",
            "surname" => "required|max:50",
            "dni" => "required|max:9",
            //TODO: photo
            "mesa" => "required"
        ]);

        $participante = Participante::find($id);
        $participante->name = $request->input("name");
        $participante->surname = $request->input("surname");
        $participante->dni = $request->input("dni");
        $participante->mesa_id = $request->input("mesa");
        $participante->save();

        return view("participantes.edit", [
            "participante" => $participante,
            "mesas" => Mesa::all(),
            "msg" => "Participante editado correctamente"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $participante = Participante::find($id);
        $participante->delete();

        return redirect("participantes");
    }

    /**
     * Vote participant
     */
    public function vote($id)
    {
        $participante = Participante::find($id);
        $participante->voted = true;
        $participante->save();

        return redirect("votos/mesa/" . $participante->mesa_id);
    }
}
