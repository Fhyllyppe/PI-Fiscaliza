<?php

namespace App\Http\Controllers;

use App\Models\ComentariosDenuncias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariosDenunciasController extends Controller
{
        // Listar comentários de uma denúncia
    public function index($denunciaId)
    {
        $comentarios = ComentariosDenuncias::where('denuncia_id', $denunciaId)
            ->with('user')
            ->latest()
            ->get();

        return view('home', compact('comentarios'));
    }

    // Salvar novo comentário
    public function store(Request $request)
    {
        $request->validate([
            'denuncia_id' => 'required|exists:denuncias,id',
            'conteudo' => 'required|string|max:1000',
        ]);

        ComentariosDenuncias::create([
            'denuncia_id' => $request->denuncia_id,
            'user_id' => Auth::id(),
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->back()->with('success', 'Comentário enviado com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $comentario = ComentariosDenuncias::findOrFail($id);

        // Verifica se o usuário é o dono do comentário
        if ($comentario->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Você não tem permissão para editar este comentário.');
        }

        $request->validate([
            'conteudo' => 'required|string|max:1000',
        ]);

        $comentario->conteudo = $request->conteudo;
        $comentario->save();

        return redirect()->back()->with('success', 'Comentário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $comentario = ComentariosDenuncias::findOrFail($id);

        // Verifica se o usuário é o dono do comentário
        if ($comentario->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Você não tem permissão para excluir este comentário.');
        }

        $comentario->delete();

        return redirect()->back()->with('success', 'Comentário excluído com sucesso!');
    }

}
