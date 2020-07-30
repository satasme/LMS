<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('admin.partials.head')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                <h1 style="font-weight:bold;  color: white;"> LMS</h1>
                    <!-- <a href="index.html"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a> -->
                </div>
            </div>
            <div class="main-menu">
            @include('admin.partials.mainmenu')
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
        <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>courses</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="{{ asset('assets/images/author/149071.png')}}" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Test User<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area start -->
            <div class="row" id="top-of-site">
            <div class="col-md-9"><p style="color:white;text-align:center;letter-spacing: 2.5px;">All Courses </p></div>
            <div class="col-md-3">
            <button  id="addnewbtn" class="btn btn-primary"><span style="font-size: 17px;">+</span>Add New</button>
            </div>
            </div>
            <div id="reg-form" class="course-registration-form">
            
            <h4 style="padding-left: 8%; padding-top:2%;font-family:Arial;font-weight:600 !important;">Add New Course</h4>
            <a class="close" href="#">&times;</a>
            </br>
            
            @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>

        

         @endif
              <form class="add-form" method="post" action="{{ route('courses.store') }}">
              @csrf

              @php
               $newunionid = abs( crc32( uniqid() ) );
             @endphp

              <input type="hidden" name="coursecode" class="form-control" id="hidencoursecode" value="GI:{{ $newunionid }}">
              <div class="form-group">
        <label for="exampleFormControlInput1">Course Name</label>
        <input type="text" name="coursename" class="form-control" id="exampleFormControlInput1" placeholder="Enter the name">
                </div>
                <div class="form-group">
    <label for="exampleFormControlTextarea1">Short Description</label>
    <textarea name="shortdescription" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Long Description </label>
    <textarea name="longdescription" class="form-control" id="TextareaforLongdescription" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">submit</button>
 
               </form>



            </div>
            <div class="details" >

            <table id="datatable" class="table table-bordered">
        <thead class="table-head">
        <tr>
            <th style="display:none">courseid</th>
            <th>Course Code</th>
            <th width="106px">Course Name</th>
            <th width="202px">Course Short Description</th>
            <th width="226px">Course Long Description</th>
            <th width="280px">Action</th>
        </tr>
      </thead>
        <tbody>
        @foreach ($courses as $course)
        <tr class="data-row">
            <td class="align-middle courseid">{{ $course->id }}</td>
            <td class="align-middle courseCode">{{ $course->coursecode }}</td>
            <td class="align-middle courseName">{{ $course->coursename }}</td>
            <td class="align-middle shortDescription">{{ $course->shortdescription }}</td>
            <td class="align-middle longdescription">{!! $course->longdescription !!}</td>
            <td class="align-middle" >
                
   
                    <a id="edit-item" class="btn btn-primary edit" >Edit</a>
                    
                   <form style="float:right;" method="post" action="{{ route('courses.destroy',$course->id) }}">
                      @csrf
                      @method('DELETE')
                       <button type="submit" class="btn btn-danger delete-btn" >Delete</button>
                    </form>
                    
               
            </td>
        </tr>
        @endforeach
</tbody>
    </table>

            </div>

            
            </div>

            <div id="edit-model" class="modal-body">
            
            <h4 style="padding-left: 8%; padding-top:2%;font-family:Arial;font-weight:600 !important;">update Course</h4>
            <a class="close" href="#">&times;</a>
            </br>
            
            @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>

        

         @endif
              <form id="update-form" class="update-form" method="post" action="/courses">
              @csrf
              {{ method_field('PUT')}}

              <div class="form-group">
              <label for="exampleFormControlInput1">Course code</label>
              <input type="text" name="coursecode" class="form-control" id="coursecode" >
              </div>
              <div class="form-group">
        <label for="exampleFormControlInput1">Course Name</label>
        <input type="text" name="coursename" class="form-control" id="coursename" placeholder="Enter the name">
                </div>
                <div class="form-group">
    <label for="exampleFormControlTextarea1">Short Description</label>
    <textarea name="shortdescription" class="form-control" id="shortdescription" rows="3"></textarea>
  </div>
    
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Long Description </label>
    <textarea name="longdescription" class="form-control" id="longdescrption" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Update</button>
 
               </form>



            </div>

<div class="modal-body" id="edit-model">
        <form id="edit-form" class="form-horizontal" method="POST" action="{{ route('courses.update',1) }}">
                    @csrf
                     @method('PUT')
        
          <div class="card text-white bg-dark mb-0">
                       <div class="card-header">
                           <h2 class="m-0">Edit</h2>
                       </div>
               <div class="card-body">
              <!-- id -->
                  <div class="form-group">
                    <label class="col-form-label" for="modal-input-id">Course Code</label>
                     <input type="text" name="coursecode" class="form-control" id="modal-input-id" required>
                  </div>
              <!-- /id -->
              <!-- name -->
                     <div class="form-group">
                      <label class="col-form-label" for="coursename">Course Name</label>
                     <input type="text" name="coursename" id="course-name"  class="form-control" required autofocus>
                     </div>
              <!-- /name -->
              <!-- description -->
             
                      <div class="form-group">
                        <label class="col-form-label" for="shortdescription">Short Description</label>
                        <input type="text" name="shortdescription" class="form-control" id="short-description" required>
                         </div>

                     <div class="form-group">
                        <label class="col-form-label" for="longdescription">Long Description</label>
                        <textarea name="longdescription" class="form-control" id="longdescrption" rows="3"></textarea>
                      
                      </div>

                           <div class="modal-footer">
                               <button type="submit" class="btn btn-primary" >Update</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

            
               </div> 
          </div> 
    </form>
              <!-- /description -->
            
        
</div>
      
    </div>
  </div>
</div>
            
        </div>
        <!-- main content area end -->
        <!-- footer area start-->

       

        <footer>
            <div class="footer-area">
                
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
   
    @section('js')
    <script src="{{ asset('vendor\unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('TextareaforLongdescription');
        //CKEDITOR.replace('Longdescription');
    </script>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="{{ asset('assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
    <!-- all bar chart -->
    <script src="{{ asset('assets/js/bar-chart.js') }}"></script>
    <!-- all map chart -->
    <script src="{{ asset('assets/js/maps.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>