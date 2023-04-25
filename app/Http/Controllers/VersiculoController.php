<?php

namespace App\Http\Controllers;
use App\Models\Versiculos;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    public function index()
    {
        return Versiculos::all();
    }

    public function store(Request $request)
    {
        if(Versiculos::create($request->all())){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Versiculo Cadastrado com sucesso!'),
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => 'Erro ao cadastrar versiculo!'
        ], 404);
    }

    public function show(string $versiculo)
    {

        $versiculos=Versiculos::find($versiculo);
        if($versiculo){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Consulta realizada com sucesso!'),
                'versiculos'=> $versiculos,
                'livro' => $versiculos->livro
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar consulta!'),
        ], 404);
    }

    public function update(Request $request, string $versiculo)
    {

        $versiculos = Versiculos::find($versiculo);
        if($versiculo){
            $versiculos->update($request->all());

            return response() ->json([
                'sucess' => '1',
                'message' => array('Versiculo atualizado com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar atualizar o versiculo!'),
        ], 404);
    }

    public function destroy(string $versiculo)
    {

        if(Versiculos::destroy($versiculo)){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Versiculo excluido com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Erro ao excluir versiculo!'),
        ], 404);
    }
}
