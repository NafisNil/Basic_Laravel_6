@extends('backend.layouts.master')
 
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0"> News and Event</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">News and Event</li>
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
                <h3>Add News and Event  <a href="{{route('news_event.view')}}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-list"></i>News and Event List</a></h3>
               
           </div><!-- /.card-header -->
           <div class="card-body">
               @include('backend.layouts.SessionMsg')
            <form method="POST" action="{{route('news_event.update', $edit->id)}}" enctype="multipart/form-data">
                @csrf
          

                <div class="form-group row">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                    <div class="col-md-6">
                        <input id="datepicker" type="date" class="form-control" name="date" value="{{$edit->date}}" placeholder="YYYY-MM-DD" >

                    </div>
                </div>

                <div class="form-group row">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Short Title') }}</label>

                    <div class="col-md-6">
                        <input id="" type="text" class="form-control" name="short_title" value="{{$edit->short_title}}" >

                    </div>
                </div>

                <div class="form-group row">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Long Title') }}</label>

                    <div class="col-md-6">
                        
                        <textarea class="form-control" rows="5" name="long_title"> {{$edit->long_title}}</textarea>
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
                       <img id="showImage" src="{{(!empty($edit->image))?URL::to('upload/news_event_image/'.$edit->image):URL::to('upload/user_images/no_image.png')}}"  style="widows: inherit; width:150px; height:150px; border:1px solid #042b3d" alt="">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
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
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>
@endsection
