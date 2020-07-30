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
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                        <li><a href="{{ url('admin/home') }}"><i class="ti-map-alt"></i> <span>Home</span></a></li>

                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Courses</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ url('admin/home/courses') }}">Register Courses</a></li>
                                    <li><a href="{{ url('admin/home/paper-categories') }}">All Paper categories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Quiz
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="index.html">Add Mcq Quize</a></li>
                                    <li><a href="index3-horizontalmenu.html">Manage mcq quize</a></li>
                                </ul>
                            </li>
                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Instructors</span></a></li>
                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Teachers</span></a></li>

                            
                            
                               
                        </ul>
                    </nav>
                </div>
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
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Test User <i class="fa fa-angle-down"></i></h4>
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
            <div class="col-md-9"><p style="color:white;text-align:center;letter-spacing: 2.5px;">All Quizes</p></div>
            <div class="col-md-3">
            <button  id="addnewbtn" class="btn btn-primary"><span style="font-size: 17px;">+</span>Add New</button>
            </div>
            </div>
            <div id="reg-form" class="course-registration-form">
            
            <h4 style="padding-left: 8%; padding-top:2%;font-family:Arial;font-weight:600 !important;">Add New Quiz</h4>
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
              <form class="add-form" method="post" action="{{ route('quizes.store') }}" enctype='multipart/form-data' >
              @csrf

              @php
               $newunionid = abs( crc32( uniqid() ) );
             @endphp

              <input type="hidden" name="quizid" class="form-control" id="hidencoursecode" value="PC:{{ $newunionid }}">
              <input type="hidden" name="coursename" class="form-control" id="coursename" >
              <input type="hidden" name="coursetest" class="form-control" id="coursetest" >
              <input type="hidden" name="exam" class="form-control" id="exam" >
              <input type="hidden" name="papercat" class="form-control" id="papercategory" >
              <div class="form-group">
        <label for="exampleFormControlInput1">Quiz Name</label>
        <input type="text" name="quizname" class="form-control" id="exampleFormControlInput1" placeholder="Enter the name">
                </div>

                <div class="form-group">
                    <label>Course</label>
                           <select class="form-control coursedropdown" name="courseid" class="form-control">
                                   @foreach($courses as $course)
                                       <option value="{{ $course->id }}">{{ $course->coursename }}</option>
                                     @endforeach
                    </select>
              </div>

              <div class="form-group">
       <label>Course Test</label>

       <select class="form-control coursemodedropdown" name="coursetestid" class="form-control">
       
      @foreach($coursetests as $coursetest)

         <option value="{{ $coursetest->id }}">{{ $coursetest->test_title }}</option>

        @endforeach
      </select>
      </div>

                <div class="form-group">
                    <label>Exam</label>
                           <select name="examid" class="form-control examdropdown">
                           <option value="1"></option>
                                        @foreach($exams as $exam)
                                       <option value="{{ $exam->id }}">{{ $exam->Exam_title }}</option>
                                     @endforeach

                                     
                    </select>
              </div>
              
    
  

  <div class="form-group">
  <label>Paper Category</label>

<select class="form-control papercatdropdown" name="papercatid" >

@foreach($papercategories as $papercategory)

<option value="{{ $papercategory->id }}">{{ $papercategory->categoryname }}</option>

@endforeach
</select>
  </div>
  <div class="form-group">
        <label for="exampleFormControlInput1">Allowed Time</label>
        <input type="text" name="time" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>

  <button type="submit" class="btn btn-primary mb-2">submit</button>
 
               </form>



            </div>
