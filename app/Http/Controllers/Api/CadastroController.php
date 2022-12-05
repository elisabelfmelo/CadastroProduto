<?php
namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Models\Cadastro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroRequest;
use App\Cadastro;

class CadastroController extends Controller
{
    private $cadastro;
    public function __construct(Cadastro $cadastro)
    {
        $this->cadastro = $cadastro;
    }
    public function index()
    {
{
        $cadastro= Cadastro::all();
        return view('cadastro.index', compact('cadastro') );
 }
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
        $url = $request->get('redirect_to', route('cadastro.index'));
        if (! $request->has('cancel') ){
            $dados = $request->all();
            Cadastro::create($dados);
            $request->session()->flash('message', 'Produto cadastrado com sucesso');
        }
        else
        {
            $request->session()->flash('message', 'Operação cancelada pelo usuário');
        }
        return redirect()->to($url);

    }
    public function create()
{
    //
    return view('cadastro.create', ['action'=>route('cadastro.store'), 'method'=>'post']);
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
