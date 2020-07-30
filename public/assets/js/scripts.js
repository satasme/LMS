
(function($) {
    "use strict";

    /*================================
    Preloader
    ==================================*/

    //$('.coursedropdown option[value=2]').attr('selected','selected');

    $("select.coursedropdown").change(function(){
        var selectedval = $(this).children("option:selected").text();
        alert(selectedval);
        $('#coursename').val(selectedval);
        $('#hiddencourseid').val(selectedval);
        $('#coursename').val(selectedval);
        $('#coursenameu').val(selectedval);
        
       // alert("You have selected the country - " + selectedCountry);
    });

    $("select.coursetestdropdown").change(function(){
        var selectedval = $(this).children("option:selected").text();
        alert(selectedval);
        $('#coursename').val(selectedval);
        $('#coursename').val(selectedval);
        $('#coursetestu').val(selectedval);
       // $('#hiddencourseid').val(selectedval);
        
        
       // alert("You have selected the country - " + selectedCountry);
    });


    $("select.testcoursedropdown").change(function(){
        var selectedval = $(this).children("option:selected").text();
        alert(selectedval);
        $('#coursetestname').val(selectedval);
       // $('#hiddencourseid').val(selectedval);
        
        
       // alert("You have selected the country - " + selectedCountry);
    });
    

    $("select.examdropdown").change(function(){
        var selectedval = $(this).children("option:selected").text();
        alert(selectedval);
        $('#exam').val(selectedval);
        $('#examu').val(selectedval);
       // $('#hiddencourseid').val(selectedval);
        
        
       // alert("You have selected the country - " + selectedCountry);
    });

    $("select.coursemodedropdown").change(function(){
        var selectedval = $(this).children("option:selected").text();
        alert(selectedval);
        $('#coursetest').val(selectedval);
       // $('#hiddencoursemodeid').val(selectedval);
        
       // alert("You have selected the country - " + selectedCountry);
    });

    $("select.papercatdropdown").change(function(){
        var selectedval = $(this).children("option:selected").text();
        alert(selectedval);
        $('#papercategory').val(selectedval);
        $('#hiddenpapercategoryid').val(selectedval);
        $('#papercategoryu').val(selectedval);
       // alert("You have selected the country - " + selectedCountry);
    });

    


    var preloader = $('#preloader');
    $(window).on('load', function() {
        setTimeout(function() {
            preloader.fadeOut('slow', function() { $(this).remove(); });
        }, 300)
    });

    $(".close").on('click', function(event){
        $("#reg-form").css("display", "none");
        $("#edit-model").css("display", "none");
        $("#edit-model2").css("display", "none");
        $("#delete-opt").css("display", "none")
        //(... rest of your JS code)
    });

    $( "#addnewbtn" ).click(function() {
        $("#reg-form").css("display", "block")
    });

    $( "#delete-opt-btn" ).click(function() {
        $("#delete-opt").css("display", "block");
    });

  //  $('table').load(location.href + " table", function(){
        
        var table1 = $('#modetab').DataTable();
        console.log(table1);

    table1.on('click','.edit',function() {
        
        var $tr =  $(this).closest('tr');

        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var data=table1.row($tr).data();
        console.log(data);
         
        $('#modeid').val(data[1]);
        $('#mode-name').val(data[3]);
        $('#description').val(data[4]);
        $('icon-img').val(data[5]);
        $("#imagehere").append(data[2]);

       // $('#coursename').val(data[1]);
       // $('#shortdescription').val(data[3]);
       // $('#longdescrption').val(data[4]);
         
        $('#update-form').attr('action','http://127.0.0.1:8000/coursemodes/'+data[0]);

        $('#edit-model1').css("display", "block");
});

  // });
    
   
    


    var table = $('#datatable').DataTable();

    table.on('click','.edit',function() {
        

        var $tr =  $(this).closest('tr');

        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var datas=table.row($tr).data();
        console.log(datas);
         
        
        $('#coursecode').val(datas[0]);
        $('#coursename').val(datas[1]);
        $('#shortdescription').val(datas[3]);
        $('#longdescrption').val(datas[4]);
        $('#update-form').attr('action','http://127.0.0.1:8000/courses/'+datas[0]);

        $('#edit-model').css("display", "block");

       

        
    

    });

    var table3= $('#paptab').DataTable();
    console.log(table3);

    table3.on('click','.edit',function() {
        var $tr =  $(this).closest('tr');

        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var datas=table3.row($tr).data();
        console.log(datas);
         
        //alert("ok");
        
        $('#categoryid').val(datas[1]);
        $('#categoryname').val(datas[3]);
        $('#description').val(datas[4]);
        $("#imagehere").append(datas[2]);
       // $('#longdescrption').val(datas[4]);

        $('#update-form').attr('action','http://127.0.0.1:8000/papercategories/'+datas[0]);

        $('#edit-model2').css("display", "block");

    });


    var table4= $('#quiztab').DataTable();
    console.log(table3);

    table4.on('click','.edit',function() {
        var $tr =  $(this).closest('tr');

        if($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }

        var datas=table4.row($tr).data();
        console.log(datas);
         
        //alert("ok");
        var datac= "2";
       
        $('#quizid').val(datas[1]);
        $('#quizname').val(datas[2]);
        //$('#coursename').val(datas[3]);
        //$('#coursetest').val(datas[4]);
        //$('#exam').val(datas[5]);
       // $('#papercategory').val(datas[7]);
        $('#hiddencoursename').val(datas[4]);
        $('#time').val(datas[6]);
        //$('.coursedropdown option[value = 2]').attr('selected','selected');
        $(".coursedropdown").val(datas[8]);
        $(".coursetestdropdown").val(datas[9]);
        $(".papercatdropdown").val(datas[11]);
        $(".examdropdown").val(datas[10]);
        
        

         /*
        $('#description').val(datas[4]);
        $("#imagehere").append(datas[2]);
        */
       // $('#longdescrption').val(datas[4]);


        $('#update-form').attr('action','http://127.0.0.1:8000/quizes/'+datas[0]);

        $('#edit-model2').css("display", "block");

    });
    
      
    /*================================
    sidebar collapsing
    ==================================*/
    if (window.innerWidth <= 1364) {
        $('.page-container').addClass('sbar_collapsed');
    }
    $('.nav-btn').on('click', function() {
        $('.page-container').toggleClass('sbar_collapsed');
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function() {
        var e = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (e -= 67) < 1 && (e = 1), e > 67 && $(".main-content").css("min-height", e + "px")
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    sidebar menu
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $('.menu-inner').slimScroll({
        height: 'auto'
    });
    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover()

    /*------------- Start form Validation -------------*/
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    /*================================
    datatable active
    ==================================*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
    if ($('#dataTable2').length) {
        $('#dataTable2').DataTable({
            responsive: true
        });
    }
    if ($('#dataTable3').length) {
        $('#dataTable3').DataTable({
            responsive: true
        });
    }


    /*================================
    Slicknav mobile menu
    ==================================*/
    $('ul#nav_menu').slicknav({
        prependTo: "#mobile_menu"
    });

    /*================================
    login form
    ==================================*/
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $('.testimonial-carousel').owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1360: {
                    items: 1
                },
                1600: {
                    items: 2
                }
            }
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($('#full-view').length) {

        var requestFullscreen = function(ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var exitFullscreen = function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var fsDocButton = document.getElementById('full-view');
        var fsExitDocButton = document.getElementById('full-view-exit');

        fsDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });

        fsExitDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            exitFullscreen();
            $('body').removeClass('expanded');
        });
    }

})(jQuery);