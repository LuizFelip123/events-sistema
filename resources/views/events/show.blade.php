@extends('layouts.main')

@section('title', $event->title)


@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6 image-show">
                <img src="/img/events/{{$event->image}}" width="600px" alt="{{$event->title}}">
            </div>
            
            <div id="info-container" class="col-md-6">
               <h1>{{$event->title}}</h1>
               <p class="event-city"> <ion-icon name="location-outline"></ion-icon>{{$event->city}}</p>     
            </div>
        </div>
    </div>
@endsection