<div class="details">

    <table id="quiztab" class="table table-bordered">
        <thead class="table-head">
        <tr>
            <th style="display:none">id</th>
            <th>Quize code</th>
            <th>Quize name</th>
            <th width="106px">Course Name</th>
            <th width="202px">Course test</th>
            <th>Exam</th>
            <th>time</th>
            <th>Paper type</th>
            <th style="display:none">Courseid</th>
            <th style="display:none">coursetestid</th>
            <th style="display:none">Examid</th>
            <th style="display:none">paperid</th>
            <th width="150px">Action</th>
        </tr>
      </thead>
        <tbody>
 
        @foreach ($quizes as $quiz)
        <tr class="data-row">
            <td style="display:none;" class="align-middle quizid">{{ $quiz->id }}</td>
            <td class="align-middle modeCode">{{ $quiz->quizid }}</td>
            <td class="align-middle modeIcon">{{ $quiz->quizname }}</td>
            <td class="align-middle modetitle">{{ $quiz->coursename }}</td>
            <td class="align-middle modeDescription">{{ $quiz->coursetest }}</td>
           <td class="align-middle icon">{{ $quiz->exam }}</td>
           <td class="align-middle icon">{{ $quiz->time }}</td>
           <td class="align-middle icon">{{ $quiz->papercat }}</td>
           <th style="display:none">{{ $quiz->courseid }}</th>
            <th style="display:none">{{ $quiz->coursetestid }}</th>
            <th style="display:none">{{ $quiz->examid }}</th>
            <th style="display:none">{{ $quiz->papercatid }}</th>

            <td width="60%" class="align-middle" >
                
   
                    <a id="edit-item" class="btn btn-primary edit" >Edit</a>
                    
                   <form style="float:right;" method="post" action="{{ route('quizes.destroy',$quiz->id) }}">
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

            <div id="edit-model2" class="modal-body">
            
            <h4 style="padding-left: 8%; padding-top:2%;font-family:Arial;font-weight:600 !important;">update Quizes</h4>
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
              <form id="update-form" class="update-form" method="post" action="/paper-categories" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT')}}

              <input type="hidden" name="quizid" class="form-control" id="quizid" >
              <input type="hidden" name="coursename" class="form-control" id="coursenameu" >
              <input type="hidden" name="coursetest" class="form-control" id="coursetestu" >
              <input type="hidden" name="exam" class="form-control" id="examu" >
              <input type="hidden" name="papercat" class="form-control" id="papercategoryu" >
              <div class="form-group">
        <label for="exampleFormControlInput1">Quiz Name</label>
        <input type="text" name="quizname" class="form-control" id="quizname" placeholder="Enter the name">
                </div>

                <div class="form-group">
                    <label>Course</label>
                           <select class="form-control coursedropdown" name="courseid" class="form-control">
                                   @foreach($courses as $course)
                                       <option value="{{ $course->id }}">{{ $course->coursename }}</option>
                                     @endforeach
                    </select>
              </div>

              <div class="form-group">
       <label>Course Test</label>

       <select class="form-control coursetestdropdown" name="coursetestid" class="form-control">
       
      @foreach($coursetests as $coursetest)

         <option value="{{ $coursetest->id }}">{{ $coursetest->test_title }}</option>

        @endforeach
      </select>
      </div>

                <div class="form-group">
                    <label>Exam</label>
                           <select name="examid" class="form-control examdropdown">
                           <option value="1"></option>
                                        @foreach($exams as $exam)
                                       <option value="{{ $exam->id }}">{{ $exam->Exam_title }}</option>
                                     @endforeach

                                     
                    </select>
              </div>
              
    
  

  <div class="form-group">
  <label>Paper Category</label>

<select class="form-control papercatdropdown" name="papercatid" >

@foreach($papercategories as $papercategory)

<option value="{{ $papercategory->id }}">{{ $papercategory->categoryname }}</option>

@endforeach
</select>
  </div>
  <div class="form-group">
        <label for="exampleFormControlInput1">Allowed Time</label>
        <input type="text" name="time" class="form-control" id="time" placeholder="">
                </div>

  <button type="submit" class="btn btn-primary mb-2">Update</button>
 
 
               </form>



            </div>


      
    </div>
  </div>
</div>
            
        </div>
        <!-- main content area end -->
        <!-- footer area start-->

       

        <footer>
            <div class="footer-area">
                <!-- <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p> -->
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
   
    @section('js')
    <script src="{{ asset('vendor\unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script>
        //CKEDITOR.replace('TextareaforLongdescription');
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