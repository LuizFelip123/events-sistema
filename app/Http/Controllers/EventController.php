<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //
    public function index()
    {
        $search = request('search');
        if($search){
            
            $events = Event::where(
                'title', "like", "%$search%"
            )->get();
        }else{
            $events = Event::all();   
        }
       
     
        return view('welcome', ['events'=> $events, 'search'=> $search]);
    }

    public function create(){
        return view('events.create');
    }
    public function store(Request $request){
        $event =  new Event;
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        //image
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension  = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). ".". $extension;
            $request->image->move(public_path('img/events'), $imageName);
            $event->image = $imageName;    
        }
        
        $event->user_id =Auth::user()->id;
       
        $event->save();

        return Redirect('/')->with('msg', 'Evento Criado Com Sucesso!');
        
    }
    public  function show( $id){
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event'=>$event, 'eventOwner'=>$eventOwner]);
    }
    public function joinEvent($id){
     
       if(Auth::check()){
        $user = User::find(Auth::user()->id);
        $user->events();    
        // Chama uma função da classe User

       }
        
      
    }
}
