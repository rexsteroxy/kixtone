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
               
               
                <div class="col-md-8">
                @if(count($parcels) > 0)

                @foreach($parcels->all() as $parcel)
                    <h1>{{$parcel->parcel_title}}</h1>
                    
                    <img src="{{$parcel->parcel_image}}" alt="" width="100%">
                    
                    <p class="btn btn-success">Traking ID:  {{$parcel->tracking_id}}</p>
                    <ul class="nav nav-pills">
                        <li role="presentation">
                            <a href='{{ url("/view/{$parcel->id}") }}'>
                                <span class="fa fa-eye">View</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href='{{ url("/edit/{$parcel->id}") }}'>
                                <span class="fa fa-pencil-square-o">Edit</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href='{{ url("/delete/{$parcel->id}") }}'>
                                <span class="fa fa-trash">Delete</span>
                            </a>
                        </li>
                        
                    </ul>
                    <cite style="float:left">Uploaded On: {{date('M j, Y h:i', strtotime($parcel->updated_at))}}</cite>
                    <hr>
                @endforeach
                @else
                <h2>NO PARCEL AVAILABLE</h2>

                @endif
                {{$parcels->links()}}
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
