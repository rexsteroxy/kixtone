@extends('layouts.master')

@section('content')
<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Agent Registration Platform</h2>
		</div>
	</section>
<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>We provide the best customers</h3>
							<p>Signup to get Registerd</p>
						</div>
                        @include('includes.errors')
                        @include('includes.messages')
    <form  method="Post" action="/register" class="contact-form">
    {{ csrf_field() }}
    		<div class="form-group">
    			<label for="title">Firstname:</label>
                <input type="text" name="firstname" 
                class="form-control" required placeholder="Firstname">
    		</div>
            <div class="form-group">
    			<label for="title">Middlename:</label>
                <input type="text" name="middlename" 
                class="form-control" required placeholder="Middlename">
    		</div>
            <div class="form-group">
    			<label for="title">Lastname:</label>
                <input type="text" name="lastname" 
                class="form-control" required placeholder="Lastname">
    		</div>
    		<div class="form-group">
    			<label for="title">Email:</label>
                <input type="email" name="email" 
                class="form-control" required placeholder="Enter your email">
    		</div>
            <div class="form-group">
    			<label for="title">Phonenumber:</label>
                <input type="number" name="phonenumber" 
                class="form-control" required placeholder="PhoneNumber">
    		</div>
            <div class="form-group">
    			<label for="title">State:</label>
               <select name="state">
                    <option>Imo</option>
                    
               </select>
    		</div>
            <div class="form-group">
    			<label for="title">Address:</label>
                <input type="text" name="address" 
                class="form-control" required placeholder="Address">
    		</div>
            <div class="form-group">
    			<label for="title">Date Of Birth</label>
                <input type="date" name="dob" class="form-control" required>
    		</div>
            <div class="form-group">
    			<label for="title">Gender:</label>
               <select name="gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
               </select>
               <div class="form-group">
    			<label for="title">License I.D:</label>
                <input type="text" name="license" 
                class="form-control" required placeholder="Enter your License id">
    		</div>
    		</div>
            <div class="form-group">
    			<label for="title">National I.D:</label>
                <input type="text" name="national" 
                class="form-control" required placeholder="Enter your National id">
    		</div>
            <div class="form-group">
    			<label for="title">Password:</label>
                <input type="password" name="password" 
                class="form-control" required placeholder="Enter your Password">
    		</div>
            
            <div class="form-group">
    			<label for="title">Password Confirmation:</label>
                <input type="password" name="password_confirmation" 
                class="form-control" required placeholder="Confirm Password">
    		</div>
    		<div class="form-group">
    			<button type="submit" name="submit" class="btn btn-primary">Register</button>
    		</div>
		</form>
					</div>
				</div>
    
    
@endsection