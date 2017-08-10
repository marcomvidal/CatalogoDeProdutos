<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// Importação do model "Produto"
use App\Produto;

// Importação da classe "Session", usada pelo método update()
use Session;

// Importação do módulo de autenticação
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    public function index() {
    	$produtos = Produto::paginate(8);
    	return view('produto.index', array('produtos' => $produtos,'busca'=>null));
    }

    public function buscar(Request $request) {
        $produtos = Produto::where('titulo', 'LIKE', '%'.$request->input('busca').'%')->orwhere('descricao', 'LIKE', '%'.$request->input('busca').'%')->paginate();
        return view('produto.index', array('produtos' => $produtos,'busca'=>$request->input('busca')));
    }

    public function show($id) {
    	$produto = Produto::find($id);
    	return view('produto.show', array('produto' => $produto));
    }

    public function create() {
        // Verificação de autenticação
        if (Auth::check()) {
            return view('produto.create');
        }
        else {
            return redirect('login');
        }
    }

    public function store(Request $request) {
        // Verificação de autenticação
        if (Auth::check()) {
            // Validação
            $this->validate($request, [
                'referencia' => 'required|unique:produtos|min:3',
                'titulo' => 'required|min:3',
            ]);

            // Instanciação e armazenamento no banco de dados
            $produto = new Produto();
            $produto->referencia = $request->input('referencia');
            $produto->titulo = $request->input('titulo');
            $produto->descricao = $request->input('descricao');

            // Inserção do preço e tratamento para armazenamento
            $produto->preco = ConverteRealDolar($request->input('preco'));

            // Recebimento, tratamento e armazenamento de imagem
            if($request->hasFile('fotoproduto')) {
                $imagem = $request->file('fotoproduto');
                $nomearquivo = md5($produto->referencia) .".". $imagem->getClientOriginalExtension();
                $request->file('fotoproduto')->move(public_path('./img/produtos/'),$nomearquivo);
                $produto->foto = $nomearquivo;
            }
            else {
                $produto->foto = "Sem Imagem";
            }
            
            if($produto->save()){
                return redirect('produtos');
            }
        }
        else {
            return redirect('login');
        }

    }

    public function edit($id) {
        // Verificação de autenticação
        if (Auth::check()) {
            $produto = Produto::find($id);

            // Recuperação do preço do banco de dados e tratamento para exibição
            $produto->preco = str_replace(".", ",", $produto->preco);

            return view('produto.edit', array('produto' => $produto));
        }
        else {
            return redirect('login');
        }
    }

    public function update($id, Request $request) {
        // Verificação de autenticação
        if (Auth::check()) {
            // Validação
            $produto = Produto::find($id);
            $this->validate($request, [
                'referencia' => 'required|min:3',
                'titulo' => 'required|min:3',
            ]);
            // Recebimento, tratamento e armazenamento de imagem
            if($request->hasFile('fotoproduto')) {
                $imagem = $request->file('fotoproduto');
                $nomearquivo = md5($produto->referencia) .".". $imagem->getClientOriginalExtension();
                $request->file('fotoproduto')->move(public_path('./img/produtos/'),$nomearquivo);
            }
            // Atualização dos campos no banco de dados
            $produto->referencia = $request->input('referencia');
            $produto->titulo = $request->input('titulo');
            $produto->descricao = $request->input('descricao');

            // Inserção do preço e tratamento para armazenamento
            $produto->preco = ConverteRealDolar($request->input('preco'));

            $produto->save();
            Session::flash('mensagem', 'Produto alterado com sucesso.');
            return redirect()->back();
        }
        else {
            return redirect('login');
        }
    }

    public function destroy($id) {
        // Verificação de autenticação
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