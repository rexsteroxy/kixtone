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
                            <p>Just Enter Your Tracking I.D Below</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-13 col-xs-12">
                        <form class="form-horizontal" method="POST" action="{{url('/track_id')}}"
                            enctype = "multipart/form-data" >
                                {{ csrf_field() }}

                        
                        <div class="form-group{{ $errors->has('tracking_id') ? ' has-error' : '' }}">
                            <label for="firstName" class="col-md-4 control-label">Tracking ID:</label>

                            <div class="col-md-4">
                                <input id="tracking_id" type="text" class="form-control" name="tracking_id"
                                 value="{{ old('tracking_id') }}" required autofocus>

                                @if ($errors->has('tracking_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->parcel('tracking_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-top:10px">
                                    Track Parcel 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                    <div class="col-md-4 col-lg-4 col-sm-9 col-xs-9">
                        <div class="contact-image text-center">
                            <img src="img/contact-right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--CONTACT US AREA END-->
    

@endsection