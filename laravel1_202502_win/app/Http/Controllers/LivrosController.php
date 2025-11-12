<?php

namespace App\Http\Controllers;

use App\Models\Livros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivrosController extends Controller
{
    public function index()
    {
        // Retorna todos os livros
        $livros = Livros::all();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        // Criação do livro
        $livro = new Livros();
        $livro->titulo = $request->input('titulo');
        $livro->autor = $request->input('autor');
        $livro->genero = $request->input('genero');
        $livro->colecao = $request->input('colecao');
        $livro->formato = $request->input('formato');
        $livro->quantidade = $request->input('quantidade');
        $livro->numeroDePaginas = $request->input('numeroDePaginas');
        $livro->editora = $request->input('editora');
        $livro->sinopse = $request->input('sinopse');
        $livro->preco = $request->input('preco');
        $livro->lancamento = $request->input('lancamento');
        $livro->vendas = $request->input('vendas') ?? 0; // Valor padrão para vendas
        $livro->avaliacao = $request->input('avaliacao') ?? 0; // Valor padrão para avaliação

        // Verifica se o usuário está logado e atribui o 'criado_por'
        if (Auth::check()) {
            $livro->criado_por = Auth::id(); // Atribui o ID do usuário logado
        } else {
            // Se o usuário não estiver logado, você pode atribuir um valor padrão.
            $livro->criado_por = 2; // Valor padrão, pode ser o ID de um usuário genérico ou "admin"
        }

        // Se houver uma imagem, realiza o upload
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('livros_imagens', 'public');
            $livro->imagem = $imagemPath;
        }

        // Salva o livro no banco de dados
        $livro->save();

        // Redireciona para a página de livros com uma mensagem de sucesso
        return redirect()->route('livros.index')->with('success', 'Livro Cadastrado com Sucesso!');
    }

    public function show(Livros $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livros $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livros $livro)
    {
        // Atualização do livro
        $livro->titulo = $request->input('titulo');
        $livro->autor = $request->input('autor');
        $livro->genero = $request->input('genero');
        $livro->colecao = $request->input('colecao');
        $livro->formato = $request->input('formato');
        $livro->quantidade = $request->input('quantidade');
        $livro->numeroDePaginas = $request->input('numeroDePaginas');
        $livro->editora = $request->input('editora');
        $livro->sinopse = $request->input('sinopse');
        $livro->preco = $request->input('preco');
        $livro->lancamento = $request->input('lancamento');
        $livro->vendas = $request->input('vendas') ?? 0; // Valor padrão para vendas
        $livro->avaliacao = $request->input('avaliacao') ?? 0; // Valor padrão para avaliação

        // Se houver uma imagem, realiza o upload
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('livros_imagens', 'public');
            $livro->imagem = $imagemPath;
        }

        // Salva o livro atualizado no banco de dados
        $livro->save();

        // Redireciona para a página de livros com uma mensagem de sucesso
        return redirect()->route('livros.index')->with('success', 'Livro Atualizado com Sucesso!');
    }

    public function destroy(Livros $livro)
    {
        // Exclui o livro do banco de dados
        $livro->delete();

        // Redireciona para a página de livros com uma mensagem de sucesso
        return redirect()->route('livros.index')->with('success', 'Livro Excluído com Sucesso!');
    }
}
