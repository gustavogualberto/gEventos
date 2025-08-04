@extends('welcome')
@section('conteudo')
    <div class="container col-md-7">
        <h1 class="mt-5 mb-5 text-center">Adicionar evento</h1>

        <form action="{{ route('salvar.evento') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3 mt-3">
                <input type="file" class="form-control" name="imagem" id="imagem"
                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titulo do evento</label>
                <input type="text" class="form-control" name= "nome" id="titulo" placeholder="Ex.: Show do zeze"
                    >
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                <input type="text" class="form-control" name= "descricao" id="descricao"
                    placeholder="Descreva como será o evento">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                <input type="text" class="form-control" name= "cidade" id="cidade" placeholder="Ex.: Caratinga">
            </div>

            <label for="exampleFormControlInput1" class="form-label">Formato do evento</label>
            <select class="form-select mb-3" aria-label="select example" name="formato" >
                <option selected>Selecione</option>
                <option value="0">Online</option>
                <option value="1">Presencial</option>
            </select>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Data</label>
                <input type="date" class="form-control" name= "date" id="date" required>
            </div>

            <button type="submit" class="btn btn-new-color">Salvar</button>
        </form>
    </div>
@endsection
