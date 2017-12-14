<?php

namespace App\Http\Controllers;

// Dependências do Framework
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Session;

// Dependências de Models
use App\Produto;


class ProdutosController extends Controller
{
    /**
     * Página principal. Exibe todos os produtos em ordem de criação.
     * 
     * @return  Produto $produto
     * @return  string  $busca
     */
    public function index()
    {
        $produtos = Produto::paginate(8);
        
    	return view('produto.index', array('produtos' => $produtos, 'busca' => null));
    }


    /**
     * Página principal, filtrada através de um texto digitado na barra de buscas.
     * 
     * @param   Request $request
     * @return  Produto $produto
     * @return  string  $busca
     */
    public function buscar(Request $request)
    {
        $produtos = Produto
            ::where('titulo', 'LIKE', '%'.$request->input('busca').'%')
            ->orwhere('descricao', 'LIKE', '%'.$request->input('busca').'%')
            ->paginate(4);
            
        return view('produto.index', array('produtos' => $produtos, 'busca' => $request->input('busca')));
    }

    
    /**
     * Exibe informações de um `Produto` em particular.
     * 
     * @param   integer $id
     * @return  Produto $produto
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        
    	return view('produto.show', array('produto' => $produto));
    }

    
    /**
     * Abre o formulário de cadastro de `Produto`.
     */
    public function create()
    {
        if (Auth::check()) {
            return view('produto.create');
        }
        else {
            return redirect('login');
        }
    }

    /**
     * Valida, adequa e persiste informações do `Produto` no banco de dados.
     * 
     * @param   Request $request
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'referencia' => 'required|unique:produtos|min:3',
                'titulo' => 'required|min:3',
            ]);

            $produto = new Produto();
            $produto->fill($request->all());

            $produto
                ->converteRealDolar()
                ->uploadFoto($request);
            
            if ($produto->save()) {
                return redirect('produtos');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Abre o formulário de edição de um `Produto`.
     * 
     * @param   integer $id
     */
    public function edit($id)
    {
        // Verificação de autenticação
        if (Auth::check()) {
            $produto = Produto::find($id);
            $produto->preco = $produto->converteDolarReal();

            return view('produto.edit', array('produto' => $produto));
        }
        else {
            return redirect('login');
        }
    }

    
    /**
     * Atualiza um registro de `Produto` no banco de dados.
     * 
     * @param   integer $id
     * @param   Request $request
     */
    public function update($id, Request $request)
    {
        if (Auth::check()) {
            $produto = Produto::find($id);

            $this->validate($request, [
                'referencia' => 'required|min:3',
                'titulo' => 'required|min:3',
            ]);

            $produto->fill($request->all());
            
            $produto
                ->converteRealDolar()
                ->uploadFoto($request);

            $produto->save();

            Session::flash('mensagem', 'Produto alterado com sucesso.');
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    
    /**
     * Exclui um registro de `Produto` do banco de dados.
     * 
     * @param   integer $id
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $produto = Produto::find($id);
            $produto->delete();
            Session::flash('mensagem', 'Produto excluído com sucesso.');
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }
}
