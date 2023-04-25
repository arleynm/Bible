<?php

namespace App\Http\Controllers;
use App\Models\Testamento;
use Illuminate\Http\Request;


class TestamentoController extends Controller
{

    public function index()
    {
        return Testamento::all();
    }

    public function store(Request $request)
    {
        if(Testamento::create($request->all())){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Testamento Cadastrado com sucesso!'),
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => 'Erro ao cadastrar testamento!'
        ], 404);
    }

    public function show(string $testamento)
    {
        $testamento = Testamento::find($testamento);

        $response = response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao relizar consulta!'),
        ], 404);

        if($testamento){
            $response = response() ->json([
                'sucess' => '1',
                'message' => array('Consulta realizada com sucesso!'),
                'testamentos'=> $testamento,
                'livros' => $testamento->livros
            ], 201);
        }

        return $response;
    }

    public function update(Request $request, string $testamento)
    {
        $testamentos = Testamento::find($testamento);
        if($testamento){
            $testamento->update($request->all());

            return response() ->json([
                'sucess' => '1',
                'message' => array('Testamento atualizado com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar atualizar o testamento!'),
        ], 404);
    }

    public function destroy(string $testamento)
    {
        if(Testamento::destroy($testamento)){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Testamento excluido com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Erro ao excluir testamento!'),
        ], 404);
    }
}
