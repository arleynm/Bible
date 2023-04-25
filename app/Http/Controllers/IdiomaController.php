<?php

namespace App\Http\Controllers;
use App\Models\Idioma;
use Illuminate\Http\Request;
use App\Http\Resources\IdiomaResource;

class IdiomaController extends Controller
{
    public function index()
    {
        return Idioma::all();
    }

    public function store(Request $request)
    {
        if(Idioma::create($request->all())){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Idioma Cadastrado com sucesso!'),
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => 'Erro ao cadastrar idioma!'
        ], 404);
    }

    public function show(string $idioma)
    {
        $idiomas=Idioma::find($idioma);
        if($idiomas){
            $response = new IdiomaResource($idiomas);
            return response() ->json([
                'sucess' => '1',
                'message' => array('Consulta realizada com sucesso!'),
                'response' => $response
                // 'idioma'=> $idiomas,
                // 'traducoes' => $idiomas->traducoes,

            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar consulta!'),
        ], 404);
    }

    public function update(Request $request, string $idioma)
    {
        $idiomas = Idioma::find($idioma);
        if($idiomas){
            $idiomas->update($request->all());

            return response() ->json([
                'sucess' => '1',
                'message' => array('Idioma atualizado com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar atualizar o idioma!'),
        ], 404);
    }

    public function destroy(string $idioma)
    {
        if(Idioma::destroy($idioma)){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Idioma excluido com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Erro ao excluir idioma!'),
        ], 404);
    }
}
