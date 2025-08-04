 @extends('welcome')
 @section('conteudo')
     @php
         use Illuminate\Support\Str;
     @endphp
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-6">
                 <img src="{{ asset($evento->imagem) }}" class="w-100 h-80 mt-5 rounded-2">
             </div>
             <div class="col-6 text-center">
                 <div class="row">
                     <h1 class="mt-5 ms-2"> {{ $evento->nome }} </h1>
                 </div>
                 <div class="row justify-content-center text-center">
                     <p class="text-secondary ms-2 fs-6">{{ $evento->descricao }}</p>
                     <div id="tarjaInfo"></div>

                 </div>
                 <div class="row justify-content-center text-secondary">
                     <p class="mt-3 fs-6 fw-bold"> <i class="bi bi-geo-alt-fill"></i> {{ $evento->cidade }}</p>
                 </div>
                 <div class="row justify-content-center text-secondary">
                     <p class="fs-6 text-secondary fw-bold"><i class="bi bi-calendar3 "></i>
                         {{ date('d/m/Y', strtotime($evento->date)) }}</p>
                 </div>
                 <div class="row justify-content-center text-secondary">
                     @if ($evento->formato == 0)
                         <p class="fs-6  fw-bold" style="color: rgb(151, 40, 255);"> <i class="bi bi-webcam"></i> EVENTO ONLINE</p>
                     @else
                         <p class="fs-6  fw-bold"  style="color: rgb(151, 40, 255);"> <i class="bi bi-person-arms-up"></i> EVENTO PRESENCIAL</p>
                     @endif
                     <div id="divisor"></div>
                 </div>

                 <div class="row justify-content-center fs-5 mt-3">
                     <p class="text-start fw-light"><i class="bi bi-people-fill "></i> Inscritos:
                         {{ count($evento->users) }}</p>
                 </div>
                 <div class="row justify-content-center fs-5">
                     <p class="text-start fw-light "><i class="bi bi-mic-fill"></i> Palestrante:
                         {{ $criadorEvento['name'] }}</p>
                     <div id="divisor"></div>
                 </div>
                 @if (!$possuiUsuario)
                     <form action="{{ route('join.evento', $evento->id) }}" method="POST">
                         @csrf
                         <a href="{{ route('join.evento', $evento->id) }}"
                             class="btn btn-nc btn-lg mt-3 rounded-5 fs-5" id="event-submit"
                             onclick="event.preventDefault();
                        this.closest('form').submit()">Quero
                             participar</a>
                     </form>
                 @else
                     <form action="{{ route('sair.evento', $evento->id) }}" method="POST">
                         @csrf
                         @method ('DELETE')
                         <a href="{{ route('sair.evento', $evento->id) }}"
                             class="btn btn-success btn-lg mt-3 rounded-5 fs-5 btn-new-color" id="event-submit"
                             onclick="event.preventDefault();
                        this.closest('form').submit()">Você está participando!</a>
                     </form>
                 @endif
             </div>
         </div>
     </div>
 @endsection
