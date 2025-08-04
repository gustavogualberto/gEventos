<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Evento;
use App\Models\User;
use GuzzleHttp\Promise\Create;

class EventosController extends Controller
{


    public function index()
    {

        $search = request('search');

        if ($search) {
            $eventos = Evento::where([
                ['nome', 'like', '%' . $search . '%']
            ])->paginate(6);
        } else {
             $eventos = Evento::paginate(6);
        }
        
       
        return view('site.home', compact('eventos', 'search'));
    }

    public function adicionar()
    {
        return view('site.adicionarEvento');
    }

    public function meusEventos()
    {

        $user = auth()->user();
        $eventos = $user->eventos;

        $eventoComoParticipante = $user->eventoComoParticipante()->get();
        
        return view('dashboard', compact('eventos', 'eventoComoParticipante'));
    }

    public function salvar(Request $req)
    {

        $dados = $req->all();


        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/eventosImages/";
            $extensao = $imagem->getClientOriginalExtension();
            $nomeImagem = "imagem_" . $num . "." . $extensao;
            $imagem->move(public_path($dir), $nomeImagem);
            $dados['imagem'] = $dir . $nomeImagem;
        }

        $user = auth()->user(); // Obtendo o usuário autenticado
        $dados['user_id'] = $user->id; // Atribuindo o ID do usuário ao evento 


        Evento::create($dados);
        return redirect()->route('site.home')->with('msg', 'Evento criado com sucesso!');
    }


    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();
        return redirect()->route('meusEventos.evento');
    }

    public function editar($id)
    {   
        $user = auth()->user();
        $evento = Evento::findOrFail($id);

        
        if($user->id != $evento->user->id){
            return redirect('/');
        }

        return view('site.editarEvento', compact('evento'));
    }

    public function update(Request $req)
    {
        $evento = Evento::findOrFail($req->id);

        $dados = $req->all();

        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "img/eventosImages/";
            $extensao = $imagem->getClientOriginalExtension();
            $nomeImagem = "imagem_" . $num . "." . $extensao;
            $imagem->move(public_path($dir), $nomeImagem);
            $dados['imagem'] = $dir . $nomeImagem;
        }

        $evento->update($dados);

        return redirect()->route('meusEventos.evento')->with('msg', 'Evento criado com sucesso!');
    }

    public function info($id)
    {

        $evento = Evento::findOrFail($id);
        
        $user = auth()->user();
        
        
        $possuiUsuario = false;

        if($user){
            $eventosUsuario = $user->eventoComoParticipante->toArray();
            foreach ($eventosUsuario as $eventoUsuario) {
                if ($eventoUsuario['id'] == $id) {
                    $possuiUsuario = true;
                }
            }
        }
        
        $criadorEvento = User::where('id', $evento->user_id)->first()->toArray();
        

        return view('site.infoEvento', compact('evento', 'criadorEvento', 'possuiUsuario'));
    }

    public function joinEvento($id) //se increver no evento
    {
        
        $user = auth()->user();
        $user->eventoComoParticipante()->attach($id);

        $evento = Evento::findOrFail($id);
        return redirect()->route('info.evento', $evento->id)->with('msg', 'Você está participando do evento'. $evento->nome);
    }


    public function sairDoEvento($id)
    {
        $user = auth()->user();
        $user->eventoComoParticipante()->detach($id);

        $evento = Evento::findOrFail($id);
        return redirect()->route('info.evento', $evento->id)->with('msg', 'Você saiu participando desse evento' . $evento->nome);
    }
}
