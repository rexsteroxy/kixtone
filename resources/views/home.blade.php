@extends('layouts.app')
<style type="text/css">
 .avatar{
     border-radius:100%;
     max-width : 100px;
 }
</style>
@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(count($errors) > 0)
                    @foreach($errors->all as $error)
                        <div class="alert alert-danger"><li>{{$error}}</li></div>
                    @endforeach
                @endif
                @if (session('response'))
                        <div class="alert alert-success">
                            {{ session('response') }}
                        </div>
                    @endif
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">
                        Dashboard
                     </div>
                     <div class="col-md-8">
                     <form  method="POST" action='{{ url("/search") }}'
                         enctype = "multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="input-group">
                                <input  type="text" class="form-control" name="search"
                                 placeholder="Search For..." required autofocus>
                                <span class="input-group-btn">
                                 <button type="submit" class="btn btn-primary">
                                 Search
                                 </button>
                                </span>
                        </div>
                        </form>
                     </div>
                </div>
                </div>

                <div class="panel-body">
               @if(!empty($profile))
               <div class="col-md-4">
                    <img src="{{ $profile->profile_image }}" 
                    class="avatar" alt=""> 
                   <p class="lead">{{$profile->firstname}}</p>
                   <p class="lead">{{$profile->email}}</p>
                </div>
               @else
                <div class="col-md-4">
                    <img src="{{ url('img/author.jpg')}}" 
                    class="avatar" alt=""> 
                  
                </div>
                @endif
                <div class="col-md-8">
                @if(count($properties) > 0)

                @foreach($properties->all() as $property)
                    <h1>{{$property->property_title}}</h1>
                    
                    <img src="{{$property->property_image}}" alt="" width="100%">
                    
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
                <h2>NO POST AVAILABLE</h2>

                @endif
                {{$properties->links()}}
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
