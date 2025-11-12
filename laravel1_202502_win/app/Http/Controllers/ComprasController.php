<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Livros;
use App\Models\Usuario;

class ComprasController extends Controller
{
    // Listar todas as compras
    public function index()
    {
        $compras = Compras::with(['usuario', 'livro'])->get();
        return view('compras.index', compact('compras'));
    }

    // Formulário de criação
    public function create()
    {
        $usuarios = Usuario::all();
        $livros = Livros::all();
        return view('compras.create', compact('usuarios', 'livros'));
    }

    // Salvar nova compra
    public function store(Request $request)
    {
        // Adicionando a data da compra
        $request->merge(['data_compra' => now()]);

        // Criar a compra com os dados recebidos
        Compras::create($request->all());

        return redirect()->route('compras.index')->with('success', 'Compra Registrada com Sucesso!');
    }

    // Mostrar uma compra específica
    public function show($id)
    {
        $compra = Compras::with(['usuario', 'livro'])->findOrFail($id);
        return view('compras.show', compact('compra'));
    }

    // Formulário de edição
    public function edit($id)
    {
        $compra = Compras::findOrFail($id);
        $usuarios = Usuario::all();
        $livros = Livros::all();
        return view('compras.edit', compact('compra', 'usuarios', 'livros'));
    }

    // Atualizar compra
    public function update(Request $request, $id)
    {
        $compra = Compras::findOrFail($id);
        $compra->update($request->all());

        return redirect()->route('compras.index')->with('success', 'Compra Atualizada com Sucesso!');
    }

    // Excluir compra
    public function destroy($id)
    {
        $compra = Compras::findOrFail($id);
        $compra->delete();

        return redirect()->route('compras.index')->with('success', 'Compra Removida com Sucesso!');
    }
}
