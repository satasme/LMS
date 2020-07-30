<!Doctype html>
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
                                        <li><a href="{{ url('admin/home/mcqquizes') }}">Add Mcq Quize</a></li>
                                        <li><a href="index3-horizontalmenu.html">Manage mcq quize</a></li>
                                        <li><a href="{{ url('admin/home/fillingblanks') }}">Add Filling Blanks Quize</a></li>
                                        <li><a href="{{ url('admin/home/managefillingblanks') }}">Manage Filling Blanks Quizes</a></li>
                                    
                                        <li><a href="{{ url('Admin/short_answer_model') }}">Short answer Quizes</a></li>

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
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Test user <i class="fa fa-angle-down"></i></h4>
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
                    <div class="col-md-9"><p style="color:white;text-align:center;letter-spacing: 2.5px;">All Paper Questions for Blanks model</p></div>
                    <div class="col-md-3">

                    </div>
                </div>


                <!-- main content area end -->
                <!-- footer area start-->

                <div class="row">

                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6" style="margin-top: 50px">
                    <form class="form-horizontal title1" name="add_name" id="add_name">
                    <div class="alert alert-danger print-error-msg" style="display:none"><ul></ul></div>
                                            <div class="alert alert-success print-success-msg" style="display:none"><ul></ul></div>

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
                            <label class="col-md-12 control-label" for="right"></label>
                            <div class="col-md-12">
                                <input id="question" name="question" placeholder="Type Question here" class="form-control input-md" min="0" type="text">

                            </div>
                        </div>



                                <div class="container ">
                                    <h5 align="left"> Add Answers</h5>
                                    <div class="form-group" style="margin-top: -25px;">
                                        <!-- <form   > -->
                                        <!-- @csrf -->

                                            
                                            </br></br>
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="dynamic_field" border="0">
                                                        <tr>
                                                        <td>
                                                            <label style="padding-top:10px" for="">1</label>
                                                            </td>
                                                            <td><input type="text" name="shortanswer_value[]" placeholder="Enter answer" class="form-control name-list">
                                                            </td>
                                                            <!-- <td>
                                                            <div class="radio" style="padding-top:10px"><label><input type="radio" name="optradio[]" ></label></div>
                                                            </td> -->
                                                            <td><button type="button" name="add" id="add" class="btn btn-success btn-sm">Add more </button></td>
                                                        </tr>
                                                    </table>
                                                    <div class="form-group">
                                                            <label class="col-md-12 control-label" for="right"></label>
                                                            <!-- <div class="col-md-12"> -->
                                                                <input id="correct" name="correct" placeholder="Type correct answer number" class="form-control input-md" min="0" type="text">

                                                            <!-- </div> -->
                                                        </div>
                                                <input type="button" name="submit" id="submit" class="btn btn-info btn-sm" value="submit">
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                                </div>



<!-- </form> -->
                        <!-- <div class="form-group"style="margin-top: -20px">
                            <label class="col-md-12 control-label" for="wrong"></label>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#myModal">Secondary</button>

                            </div>
                        </div> -->

                        <!-- <form method="post" id="dynamic_form">
                                            <span id="result"></span>
                                            <table class="table table-bordered table-striped" id="user_table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px">Answer</th>
                                                        <th style="width: 200px">Correct answer</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td col span="2" align="right"></td>

                                                        <td>
                                                            @csrf
                                                            <input type="submit" name="save" id="save" class="btn btn-info btn-sm" value="Save"/>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </form> -->




                        <!-- <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">


                                <div class="modal-content">
                                    <div class="modal-header">

                                        <form method="put" id="dynamic_form">
                                            <span id="result"></span>
                                            <table class="table table-bordered table-striped" id="user_table">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 200px">Answer</th>
                                                        <th style="width: 200px">Correct answer</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2" align="right"></td>

                                                        <td>
                                                            @csrf
                                                            <input type="submit" name="save" id="save" class="btn btn-info btn-sm" value="Save"/>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div> -->



                        </form>
                    </div>


                </div>
            </div>

            <footer>
                <div class="footer-area">
                    <!-- <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p> -->
                </div>
            </footer>
            <!-- footer area end-->
        </div>
        @section('js')
        <!-- <script src="{{ asset('vendor\unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('vendor\unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
        <script>
CKEDITOR.replace('qsn');
CKEDITOR.config.autoParagraph = false;

        </script> -->

        <script type="text/javascript">
            // $(function () {

                // $('#qsn').ckeditor({
                //     toolbar: 'Full',
                //     enterMode: CKEDITOR.ENTER_BR,
                //     shiftEnterMode: CKEDITOR.ENTER_P
                // });
            // });


      </script>

        <!-- page container area end -->
        <!-- offset area start -->

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
        <script src="{{ asset('assets/js/index.js') }}"></script>

        <script type="text/javascript">



</script>


    </body>

</html>
