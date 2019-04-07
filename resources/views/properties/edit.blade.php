@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Property</div>

                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('/editproperty',
                array($properties->id)) }}"
                 enctype = "multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="firstName" class="col-md-4 control-label">Property Title</label>

                            <div class="col-md-6">
                                <input id="property_title" type="text" class="form-control" name="property_title"
                                 value="{{ $properties->property_title }}" required autofocus>

                                @if ($errors->has('property_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('property_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price"
                                 value="{{$properties->price}}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                            <label for="location_id" class="col-md-4 control-label">Location:</label>
                            <div class="col-md-6">
                            <select name="location_id" class="form-control">
                            <option value="{{$location->id}}">{{$location->location}}</option>
                            @if(count($locations) > 0)
                                @foreach($locations->all() as $location)
                                <option value="{{$location->id}}">{{$location->location}}</option>
                                @endforeach

                            @endif
                                    
                            </select>
                            @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Address:</label>

                            <div class="col-md-6">
                                <textarea id="description"  rows="2" type="text" class="form-control" 
                                name="address" required autofocus>{{ $properties->address }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description:</label>

                            <div class="col-md-6">
                                <textarea id="description"  rows="7" type="text" class="form-control" name="description"
                                  required autofocus>{{ $properties->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('bathroom') ? ' has-error' : '' }}">
                            <label for="location_id" class="col-md-4 control-label">Bathroom:</label>
                            <div class="col-md-6">
                            <select name="bathroom" class="form-control">
                            <option>{{$properties->bathroom}}</option>
                           
                                    <option>1 Bathroom</option>
                                    <option>2 Bathrooms</option>
                                    <option>3 Bathrooms</option>
                                    <option>4 Bathrooms</option>
                                    <option>5 Bathrooms</option>
                                    <option>6 Bathrooms</option>
                                    <option>7 Bathrooms</option>
                                    <option>8 Bathrooms</option>
                               
                                    
                            </select>
                            @if ($errors->has('bathroom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bathroom') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                            <div class="form-group{{ $errors->has('bedroom') ? ' has-error' : '' }}">
                            <label for="location_id" class="col-md-4 control-label">Bedroom:</label>
                            <div class="col-md-6">
                            <select name="bathroom" class="form-control">
                            <option>{{$properties->bedroom}}</option>
                           
                                    <option>1 Bedroom</option>
                                    <option>2 Bedrooms</option>
                                    <option>3 Bedrooms</option>
                                    <option>4 Bedrooms</option>
                                    <option>5 Bedrooms</option>
                                    <option>6 Bedrooms</option>
                                    <option>7 Bedrooms</option>
                                    <option>8 Bedrooms</option>
                               
                                    
                            </select>
                            @if ($errors->has('bedroom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bedroom') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            

                            <div class="form-group{{ $errors->has('property_image') ? ' has-error' : '' }}">
                            <label for="property_image" class="col-md-4 control-label">Property_Image</label>

                            <div class="col-md-6">
                                <input id="property_image" type="file" class="form-control" name="property_image"
                                 value="" required autofocus>

                                @if ($errors->has('property_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('property_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Property 
                                </button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
