<?php 
	$class = 'Four';
	$title = $class.' (Madrasah)';
	include '../elements/simpleheader.php';
	include'../six-eight-madrasah/examname.php';
	
?>
	<!--<div class="col-md-2" style="height: 500px; background: red">
		Class Four
	</div> -->
	<div class="col-md-10">
		<form id="search_form" class="form-inline">
			<div class="row text-center container-fluid">
				<div class="form-group text-center">
					<select name="classs" id="classs" class="box-pad" >
						<option value="Four">Four</option>
						 <option style="display:none" value="Seven">Seven</option>
					</select>
					<select name="semester" id="semester" class="box-pad">
						<option value="<?php echo $setting['semester'] ?>"><?php echo $setting['semester'] ?></option>
						<?php echo semester() ?>
					</select>
					<select name="year" id="year" class="box-pad">
						<option value="<?php echo $setting['year'] ?>"><?php echo $setting['year'] ?></option>
						<?php echo year() ?>
					</select>

					<input type="text" id="roll" class="" name="roll" placeholder="search (Roll)"/>

					<input type="button" name="search" id="search" class="btn btn-info box-pad" value="Search" />
					<h2 class="text-center" style="margin:0px"><b><?= $ses['school_name'] ?></b></h2>
				</div>
			</div>
			<div class=" container-fluid col-md-10 col-md-offset-2">
				
			</div>
		</form>
		
		<div id="response"></div>
	</div>
</body>
</html>

<script>  
 $(document).ready(function(){  
      $('#search').click(function(){  
           var classs = $('#classs').val();  
           var semester = $('#classs').val();  
           var year = $('#year').val();  
           var roll = $('#roll').val();  
         //  var message = $('#message').val();  
           if(roll == '')  
           {  
                $('#response').html('<span class="text-danger">Please take a Roll no </span>');  
           }  
           else  
           {  
                $.ajax({  
                     url:"fetch_form.php",  
                     method:"POST",  
                     data:$('#search_form').serialize(),  
                     beforeSend:function(){  
                          $('#response').html('<span class="text-info">Loading response...</span>');  
                     },  
                     success:function(data){  
                          $('form').trigger("reset");  
                          $('#response').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#response').fadeOut("fast");  
                          }, 600000);  
                     }  
                });  
           }  
      });  
 });  
 
 </script>  

<style type="text/css">
	.box-pad{
		padding: 3px;
	}
</style>