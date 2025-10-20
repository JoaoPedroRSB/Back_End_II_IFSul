<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        // Pegando todos os dados diretamente do request
        $data = $request->all();

        // Se o tipo for 'usuariocomum', removemos os campos da livraria manualmente
        if ($data['tipo'] === 'usuariocomum') {
            $data['nome_livraria'] = null;
            $data['email_livraria'] = null;
            $data['cnpj'] = null;
            $data['celular_contato'] = null;
        }

        // Criação do usuário
        Usuario::create($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        // Pegando todos os dados diretamente do request
        $data = $request->all();

        // Se o tipo for 'usuariocomum', removemos os campos da livraria manualmente
        if ($data['tipo'] === 'usuariocomum') {
            $data['nome_livraria'] = null;
            $data['email_livraria'] = null;
            $data['cnpj'] = null;
            $data['celular_contato'] = null;
        }

        // Se a senha foi alterada, criptografamos
        if (!empty($data['senha'])) {
            $data['senha'] = bcrypt($data['senha']);
        }

        // Atualizando o usuário
        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Excluino o usuário
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return redirect()->route('usuarios.index')
                ->with('success', 'Usuário excluído com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('usuarios.index')
                    ->with('error', 'Não é possível excluir este usuário porque ele possui livros cadastrados.');
            }
            throw $e;
        }
    }
}
