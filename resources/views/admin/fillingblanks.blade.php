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

            </div>
            <!-- header area start -->
            <div class="row" id="top-of-site">
            <div class="col-md-9"><p style="color:white;text-align:center;letter-spacing: 2.5px;">Enter Filling Blanks Quiz Details</p></div>
            <div class="col-md-3">

            </div>
            </div>
</br></br>
            <div class="row">

 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="{{ route('fillingblanks.store') }}"  method="POST">


@csrf

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name">Quize Name</label>
  <div class="col-md-12">
  <select class="form-control papercatdropdown" name="quizid" >
  <option value=""></option>

  @foreach($quizes as $quize)

<option value="{{ $quize->id }}">{{ $quize->quizname}}</option>

@endforeach
</select>


</select>

  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-4">Question Type</label>
    <div class="col-sm-6">
      <div class="row" id="radioButtonContainerId">
        <div class="col-sm-5">
          <label class="radio-inline">
            <input type="radio"  id="Paragraph" value="Paragraph" name="questiontype" required><b>Paragraph</b>
          </label>
        </div>
      <div class="col-sm-5">
        <label class="radio-inline">
          <input type="radio" onclick="blanks()" id="Single" value="Single" name="questiontype"required><b>Single<b>
        </label>

      </div>
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qsn">Question</label>
  <div class="col-md-12">
  <textarea id="question" name="Question" placeholder="Question" class="form-control input-md"></textarea>

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>
  <div class="col-md-12">
  <input id="right" name="marks" placeholder="Marks on right answer" class="form-control input-md" min="0" type="number">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>
  <div class="col-md-12">
  <input id="options" name="blankoptions" placeholder="No of Blanks" class="form-control input-md" min="0" type="number">

  </div>
</div>

<!-- Text input-->


<!-- Text input-->



<!-- Text input-->



<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12">
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>


        </div>
        <!-- main content area end -->
        <!-- footer area start-->

                <!-- header area start -->
                <!-- <div class="row" id="top-of-site">
                    <div class="col-md-9"><p style="color:white;text-align:center;letter-spacing: 2.5px;">Enter Filling Blanks Quiz Details</p></div>
                    <div class="col-md-3">


                    </div>
                </div>
                </br></br>
                <div class="row"> -->


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
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('vendor\unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor\unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script>

    </script>

    <script>
        CKEDITOR.replace('question');
        CKEDITOR.config.autoParagraph = false;

    </script>
    <script>
    $(function() {

      $('#Single').click(function () {
        document.getElementById("options").disabled = true;
        $('#options').val(1);


              });

              $('#Paragraph').click(function () {
        document.getElementById("options").disabled = false;



              });

    $('#question').ckeditor({
        toolbar: 'Full',
        enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
            });
        });
    </script>


    <!-- offset area end -->
    <!-- jquery latest version -->

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
