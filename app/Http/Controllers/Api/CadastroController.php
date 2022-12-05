<?php
namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Models\Cadastro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroRequest;

class CadastroController extends Controller
{
    private $cadastro;
    public function __construct(Cadastro $cadastro)
    {
        $this->cadastro = $cadastro;
    }
    public function index()
    {
        $cadastro = $this->cadastro->paginate('10');
        return response()->json($cadastro, 200);
    }

    public function show($id)
    {
        try {
            $cadastro = $this->cadas->findOrFail($id);
            return response()->json([
                'data' => [$cadastro]], 200);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $cadastro = $this->cadastro->create($data);
            return response()->json([
                'data' => [
                    'msg' => 'Produto cadastrado com sucesso'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function update($id, Request $request)
    {
        $data = $request->all();
        try {
            $cadastro = $this->cadastro->findOrFail($id); 
            $cadastro->update($data);
            return response()->json([
                'data' => [
                    'msg' => 'Produto Atualizado com sucesso'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function destroy($id)
    {
        try {
            $cadastro = $this->cadastro->findOrFail($id);
            $cadastro->delete();
            return response()->json([
                'data' => ['msg' => 'Produto excluido com sucesso']], 200);
        } catch (\Exception $e) {
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }
}