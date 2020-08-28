<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LMS Question Paper</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <!--    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">-->
    <!-- Ionicons -->
    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Tempusdominus Bbootstrap 4 -->
    <!--    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">-->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="{{asset('sentura-css/sentura/plugin/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/plugin/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Main style -->
    <link rel="stylesheet" href="{{asset('sentura-css/sentura/css/main_style.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed" id="container">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark navbar-secondary">
        <!--Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <h3 id="timerId"></h3>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block nav-cursor">
                <a class="nav-link" id="mcqNavId" onclick="mcqClick()">MCQ</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block nav-cursor">
                <a class="nav-link" id="writingNavId" onclick="writingClick()">Writing</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block nav-cursor">
                <a class="nav-link" id="listingNavId" onclick="listingClick()">Listing</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block nav-cursor">
                <a class="nav-link" id="speakingNavId" onclick="speakingClick()">Speaking</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <img src="{{asset('sentura-css/sentura/img/avatar5.png')}}" alt="Avatar"
                     style="width:45px;border-radius: 50%;">
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->


    <!--MCQ CONTENT START-->
    <form action="mcq-submit" method="post">
        @csrf
        <div class="container-fluid" id="mcqContentDivId" style="display: none">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>MCQ Question</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                                <!--<li class="breadcrumb-item active">Timeline</li>-->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @foreach($mcq_option_list as $mcq_quize)

                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">Question no. </span>
                                </div>
                                <div>
                                    <!--<i class="fas fa-envelope bg-blue"></i>-->
                                    <div class="timeline-item">
                                        <!--<span class="time"><i class="fas fa-clock"></i> 12:05</span>-->
                                        <h3 class="timeline-header">{{$mcq_quize['Question']}}</h3>

                                        <div class="timeline-body">
                                            <div class="col-sm-6">
                                                <!-- radio -->
                                                @foreach($mcq_quize['options_list'] as $mcq_quizzes_option)
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                           value="{{$mcq_quizzes_option['id']}}" type="radio"
                                                           name="{{$mcq_quize['id']}}">
                                                    <label
                                                        class="form-check-label">{{$mcq_quizzes_option['option_value']}}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    @endforeach
                    <button type="submit" class="btn bg-primary submit-btn-fixed">submit</button>
                </div>
                <!-- /.timeline -->
            </section>
        </div>
        <!--MCQ CONTENT END-->
    </form>


    <!--WRITING CONTENT START-->
    <form action="writing-submit" method="post">
        @csrf
        <div class="container-fluid" id="writingContentDivId" style="display: none">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Writing Question</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                                <!--<li class="breadcrumb-item active">Timeline</li>-->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @foreach($Writing_list as $writing)
                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">Question no. 01</span>
                                </div>
                                <div>
                                    <!--<i class="fas fa-envelope bg-blue"></i>-->
                                    <div class="timeline-item">
                                        <!--<span class="time"><i class="fas fa-clock"></i> 12:05</span>-->
                                        <h3 class="timeline-header">{{$writing['quizname']}}</h3>

                                        <div class="timeline-body">
                                            <div class="col-sm-12">
                                                <!-- radio -->
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3"
                                                                  name="{{$writing['id']}}"
                                                                  placeholder="Enter ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <!--<a class="btn btn-primary btn-sm">Read more</a>-->
                                            <!--<a class="btn btn-danger btn-sm">Delete</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    @endforeach
                    <button type="submit" class="btn bg-primary submit-btn-fixed">submit</button>
                </div>
                <!-- /.timeline -->
            </section>
        </div>
    </form>
    <!--WRITING CONTENT END-->


    <!--LISTING CONTENT START-->
    <form action="listening-submit" method="post">
        @csrf
        <div class="container-fluid" id="listingContentDivId" style="display: none">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Listening Question</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                                <!--<li class="breadcrumb-item active">Timeline</li>-->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @foreach($Listening_list as $listening)
                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">Question no. 01</span>
                                </div>
                                <div>
                                    <!--<i class="fas fa-envelope bg-blue"></i>-->
                                    <div class="timeline-item">
                                        <!--<span class="time"><i class="fas fa-clock"></i> 12:05</span>-->
                                        <h3 class="timeline-header">{{$listening['quizname']}}</h3>
                                        <audio controls>
                                            <!--<source src="horse.ogg" type="audio/ogg">-->
                                            <source
                                                src="https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_1MG.mp3"
                                                type="audio/mpeg">
                                        </audio>

                                        <div class="timeline-body">
                                            <div class="col-sm-12">
                                                <!-- radio -->
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3"
                                                                  name="{{$listening['id']}}"
                                                                  placeholder="Enter ..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <!--<a class="btn btn-primary btn-sm">Read more</a>-->
                                            <!--<a class="btn btn-danger btn-sm">Delete</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    @endforeach
                    <button type="submit" class="btn bg-primary submit-btn-fixed">submit</button>
                </div>
                <!-- /.timeline -->
            </section>
        </div>
    </form>
    <!--LISTING CONTENT END-->


    <!--SPEAKING CONTENT START-->
    <form action="speaking-submit" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid" id="speakingContentDivId" style="display: none">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Speaking Question</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
                                <!--<li class="breadcrumb-item active">Timeline</li>-->
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @foreach($Speaking_list as $speaking)
                    <!-- Timelime example  -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">Question no. 01</span>
                                </div>
                                <div>
                                    <!--<i class="fas fa-envelope bg-blue"></i>-->
                                    <div class="timeline-item">
                                        <!--<span class="time"><i class="fas fa-clock"></i> 12:05</span>-->
                                        <h3 class="timeline-header">{{$speaking['quizname']}}</h3>
                                        <input type="text" name="speaking_id" value="{{$speaking['id']}}" style="display: none">


                                        <div class="timeline-body">
                                            <div id="controls">
                                                <button id="recordButton">Record</button>
                                                <button id="pauseButton" disabled>Pause</button>
                                                <button id="stopButton" disabled>Stop</button>
                                            </div>
                                            <div id="formats">Format: start recording to see sample rate</div>
                                            <p><strong>Recordings:</strong></p>
                                            <ol id="recordingsList"></ol>
                                            <input type="file" name="file" >
                                        </div>
                                        <!--                                    <div class="timeline-footer">-->
                                        <!--                                        <a class="btn btn-primary btn-sm">Read more</a>-->
                                        <!--                                        <a class="btn btn-danger btn-sm">Delete</a>-->
                                        <!--                                    </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    @endforeach
                    <button type="submit" class="btn bg-primary submit-btn-fixed">submit</button>
                </div>
                <!-- /.timeline -->
            </section>
    </form>

    <!--            <button type="submit" class="btn bg-primary">submit</button>-->
    <!--    </form>-->

</div>
<!--SPEAKING CONTENT END-->


<div id="cover">
    <div class="circle">
        <h1 id="countdown"></h1>
    </div>
</div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('sentura-css/sentura/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('sentura-css/sentura/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset('sentura-css/sentura/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{asset('sentura-css/sentura/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{asset('sentura-css/sentura/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{asset('sentura-css/sentura/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('sentura-css/sentura/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{asset('sentura-css/sentura/plugins/moment/moment.min.js') }}"></script>
<script src="{{asset('sentura-css/sentura/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script
    src="{{asset('sentura-css/sentura/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!--sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
<script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
<script src="{{asset('sentura-css/sentura/plugins/jquery/jquery.min.js') }}"></script>
<script src="js/app.js"></script>
<script src="{{asset('sentura-css/sentura/js/app.js') }}"></script>

<script>
    function base64() {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });
    }

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }

            if (minutes == 4) {
                $("#timerId").css("color", "#ff0000");
            }

            if (minutes === "00" && seconds === "00") {
                $("#cover").fadeIn(100);
                $("#timerId").css("display", "none");
            }

        }, 1000);
    }

    window.onload = function () {

        swal({
            title: "Just start your exam",
            text: "you will click the 'OK' button and after 10 second started your exam!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            allowOutsideClick: false,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $("#cover").fadeIn(100);
                    // alert("something");
                    // $("#cover").fadeOut(100);

                    var timeleft = 1;
                    var downloadTimer = setInterval(function () {
                        if (timeleft <= 0) {
                            clearInterval(downloadTimer);

                            $("#cover").fadeOut(100);

                            var fiveMinutes = 60 * 20,
                                display = document.querySelector('#timerId');
                            startTimer(fiveMinutes, display);

                            $(".circle").css("display", "none");
                            $("#mcqContentDivId").css("display", "block");
                        } else {
                            document.getElementById("countdown").innerHTML = timeleft;
                        }
                        timeleft -= 1;
                    }, 1000);
                } else {
                    window.location.href = "index.html";
                }
            });
    };

    function mcqClick() {
        // fetch('http://localhost:8000/get_quizzesofcoursecoursesetexampapercatid/3/2/2/4')
        //     .then(response => response.json())
        //     .then(data => console.log(data));
        $("#mcqContentDivId").css("display", "block");
        $("#writingContentDivId").css("display", "none");
        $("#listingContentDivId").css("display", "none");
        $("#speakingContentDivId").css("display", "none");
    }

    function writingClick() {
        $("#mcqContentDivId").css("display", "none");
        $("#writingContentDivId").css("display", "block");
        $("#listingContentDivId").css("display", "none");
        $("#speakingContentDivId").css("display", "none");
    }

    function listingClick() {
        $("#mcqContentDivId").css("display", "none");
        $("#writingContentDivId").css("display", "none");
        $("#listingContentDivId").css("display", "block");
        $("#speakingContentDivId").css("display", "none");
    }

    function speakingClick() {
        $("#mcqContentDivId").css("display", "none");
        $("#writingContentDivId").css("display", "none");
        $("#listingContentDivId").css("display", "none");
        $("#speakingContentDivId").css("display", "block");
    }

</script>
</body>
</html>
