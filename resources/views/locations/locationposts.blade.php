@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default text-center">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <div class="col-md-4">
                <ul class="list-group">
                @if(count($locations) > 0)
                                @foreach($locations->all() as $location)
                               <li class="list-group-item"><a href='{{url("/location/$location->id")}}'>
                               {{$location->location}}</a></li> 
                                @endforeach

                            @else
                            <h1>No location</h1>
                            @endif
                
                </ul>
                        
                
                </div>
              
                <div class="col-md-8">
                @if(count($properties) > 0)

                @foreach($properties->all() as $property)
                    <h1>{{$property->property_title}}</h1>
                    <img src="{{ $property->property_image }}" alt="" width="100%">
                    <p>{{substr($property->description , 0,150)}}</p>
                    <ul class="nav nav-pills">
                        <li role="presentation">
                            <a href='{{ url("/view/{$property->id}") }}'>
                                <span class="fa fa-eye">View</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href='{{ url("/edit/{$property->id}") }}'>
                                <span class="fa fa-pencil-square-o">Edit</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href='{{ url("/delete/{$property->id}") }}'>
                                <span class="fa fa-trash">Delete</span>
                            </a>
                        </li>
                        
                    </ul>
                    <cite style="float:left">Posted On: {{date('M j, Y h:i', strtotime($property->updated_at))}}</cite>
                    <hr>
                @endforeach
                @else
                <h2>NO PROPERTY AVAILABLE</h2>

                @endif
                {{$properties->links()}}
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
