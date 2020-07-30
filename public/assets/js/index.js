
(function($) {

  $('#reqbody').on('submit',function(event){
    event.preventDefault();

   // alert("loading");

    $.ajax({
      url: "/diagramquizes/updatediagram",
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
        
        $("#questionform").css("display", "none");
        $("#success-message").html(response.success);
        //alert(response.success);
       
      },
     });

    });
    
      
    
    $('#diagram-register').on('submit',function(event) {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
       
       
       event.preventDefault();
       formData=$("#diagram-register").serialize();
       url= $('#diagram-register').attr('action');
       alert(formData)
       alert(url);
       // var formData = new FormData(document.getElementById("diagram-register"));
      // var formData = $(event.form).serialize();
      
        $.ajax({
            type:'POST',
            url: url,
            //data:  {diagram: "dfgg", nooflables: nooflables, noofquestions: noofquestions,quizid: quizid},
           //data:formData,
           data:formData,
            cache:false,
            //contentType: false,
            contentType: "application/json",
            processData: false,
            success: (data) => {
                
                $('#message').css('display', 'block');
               $('#message').html(data.message);
                 $('#message').addClass(data.class_name);
                $('#uploaded_image').html(data.uploaded_image);
                $('#reg-form').css('display', 'none');
            },
            error: function(data){
                console.log(data);
            }
        });
        
       
     
    });
    


    $('#search').on('change', function() {
         var optionSelected = $(this).find("option:selected");
          var prop_type = optionSelected.val();
         // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        

          
     $.ajax({
            
           type: "get",
           url: "/searchbox/" ,
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
           

           // url: "{{URL::to('search') }}",
            
            data: {
                'search' : prop_type,
            },
        
            success:function(data)
             {
             $("#ajax-body").html(data);
             },

             error: function() {
                console.log("error");
            }

      }); 
      
  });


  //
  $('#pape-category').on('change', function() {
    var optionSelected = $(this).find("option:selected");
     var prop_type = optionSelected.val();
     var cat= $('#paper-drop').val();
      if(cat==''){
        alert("please select a paper first");
      }

      
     
    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

   

 
$.ajax({
       
      type: "get",
      url: "/fillbox/" ,
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
      

      // url: "{{URL::to('search') }}",
       
       data: {
           'papertypeval' : prop_type,
           'qid' : cat,
       },
   
       success:function(data)
        {
        $("#ajax-body").html(data);
        },

        error: function() {
           console.log("error");
       }

 }); 

 
});



})(jQuery);