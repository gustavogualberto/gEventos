@extends('welcome')
@section('conteudo')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-5 " id="banner">
                <div class="mb-3 mt-5">
                    <h1 class="text-light" id="bannerTitle">Busque um evento</h1>
                    <form action="/" method="GET">
                        <input type="text" name="search" class="form-control mt-5 w-50 mx-auto d-block" id="search"
                            placeholder="Pesquise por um evento">
                    </form>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    @if (@session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if ($search)
            <h4 class="mt-4">Você pesquisou por: {{ $search }}</h4>
            <p class="text-secondary">Veja os próximos eventos que estão por vir</p>
        @else
            <h4 class="mt-4">Próximos eventos</h4>
            <p class="text-secondary">Veja os próximos eventos que estão por vir</p>
        @endif


        <div class="row w-auto justify-content-start">
            @if (count($eventos) == 0)
                <h5 class="text-center mt-3 text-danger ">Não existe eventos no momento</h5>
            @else
                @foreach ($eventos as $evento)
                    <div class="col-md-4 d-flex justify-content-center mb-4">
                        <div class="card mt-4" style="width: 18rem; height: 360px;">
                            <img src="{{ asset($evento->imagem) }}" class="card-img-top"
                                style="height: 150px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $evento->nome }}</h5>
                                <p class="fs-6 text-secondary"><i class="bi bi-calendar3"></i>
                                    {{ date('d/m/Y', strtotime($evento->date)) }}</p>
                                <p class="card-text">{{ Str::limit($evento->descricao, 25, '...') }}</p>
                                <a href="{{ route('info.evento', $evento->id) }}"
                                    class="btn btn-nc mt-auto d-block">Saber mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $eventos->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
    </div>

@endsection
