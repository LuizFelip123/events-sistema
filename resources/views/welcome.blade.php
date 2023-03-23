@extends('layouts.main')


@section('title', 'HDC Events')

@section('content')
  
     <div id="search-container" class="col-md-12">
          <h1>Busque um evento</h1>
          <form action="">
               <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
          </form>
     </div>
     <div id="events-container" class="col-md-12">
          <h2>Próximos Eventos</h2>
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
          </div>
     </div>

@endsection