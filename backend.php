<?php

$con = mysqli_connect('localhost', 'root', '', 'userdata');
extract($_POST);

if (isset($_POST['readRecord'])){

	$data = '<table class="table table-bordered table-striped">
				<tr>
					<th>No.</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Mobile No.</th>
					<th>Job</th>
					<th>Batch</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>';

	$displayquery = " SELECT `id`, `fname`, `lname`, `email`, `mobile`, `job`, `batch` FROM `info` WHERE 1 "; 
	$result = mysqli_query($con, $displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;

		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>
						<td>'.$number.'</td>
						<td>'.$row['fname'].'</td>
						<td>'.$row['lname'].'</td>
						<td>'.$row['email'].'</td>
						<td>'.$row['mobile'].'</td>
						<td>'.$row['job'].'</td>
						<td>'.$row['batch'].'</td>
						<td>
							<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Edit</button>
						</td>
						<td>
							<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
						</td>
					</tr>';
					$number++;

		}

	}
	$data .= '</table>';
	echo $data;


}

//Register

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) &&isset($_POST['mobile']) && isset($_POST['job']) && isset($_POST['batch'])){


$query = "INSERT INTO `info`( `fname`, `lname`, `email`, `mobile`, `job`, `batch`) VALUES ('$fname', '$lname', '$email', '$mobile', '$job','$batch')";
mysqli_query($con, $query);
}

// echo "$query";

if(isset($_POST['deleteid'])){

	$userid = $_POST['deleteid'];

	$deletequery = " delete from info where id='$userid' ";
	mysqli_query($con, $deletequery);
}

//update

if(isset($_POST['id']) && isset($_POST['id'])!="")
{
	$user_id = $_POST['id'];
	$query = "SELECT * FROM info WHERE id='$user_id'";

	if(!$result = mysqli_query($con, $query)){
		exit(mysqli_error());
	}

	$response = array();

	if(mysqli_num_rows($result) > 0){
		while ($row = mysqli_fetch_assoc($result)) {

			$response=$row;
		}
	}
	else
	{
		$response['status'] = 200;
		$response['message'] = "Data not found!";
	}

	echo json_encode($response);

}
else
{
	$response['status'] = 200;
	$response['message'] = "Invalid Request!";
}

//update table

if(isset($_POST['hidden_user_id1'])){

	$hidden_user_id1 = $_POST['hidden_user_id1'];
	$fname1 = $_POST['fname1'];
	$lname1 = $_POST['lname1'];
	$email1 = $_POST['email1'];
	$mobile1 = $_POST['mobile1'];
	$job1 = $_POST['job1'];
	$batch1 = $_POST['batch1'];

	$query = "UPDATE `info` SET `fname`='$fname1',`lname`='$lname1',`email`='$email1',`mobile`='$mobile1',`job`='$job1',`batch`='$batch1' WHERE id= '$hidden_user_id1'";

	if(!$result = mysqli_query($con, $query)){
		exit(mysqli_error);
	}
}



?>