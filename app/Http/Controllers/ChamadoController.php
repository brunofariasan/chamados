<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chamado;
use App\Modelos\Evento;

class ChamadoController extends Controller
{
    private $chamado;

    public function __construct(Chamado $chdo)
    {
        $this->chamado = $chdo;
    }

    public function index()
    {
        $chamados = $this->chamado->where('situacao', 'Aprovado')->paginate();
        return view(
            'admin.pages.chamados.index',
            [
                'chamados' => $chamados
            ]
        );
    }

    public function pendente()
    {
        $chamados = $this->chamado->where('situacao', 'Não Aprovado')->paginate();
        return view(
            'admin.pages.chamados.pendente',
            [
                'chamados' => $chamados
            ]
        );
    }


    public function store(Request $request)
    {

        $situacao = 'Não Aprovado';

        $this->chamado->titulo = $request->titulo;
        $this->chamado->categoria = $request->categoria;
        $this->chamado->prioridade = $request->prioridade;
        $this->chamado->descricao = $request->descricao;
        $this->chamado->situacao = "Não Aprovado";


        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->image;
            $extension = $request->imagem->extension();
            $imageName = md5($request->imagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->imagem->move(public_path('img/events'), $imageName);
            $this->chamado->imagem = $imageName;
        }

        if (!$this->chamado->save())

            return redirect('/painel/')->with('error', 'Falha ao fazer upload');

        return redirect()->route('site.home')->with('success', 'Chamado cadastro com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $chamados = $this->chamado->where('id', $id)->first();
        $request['situacao'] = 'Aprovado';

        if (!$chamados)
            return redirect()->back();

        if ($chamados->update($request->all()))
            return redirect()->route('chamado.pendente');
    }

    public function delete(Request $request, $id)
    {
        $chamados = $this->chamado->where('id', $id)->first();

        if ($chamados->delete())
            return redirect()->route('chamado.index');
    }
}
