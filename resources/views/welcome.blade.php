@extends('layouts.main')


@section('title', 'HDC Events')

@section('content')
  
     <div id="search-container" class="col-md-12">
          <h1>Busque um evento</h1>
          <form action="/" method="GET">
               <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
          </form>
     </div>
     <div id="events-container" class="col-md-12">
          @if($search)
           <h2>Buscando {{$search}}</h2>
          @else
          <h2>Próximos Eventos</h2>

          @endif
          <p class="subtitle">Veja os eventos dos próximos dias</p>
          <div id="cards-container" class="row">
               @foreach($events as $event)
                    <div class="card col-md-3">
                         <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
                         <div class="card-body">
                              <div class="card-date">
                                   10/09/2020
                              </div>
                              <div class="card-title">
                                   {{$event->title}}
                              </div>
                              <p class="card-participants"> X participantes</p>
                              <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                         </div>
                    </div>
               @endforeach
               @if(count($events) == 0 && $search)
                    <p>Não há foi possível encontrar nenhum evento  com {{$search}}! <a href="/">Ver todos</a></p>
               @elseif(count($events) == 0)
                    <p>Não há eventos disponível</p>
               @endif
          </div>
     </div>

@endsection