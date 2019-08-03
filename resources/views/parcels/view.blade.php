@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
            <div class="panel panel-default text-center">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <div class="col-md-4"> 
               
                        
                
                </div> 
              
                <div>
                @if(count($parcels)  > 0)
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
                    
                    @endforeach
               @endif
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
