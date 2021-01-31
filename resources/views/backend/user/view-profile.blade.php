@extends('backend.layouts.master')
 
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Manage Profile</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">User</li>
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
                <h3>Manage Profile </h3>
                @include('backend.layouts.SessionMsg')
           </div><!-- /.card-header -->
          
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->photo))?URL::to('upload/user_image/'.$user->photo):URL::to('upload/user_images/no_image.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->address}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Mobile</b> <a class="float-right">{{$user->mobile}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender</b> <a class="float-right">{{$user->gender}}</a>
                  </li>
                </ul>

                <a href="{{route('profile.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.card -->

         <!-- DIRECT CHAT -->
       
         <!--/.direct-chat -->

         <!-- TO DO List -->
      
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
@endsection
