@extends('backend.layouts.master')
 
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Edit Profile</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">Profile</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <!-- Small boxes (Stat box) -->
   
     <!-- /.row -->
     <!-- Main row -->
     <div class="row">
       <!-- Left col -->
       <section class="col-lg-7 connectedSortable">
         <!-- Custom tabs (Charts with tabs)-->
         <div class="card">
           <div class="card-header">
                <h3>User List  <a href="{{route('profile.view')}}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-list"></i>Your Profile</a></h3>
               
           </div><!-- /.card-header -->
           <div class="card-body">
            <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Gender</label>
                    <select class="form-control col-md-6" name="gender">
                      <option selected="selected">Selected Gender</option>
                      <option value="Male" {{($editData->gender == "Male")?'selected':''}}>Male</option>
                      <option value="Female"  {{($editData->gender == "Female")?'selected':''}}>Female</option>
                    
                    </select>
                  </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{$editData->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                     
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" value="{{$editData->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Mobile No') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="number" value="{{$editData->mobile}}" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                        @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="address" type="text" value="{{$editData->address}}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="image" >

                    </div>
                </div>

                <div class="form-group row">
                  
                    <div class="col-md-6 offset-md-3">
                       <img id="showImage" src="{{(!empty($editData->image))?URL::to('upload/user_images/'.$editData->image):URL::to('upload/user_images/no_image.png')}}"  style="widows: inherit; width:150px; height:150px; border:1px solid #042b3d" alt="">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
           </div><!-- /.card-body -->
         </div>
         <!-- /.card -->

      
         <!-- /.card -->
       </section>
       <!-- /.Left col -->
       <!-- right col (We are only adding the ID to make the widgets sortable)-->
       <section class="col-lg-5 connectedSortable">

         <!-- Map card -->
         <div class="card bg-gradient-primary">
           <div class="card-header border-0">
             <h3 class="card-title">
               <i class="fas fa-map-marker-alt mr-1"></i>
               Visitors
             </h3>
             <!-- card tools -->
             <div class="card-tools">
               <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                 <i class="far fa-calendar-alt"></i>
               </button>
               <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
             </div>
             <!-- /.card-tools -->
           </div>
           <div class="card-body">
             <div id="world-map" style="height: 250px; width: 100%;"></div>
           </div>
           <!-- /.card-body-->
           <div class="card-footer bg-transparent">
             <div class="row">
               <div class="col-4 text-center">
                 <div id="sparkline-1"></div>
                 <div class="text-white">Visitors</div>
               </div>
               <!-- ./col -->
               <div class="col-4 text-center">
                 <div id="sparkline-2"></div>
                 <div class="text-white">Online</div>
               </div>
               <!-- ./col -->
               <div class="col-4 text-center">
                 <div id="sparkline-3"></div>
                 <div class="text-white">Sales</div>
               </div>
               <!-- ./col -->
             </div>
             <!-- /.row -->
           </div>
         </div>
         <!-- /.card -->

         <!-- solid sales graph -->
      
         <!-- /.card -->

         <!-- Calendar -->
         <div class="card bg-gradient-success">
           <div class="card-header border-0">

             <h3 class="card-title">
               <i class="far fa-calendar-alt"></i>
               Calendar
             </h3>
             <!-- tools card -->
             <div class="card-tools">
               <!-- button with a dropdown -->
               <div class="btn-group">
                 <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                   <i class="fas fa-bars"></i>
                 </button>
                 <div class="dropdown-menu" role="menu">
                   <a href="#" class="dropdown-item">Add new event</a>
                   <a href="#" class="dropdown-item">Clear events</a>
                   <div class="dropdown-divider"></div>
                   <a href="#" class="dropdown-item">View calendar</a>
                 </div>
               </div>
               <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                 <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                 <i class="fas fa-times"></i>
               </button>
             </div>
             <!-- /. tools -->
           </div>
           <!-- /.card-header -->
           <div class="card-body pt-0">
             <!--The calendar -->
             <div id="calendar" style="width: 100%"></div>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </section>
       <!-- right col -->
     </div>
     <!-- /.row (main row) -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div> 
<!-- Page specific script -->
<script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#myForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        usertype: {
          required: true,
         
        },
        name: {
          required: true,
         
        },
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 6
        },
        password2: {
          required: true,
          equalTo: '#password'
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a vaild email address"
        },
        usertype: {
          required: "usertype field is required",
         
        },
        name: {
          required: "name field is required",
        
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 6 characters long"
        },
        password2: {
          required: "Please provide a password",
          equalTo: "Not matched"
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script>
@endsection
