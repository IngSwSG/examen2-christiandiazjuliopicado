<?php

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente', function () {

    $categoria = Categoria::create(['nombre' => 'Categoria Test']);
    $data = [
        'codigo' => 999,
        'unidadMedida' => 'unidad',
        'descripcion' => 'Material de prueba',
        'ubicacion' => 'Bodega Test',
        'idCategoria' => $categoria->id,
    ];


    $response = $this->post('/api/addMateriales', $data);


    $response->assertStatus(201);
    $this->assertDatabaseHas('materials', [
        'codigo' => 999,
        'descripcion' => 'Material de prueba',
    ]);
});
