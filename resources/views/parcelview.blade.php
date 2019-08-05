@extends('layouts.master')

@section('content')        
        
<section class="contact-area" id="contact">
        <div class="contact-form-area section-padding gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="area-title text-center">
                            <h3>GET IN TOUCH</h3>
                            <p>Want To Know The Current Location Of Your Package</p>
                            <p>Keep On Checking Your Package Status</p>
                        </div>
                    </div>
                </div>
                <div class="row">
              @if(count($parcels) > 0)

              @foreach($parcels->all() as $parcel)
              <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12">
                <p class="btn btn-success">Current Location Of Parcel:  {{$parcel->current_location }}</p>
                <div class="row">
                <div class="col-md-6">
                    @foreach($images->all() as $image)
                    <img src="{{ $image->images }}" alt="" width="30%">
                      @endforeach
                </div>
                </div>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Reciever Name</th>
                            <th scope="col">Reciever Phonnumber</th>
                            <th scope="col">Reciever Address</th>
                            <th scope="col">Shipment Fee</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $parcel->reciever_name }}</td>
                            <td>{{ $parcel->reciever_phonenumber }}</td>
                            <td>{{ $parcel->reciever_address }}</td>
                            <td>{{ $parcel->shipment_fee }}</td>
                            
                          </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead class="thead-dark">
                        
                          <tr>
                            <th scope="col">Tracking I.D</th>
                            <th scope="col">Sender Name</th>
                            <th scope="col">Sender Location</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                           
                            <td>{{$parcel->tracking_id }}</td>
                            <td>{{ $parcel->sender_name }}</td>
                            <td>{{ $parcel->sender_location }}</td>
                          </tr>
                        </tbody>
                    </table>
                  
                  <cite style="float:left">Departure Date: {{date('M j, Y h:i', strtotime($parcel->updated_at))}}</cite>
                  <hr>
              @endforeach
              @else
              <h2>NO PARCEL AVAILABLE</h2>

              @endif
              </div>
             </div>
              </div>
</section>
@endsection