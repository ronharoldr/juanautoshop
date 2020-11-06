<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Juan Auto Shop </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php base_url(); ?>css/bootstrap.min.css">
  <style>ul>li{ list-style: none; } .w100{ width: 100%; } .nav-link{ color: #fff; } .nav-pills .nav-link.active, .nav-pills .show>.nav-link{ color: #111; background-color: transparent; border-bottom: solid 2px black; }</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>var base_url = "<?php echo base_url(); ?>" </script>
</head>
<body>
  
<div class="container-fluid">
  <div class="row">

  <ul class="nav nav-pills mb-3 w100 border bg-danger" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">New Paint Job</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Paint Jobs</a>
    </li>
  </ul>
  <div class="tab-content w100" id="pills-tabContent">


    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="row">
            <div class="col-md-12 text-center pt-5">
              <h3>New Paint Job</h3><br>
            </div>
            <div class="col-md-5 text-right px-2">
               <img class="img_current" src="img/default_car.png" height="200px" />
            </div>
            <div class="col-md-2 text-center px-2 pt-5">
               <img  src="img/default_arrow.png" height="40px" />
            </div>
            <div class="col-md-5 text-left px-2">
               <img class="img_target" src="img/default_car.png" height="200px" />
            </div>

            <div class="col-md-4 py-4 mt-5 ml-5">
              <strong>Car Details</strong><hr>
                
                <div class="row">
                    <div class="col-md-6">
                      <label class="mb-4 mt-2"> Plate No. </label> <br>
                      <label class="mb-4"> Current Color </label> <br>
                      <label class="mb-4"> Target Color </label> 
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="plate_no" class="form-control mb-2 plate_no" />

                        <select class="form-control  mb-2 current_color" name="current_color" >
                          <option></option>
                          <option value="Red">Red</option>
                          <option value="Green">Green</option>
                          <option value="Blue">Blue</option>
                        </select>

                        <select class="form-control mb-2 target_color" name="target_color" >
                          <option></option>
                          <option value="Red" class="r" >Red</option>
                          <option value="Green" class="g">Green</option>
                          <option value="Blue" class="b">Blue</option>
                        </select>
                    </div>   
                </div>
                <hr><button class="btn btn-danger float-right px-4 btn-submit"> Submit </button>

              </div>
      </div>
    </div>


    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

              <div class="row px-5">

                <div class="col-md-8"> 
                    <strong class="ml-2">Paint Jobs In Progress</strong>
                    <table class="w100 table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Plate No</th>
                          <th scope="col">Current Color</th>
                          <th scope="col">Target Color</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="tbody_progress">
                      </tbody>
                    </table>
                </div>
                
                <div class="col-md-4 px-0 pt-4"> 
                  <div class="bg-danger w100 pb-1"> <strong class="text-white pl-2">SHOP PERFORMANCE </strong> </div>
                  <ul>
                    <li>Total Cars Painted: <strong class="float-right mr-2 total"></strong> </li>
                    <li>Breakdown: </li>
                    <li class="pl-3">Blue <strong class="float-right mr-2 blue_total"></strong></li>
                    <li class="pl-3">Red <strong class="float-right mr-2 red_total"></strong></li>
                    <li class="pl-3">Green <strong class="float-right mr-2 green_total"></strong></li>
                  </ul>
                </div>

                <div class="col-md-8  mt-5">
                
                      <strong class="ml-2">Paint Queue</strong>
                      <table class="w100 table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Plate No</th>
                            <th scope="col">Current Color</th>
                            <th scope="col">Target Color</th>
                          </tr>
                        </thead>
                        <tbody class="tbody_queue">
                        </tbody>
                      </table>

                </div>

              </div>
    </div>

  </div>
  
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="<?php base_url(); ?>js/default.js"></script>
<script>
$(document).ready(function(){

  $('.btn-submit').click(function(){
   var plate_no = $('.plate_no').val();
   var target_color = $('.target_color').val();
   var current_color = $('.current_color').val();
    if(plate_no == ''){ $('.plate_no').attr("class","form-control mb-2 plate_no border-danger"); return false; }
    if(target_color == ''){ $('.target_color').attr("class","form-control mb-2 target_color border-danger"); return false; }
    if(current_color == ''){ $('.current_color').attr("class","form-control mb-2 current_color border-danger"); return false; }

    $.ajax({
				type:"POST",
				dataType:'json',
			  //async : false,
				data:{plate_no:plate_no, current_color:current_color, target_color:target_color },
				url: base_url+"Welcome/add_job",
				success: function(data) {
				}
      }); 

      alert('Car with plate no: '+plate_no+' successfully submited for paint job');

  });

  $('.plate_no').change(function(){
    if($(this).val() != ''){ $(this).attr('class','form-control mb-2 plate_no'); }
  });

  $('.target_color').change(function(){
    if($(this).val() != ''){ $(this).attr('class','form-control mb-2 target_color'); }
  });

  $('.current_color').change(function(){
    if($(this).val() != ''){ $(this).attr('class','form-control mb-2 current_color'); }
  });

  var progress = 0;

  $( "body" ).delegate( ".complete", "click", function() {
      var plate_no = $(this).attr('plate_no');
      
      alert(plate_no);

      $.ajax({
				type:"POST",
				dataType:'json',
			  //async : false,
				data:{plate_no:plate_no },
				url: base_url+"Welcome/mark_complete",
				success: function(data) {
				}
      }); 

      $('.'+plate_no).remove();
      alert('Car with plate no: '+plate_no+' is completed');
    });
    
  setInterval(function() 
		{
      $('.tbody_progress').children().remove(); 
      $('.tbody_queue').children().remove(); 

      var html = '';
			$.ajax({
				type:"POST",
				dataType:'json',
				async : true,
				//data:{myid:id, chat_type:chat_type},
				url: base_url+"Welcome/get_jobs",
				success: function(data) {
          progress = data.length;
					for(var i=0; i <= data.length-1; i++)
					{
            $('.tbody_progress').append('<tr class="'+data[i].Plate_No+'"><td>'+data[i].Plate_No+'</td><td>'+data[i].Current_Color+'</td><td>'+data[i].Target_Color+'</td><td><a href="#" class="complete text-danger" plate_no="'+data[i].Plate_No+'" > Make as Completed </a> </td></tr>');
					}
				}
      });
      
      $.ajax({
				type:"POST",
				dataType:'json',
				async : true,
				//data:{myid:id, chat_type:chat_type},
				url: base_url+"Welcome/get_completed",
				success: function(data) {
          $('.total').text(data.length);
          var red_total = 0;
          var green_total = 0;
          var blue_total = 0;
					for(var i=0; i <= data.length-1; i++)
					{
            if(data[i].Target_Color == "Red"){ red_total = red_total+1; }
            if(data[i].Target_Color == "Green"){ green_total = green_total+1; }
            if(data[i].Target_Color == "Blue"){ blue_total = blue_total+1; }
          }
          $('.red_total').text(red_total);
          $('.green_total').text(green_total);
          $('.blue_total').text(blue_total);
				}
      });

      if(progress < 5){ return false; }

        $.ajax({
          type:"POST",
          dataType:'json',
          async : true,
          //data:{myid:id, chat_type:chat_type},
          url: base_url+"Welcome/get_queue",
          success: function(data) {
            for(var i=0; i <= data.length-1; i++)
            {
              $('.tbody_queue').append('<tr class="'+data[i].Plate_No+'"><td>'+data[i].Plate_No+'</td><td>'+data[i].Current_Color+'</td><td>'+data[i].Target_Color+'</td></tr>');
            }
          }
        });

    }, 5000);


   
    
  });
</script>
</body>
</html>
