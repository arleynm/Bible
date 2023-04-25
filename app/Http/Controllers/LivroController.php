<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        return Livro::all();
    }

    public function store(Request $request)
    {
        if(Livro::create($request->all())){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Livro Cadastrado com sucesso!'),
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => 'Erro ao cadastrar livro!'
        ], 404);
    }

    public function show(string $livro)
    {
        $livros=Livro::find($livro);
        if($livro){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Consulta realizada com sucesso!'),
                'livro'=> $livros,
                'testamento' => $livros->testamento,
                'versiculos' => $livros->versiculos
            ], 201);
        }
        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar consulta!'),
        ], 404);
    }

    public function update(Request $request, string $livro)
    {
        $livros = Livro::find($livro);
        if($livro){
            $livros->update($request->all());

            return response() ->json([
                'sucess' => '1',
                'message' => array('Livro atualizado com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Ocorreu um erro ao realizar atualizar o livro!'),
        ], 404);
    }

    public function destroy(string $livro)
    {
        if(Livro::destroy($livro)){
            return response() ->json([
                'sucess' => '1',
                'message' => array('Livro excluido com sucesso!'),
            ], 201);
        }

        return response() ->json([
            'sucess' => '0',
            'message' => array('Erro ao excluir livro!'),
        ], 404);
    }
}
