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
                    @foreach($images->all() as $image)
                    <img src="{{ $image->images }}" alt="" width="100%">
                    @endforeach
                    <p>{{$property->description }}</p>
                    <ul class="nav nav-pills">
                        <li role="presentation">
                            <a href='{{ url("/like/{$property->id}") }}'>
                                <span class="fa fa-thumbs-up">Like ({{$likeCounter}})</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href='{{ url("/dislike/{$property->id}") }}'>
                                <span class="fa fa-thumbs-down">Dislike ({{$dislikeCounter}})</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href='{{ url("/comment/{$property->id}") }}'>
                                <span class="fa fa-comment-o">Comment ({{$commentCounter}})</span>
                            </a>
                        </li>
                        
                    </ul>
                    
                @endforeach
                @else
                <h2>NO PROPERTY AVAILABLE</h2>

                @endif
               
                <form class="form-horizontal" method="POST" action='{{ url("/addcomment/{$property->id}")}}'
                 enctype = "multipart/form-data" >
                        {{ csrf_field() }}

                            <div class="form-group">
                                <textarea id="comment"  rows="6" type="text" class="form-control" name="comment"
                                  required autofocus></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                           

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary float-left">
                                    Add Comment 
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="list-group">
                
                @if(count($comments) > 0)

                @foreach($comments->all() as $comment)

                <li class="list-group-item">{{$comment->comment}}</li>
                <p>Posted by:{{$comment->middlename}}</p>

                @endforeach

                @endif
                </ul>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
