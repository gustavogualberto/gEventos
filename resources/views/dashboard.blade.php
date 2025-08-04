@extends('welcome')
@section('conteudo')

    <div class="container">
        <h4 class="text-center mt-5">Meus eventos</h4>
        @if (count($eventos) > 0)
            <table class="table table-striped mt-3 table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Data</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr class="align-middle">
                            <td>{{ $evento->nome }}</td>
                            <td>{{ $evento->descricao }}</td>
                            <td>{{ $evento->date }}</td>
                            <td>{{ $evento->cidade }}</td>
                            <td>
                                {{-- @if ($evento->user_id) --}}
                                <div class="d-flex gap-2 align-items-center">
                                    <form action="{{ route('deletar.evento', $evento->id) }}" method="POST"
                                        class="m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                                            data-toggle="tooltip" title="Deletar">
                                            <i class="bi bi-trash3-fill fs-6"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('evento.editar', $evento->id) }}"
                                        class="btn btn-warning btn-sm d-flex align-items-center justify-content-center"
                                        role="button" data-toggle="tooltip" title="Editar">
                                        <i class="bi bi-pencil-fill fs-6"></i>
                                    </a>

                                    <a href="{{ route('info.evento', $evento->id) }}"
                                        class="btn btn-primary btn-sm d-flex align-items-center justify-content-center"
                                        role="button" data-toggle="tooltip" title="Visualizar">
                                        <i class="bi bi-search"></i>
                                    </a>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h6 class="text-center mt-5 mx-auto">Você não possui eventos. <a href="{{ route('site.adicionar') }}">Criar
                    evento</a></h6>
        @endif




        @if(count($eventoComoParticipante)>0)
        <h4 class="text-center mt-5">Eventos que participo</h4>
        <table class="table table-striped mt-3 table-hover">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventoComoParticipante as $evento)
                    <tr class="align-middle">
                        <td>{{ $evento->nome }}</td>
                        <td>{{ $evento->descricao }}</td>
                        <td>{{ $evento->date }}</td>
                        <td>{{ $evento->cidade }}</td>
                        <td>
                            {{-- @if ($evento->user_id) --}}
                            <div class="d-flex gap-2 align-items-center">
                               <a href="{{ route('info.evento', $evento->id) }}"
                                        class="btn btn-primary btn-sm d-flex align-items-center justify-content-center"
                                        role="button" data-toggle="tooltip" title="Visualizar">
                                        <i class="bi bi-search"></i>
                                    </a>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
