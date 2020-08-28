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
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> Test User <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="delete-opt" class="course-registration-form">

            <h4 style="padding-left: 8%; padding-top:2%;font-family:Arial;font-weight:600 !important;">Delete a option</h4>
            <a class="close" href="#">&times;</a>
            </br>
            @php
            $z=1;
            @endphp


              <form class="add-form" method="post" action="{{ route('mcqquizes.update',$qid) }}" enctype='multipart/form-data' >
              @csrf
              @method('PUT')
              <div class="form-group">
                    <label>Correct Option</label>
                           <select class="form-control coursedropdown" name="correctoptionid" class="form-control">
                           <option value="">Select correct option</option>
                                   @foreach($qsns as $qsn)
                                       <option value="{{ $qsn->id }}">option{{$z}}</option>
                                       @php
                                       $z++;
                                       @endphp
                                     @endforeach
                    </select>
           </div>
  <button type="submit" class="btn btn-primary mb-2">Delete this option</button>

               </form>



            </div>
            <!-- header area start -->
            <div class="row" id="top-of-site">
            <div class="col-md-8"><p style="color:white;text-align:center;letter-spacing: 2.5px;">Update Quiz Details</p></div>
            <div class="col-md-2">
            <a  href="addopt/{{ $qid }}" id="addnewbtn" style="color:white" class="btn btn-primary"><span style="font-size: 17px;">+</span>Add New option</a>
            </div>
            <div class="col-md-2">
            <a  id="delete-opt-btn"  style="color:white"  class="btn btn-primary"><span style="font-size: 17px;">+</span>Delete Option</a>
            </div>
            </div>
</br></br>
            <div class="row">



 <div class="col-md-3"></div><div class="col-md-6">
 @php
 $message = Session::get('message');
 if($message){
     echo  $message;
 }
@endphp



 <form method="post" action="{{ route('managemcq.store') }}">
@csrf
@php
$z=1;
$y=1;
@endphp

<input type="hidden" class="form-control" name="questionid" value="{{ $qid }}">
@foreach($qsns as $qsn)
<div class="">
      <input type="hidden" class="form-control" name="id[]" value="{{ $qsn->id }}">

    <div class="form-group">
        <input type="text" name="opt[]" class="form-control" id="exampleFormControlInput1" placeholder="option{{$z}}" value="{{ $qsn->option_value }}">
    </div>
</div>
     @php
$z++;
@endphp
@endforeach


<div class="form-group">
<label>Correct Option</label>
                           <select class="form-control coursedropdown" name="correctoptionid" class="form-control">
                           <option value="">Select correct option</option>
                                   @foreach($qsns as $qsn)
                                       <option value="{{ $qsn->id }}">option{{$y}}</option>
                                       @php
                                       $y++;
                                       @endphp
                                     @endforeach
                    </select>
</div>

 <button type="submit" class="btn btn-primary">Update the question</button>

  </form>
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
