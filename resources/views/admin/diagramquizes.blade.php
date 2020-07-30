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
            <div class="col-md-9"><p style="color:white;text-align:center;letter-spacing: 2.5px;">Diagram quiz model </p></div>
            <div class="col-md-3">
            <button  id="addnewbtn" class="btn btn-primary"><span style="font-size: 17px;">+</span>Add Question</button>
            </div>
            </div>
            </br>
            </br>
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div id="success-message"></div>
            <div id="questionform">
             <form id="reqbody" action="" method="post">
              @csrf
              <div id="form-req"></div>
             </form>
            </div>
            </div>
            <div class="col-md-3"></div>
            </div>
            <div id="reg-form" class="course-registration-form">
            
            <h4 style="padding-left: 8%; padding-top:2%;font-family:Arial;font-weight:600 !important;">Add a quiz</h4>
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
              
         <form enctype="multipart/form-data"  id="contactForm">
    @csrf
    <div class="form-group">
              <label>Quiz Name</label>
              <select class="form-control papercatdropdown" name="quizid"  id="paper-drop" >
                                    <option value=""></option>

                                    @foreach($quizes as $quize)

                                    <option value="{{ $quize->id }}">{{ $quize->quizname}}</option>

                                    @endforeach
                </select>

                </div>

                <div class="form-group">
                 <input type="file" name="diagram" class="form-control"  id="diagram">
                </div>

                <div class="form-group">
                <label for="exampleFormControlTextarea1">No of labels in Diagram</label>
               <input  id="labels" type="number" name="nooflables" class="form-control"  />
                </div>
             <div class="form-group">
               <label for="exampleFormControlTextarea1">No of Questions</label>
               <input id="questions" type="number" name="noofquestions" class="form-control"  />
             </div>
             <div class="form-group">
               <label for="exampleFormControlTextarea1">Allocated marks Per Quetion</label>
               <input id="marks" type="number" name="marks" class="form-control"  />
             </div>
        <div class="form-group">
            <button class="btn btn-success" id="submit">Submit</button>
        </div>
    </form>





            </div>
           

            
            </div>

            


      
    </div>
  </div>
</div>
            
        </div>
        <!-- main content area end -->
        <!-- footer area start-->

        <div class="alert" id="message" style="display: none"></div>
        <span id="uploaded_image"></span>
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
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
   $(document).ready(function(){
     
    $('#contactForm').on('submit',function(event){
        event.preventDefault();

       // alert("loading");

        $.ajax({
          url: "/admin/home/diagramquizes",
          type:"POST",
        //   data:{
        //     "_token": "{{ csrf_token() }}",
        //     name:name,
        //     email:email,
        //     mobile_number:mobile_number,
        //     subject:subject,
        //     message:message,
        //   },
        data: new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
         processData: false,
          success:function(response){
            //alert(response.success);
            $("#form-req").html(response.success);
            $("#reg-form").css("display", "none");
          },
         });

        });

       
    });

    </script>
</body>

</html>