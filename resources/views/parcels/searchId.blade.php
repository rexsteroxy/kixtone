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
                                 placeholder="Search by id..." required autofocus>
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
                <p class="btn btn-success">Traking ID:  {{$parcel->tracking_id}}</p>
                    <img src="{{ $parcel->parcel_image }}" alt="" width="50%">

                </div>
                <table class="table">
                        <thead class="thead-dark">
                        
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reciever Name</th>
                            <th scope="col">Reciever Phonnumber</th>
                            <th scope="col">Reciever Address</th>
                            <th scope="col">Shipment Fee</th>
                            <th scope="col">Current Location</th>
                            <th scope="col">Sender Name</th>
                            <th scope="col">Sender Location</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>{{ $parcel->reciever_name }}</td>
                            <td>{{ $parcel->reciever_phonenumber }}</td>
                            <td>{{ $parcel->reciever_address }}</td>
                            <td>{{ $parcel->shipment_fee }}</td>
                            <td>{{ $parcel->current_location }}</td>
                            <td>{{ $parcel->sender_name }}</td>
                            <td>{{ $parcel->sender_location }}</td>
                          </tr>
                        </tbody>
                    </table>
                    
                    <cite style="float:left">Uploaded On: {{date('M j, Y h:i', strtotime($parcel->updated_at))}}</cite>
                    <hr>
                @endforeach
                @else
                <h2>NO PARCEL AVAILABLE</h2>

                @endif
               
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
