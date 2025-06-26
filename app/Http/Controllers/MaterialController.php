<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listarMateriales()
    {
        $materiales = Material::with('categoria')->get();
        return response()->json($materiales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function crearMaterial(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|integer|unique:materials,codigo',
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'idCategoria' => 'required|exists:categorias,id',
        ]);
        $material = Material::create($validated);
        return response()->json($material, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function actualizarMaterial(Request $request, string $id)
    {
        $validated = $request->validate([
            'codigo' => 'integer|unique:materials,codigo,' . $id . ',codigo',
            'unidadMedida' => 'string',
            'descripcion' => 'string',
            'ubicacion' => 'string',
            'idCategoria' => 'exists:categorias,id',
        ]);
        $material = Material::where('codigo', $id)->firstOrFail();
        $material->update($validated);
        return response()->json($material);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
