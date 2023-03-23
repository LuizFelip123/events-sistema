@extends('layouts.main')

@section('title', 'Criar Evento')


@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3" >
    <h1>Crie o seu eventos</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título ">
        </div>
        <div class="form-group">
            <label for="image">image:</label>
             <input type="file" id="image" name="image" class="form-control-file">   
        </div>
        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
        </div>
        <div class="form-group">
            <label for="private">O evento é Privado?</label>
            <select class="form-control" id="private" name="private">
                <option value="0">Não</option>
                <option value="1">sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea  class="form-control" id="description" name="description" placeholder="Descrição do evento:">
            </textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>
@endsection