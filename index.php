<!DOCTYPE html>
<html>
<head>
	<title>Alumnae Website</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<h1 class="text-primary text-center">Alumnae Regiseration</h1>
		<div class="d-flex justify-content-end">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Alumnae Register</button>
		</div>
		<h2 class="text-danger">All Records</h2>

		<div id="records_contant">
			
		</div>

		<!-- The Modal -->
		<div class="modal" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Alumae Registration</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        	<div class="form-group">
		        		<label>First Name :</label>
		        		<input type="text" name="" id="fname" class="form-control" placeholder="First Name">	
		        	</div>
		        	<div class="form-group">
		        		<label>Last Name :</label>
		        		<input type="text" name="" id="lname" class="form-control" placeholder="Last Name">	
		        	</div>
		        	<div class="form-group">
		        		<label>Email :</label>
		        		<input type="text" name="" id="email" class="form-control" placeholder="Email ID">	
		        	</div>
		        	<div class="form-group">
		        		<label>Mobile No :</label>
		        		<input type="text" name="" id="mobile" class="form-control" placeholder="Mobile No">	
		        	</div>
		        	<div class="form-group">
		        		<label>Current Job :</label>
		        		<input type="text" name="" id="job" class="form-control" placeholder="Job">	
		        	</div>
		        	<div class="form-group">
		        		<label>Batch :</label>
		        		<select name="batch" id="batch" required="">
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>				  
						</select>
		        	</div>
		        </div>
		 

		      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Register</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>

		    </div>
		  </div>
		</div>


		<!-- ///update -->

		<div class="modal" id="update_user_modal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Alumae Registration</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>

		      <!-- Modal body -->
		      <div class="modal-body">
		        	<div class="form-group">
		        		<label>Update First Name :</label>
		        		<input type="text" name="" id="update_fname" class="form-control" placeholder="First Name">	
		        	</div>
		        	<div class="form-group">
		        		<label>Update Last Name :</label>
		        		<input type="text" name="" id="update_lname" class="form-control" placeholder="Last Name">	
		        	</div>
		        	<div class="form-group">
		        		<label>Update Email :</label>
		        		<input type="text" name="" id="update_email" class="form-control" placeholder="Email ID">	
		        	</div>
		        	<div class="form-group">
		        		<label>Update Mobile No :</label>
		        		<input type="text" name="" id="update_mobile" class="form-control" placeholder="Mobile No">	
		        	</div>
		        	<div class="form-group">
		        		<label>Update Current Job :</label>
		        		<input type="text" name="" id="update_job" class="form-control" placeholder="Job">	
		        	</div>
		        	<div class="form-group">
		        		<label>Update Batch :</label>
		        		<select name="batch" id="update_batch" required="">
						  <option value="2017">2017</option>
						  <option value="2018">2018</option>
						  <option value="2019">2019</option>				  
						</select>
		        	</div>
		        </div>
		 

		      <!-- Modal footer -->
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateUserDetails()">Update</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        <input type="hidden" name="" id="hidden_user_id">
		      </div>

		    </div>
		  </div>
		</div>

	</div>
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script type="text/javascript">

  	$(document).ready(function(){
  		readRecords()
  	});

  	function readRecords(){
  		var readRecord = "readRecord";

  		$.ajax({

  			url : "backend.php",
  			type : "post",
  			data : {readRecord : readRecord},

  			success : function(data, status){
  				$('#records_contant').html(data);
  			}

  		});

  	}


  	function addRecord(){
  		var fname = $('#fname').val();
  		var lname = $('#lname').val();
  		var email = $('#email').val();
  		var mobile = $('#mobile').val();
  		var job = $('#job').val();
  		var batch = $('#batch').val();

  		$.ajax({

		url:"backend.php",
		type:'post',
		data : { fname : fname,
			lname : lname,			
			email : email,
			mobile : mobile,
			job : job,			
			batch : batch,
		},
		success : function(data, status){
			readRecords();

		}

	});
  	}

  	function DeleteUser(deleteid){
  		var conf = confirm("Are you sure!");

  		if(conf == true){
  			$.ajax({
  				url : "backend.php",
  				type : "post",
  				data : {deleteid : deleteid},
  				success : function(data, status){
					readRecords();

				}

  			});
  		}

  	}

  	function GetUserDetails(id){

  		$('#hidden_user_id').val(id);

  		$.post("backend.php",
  				{id : id},
  				function (data, status){

  					var user = JSON.parse(data);

  					$('#update_fname').val(user.fname);
  					$('#update_lname').val(user.lname);
  					$('#update_email').val(user.email);
  					$('#update_mobile').val(user.mobile);
  					$('#update_job').val(user.job);
  					$('#update_batch').val(user.batch);
  				}

  			);

  		$('#update_user_modal').modal("show");

  	}

  	function updateUserDetails(){
  		var fname1 = $('#update_fname').val();
  		var lname1 = $('#update_lname').val();
  		var email1 = $('#update_email').val();
  		var mobile1 = $('#update_mobile').val();
  		var job1 = $('#update_job').val();
  		var batch1 = $('#update_batch').val();

  		var hidden_user_id1 = $('#hidden_user_id').val();

  		$.post("backend.php",
  				{
  					hidden_user_id1 : hidden_user_id1,
  					fname1 : fname1,
  					lname1 : lname1,
  					email1 : email1,
  					mobile1 : mobile1,
  					job1 : job1,
  					batch1 : batch1
  				},
  				function (data,status){
  					 $('#update_user_modal').modal("hide");
  					readRecords();
  				}

  			);

  	}


  </script>

</body>
</html>