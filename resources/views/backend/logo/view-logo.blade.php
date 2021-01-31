@extends('backend.layouts.master')
 
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Manage Logo</h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">Logo</li>
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
                <h3>Logo List  
                    @if ($countLogo<1)
                  
                    <a href="{{route('logo.add')}}" class="btn btn-outline-success btn-sm float-right"><i class="fa fa-plus-circle"></i>Add Logo</a>
                          
                    @endif
                </h3>
               
           </div><!-- /.card-header -->
           <div class="card-body">
            @include('backend.layouts.SessionMsg')
            <table id="example1" class="table table-bordered table-responsive table-hover">
              <thead>
              <tr>
                <th>#</th>
                <th>Logo</th>
                <th>Action</th>
               
              </tr>
              </thead>
              <tbody>
                @foreach ($allData as $key=>$logo)
                    
                
              <tr>
                <td>{{$key+1}}</td>
                <td><img src="{{(!empty($logo->image))?URL::to('upload/logo_image/'.$logo->image):URL::to('upload/logo_image/no_image.png')}}" style="width: 100px;height:auto" alt=""></td>
             
                <td>
                  <a href="{{route('logo.edit', $logo->id)}}" title="Edit" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                  <a href="{{route('logo.delete', $logo->id)}}" id="delete" title="Delete" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                 
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
           </div><!-- /.card-body -->
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
