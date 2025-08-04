@extends('welcome')
@section('conteudo')
    <div class="container col-md-7">
        <h1 class="mt-5 mb-5 text-center">Editando evento: {{ $evento->nome }}</h1>

        <form action="{{ route('evento.atualizar', $evento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3 mt-3">
                <input type="file" class="form-control" name="imagem" id="imagem"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titulo do evento</label>
                <input type="text" class="form-control" name= "nome" id="titulo" value="{{ $evento->nome }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                <input type="text" class="form-control" name= "descricao" id="descricao"
                    placeholder="Descreva como será o evento" value="{{ $evento->descricao }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                <input type="text" class="form-control" name= "cidade" id="cidade" placeholder="Ex.: Caratinga"
                    value="{{ $evento->cidade }}">
            </div>

            <label for="exampleFormControlInput1" class="form-label">Formato do evento</label>
            <select class="form-select mb-3" aria-label="select example" name="formato">
                <option selected>Selecione</option>
                <option value="0">Online</option>
                <option value="1" {{ $evento->formato == 1 ? "selected='selected'" : '' }}>Presencial</option>
            </select>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Data</label>
                <input type="date" class="form-control" name= "date" id="date" value="{{ date('Y-m-d', strtotime($evento->date)) }}">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
