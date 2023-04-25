<?php

namespace App\Http\Controllers;
use App\Models\Traducoes;
use Illuminate\Http\Request;
use App\Http\Resources\TraducoesCollection;

class TraducoesController extends Controller
{
    public function index()
    {
        return new TraducoesCollection(Traducoes::all());
    }

    public function store(Request $request)
    {
        if(Traducoes::create($request->all())){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Tradução Cadastrado com sucesso!'),
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => 'Erro ao cadastrar tradução!'
        ], 404);
    }

    public function show(string $traduco)
    {
        $traducos=Traducoes::find($traduco);
        if($traducos){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Consulta realizada com sucesso!'),
                'traducao'=> $traducos,
                'idioma'=> $traducos->idioma
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar consulta!'),
        ], 404);
    }

    public function update(Request $request, string $traduco)
    {
        $traducos = Traducoes::find($traduco);
        if($traducos){
            $traducos->update($request->all());

            return response() ->json([
                'sucess' => '1',
                'message' => array('Tradução atualizado com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar atualizar o tradução!'),
        ], 404);
    }

    public function destroy(string $traduco)
    {
        if(Traducoes::destroy($traduco)){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Tradução excluido com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Erro ao excluir tradução!'),
        ], 404);
    }
}
