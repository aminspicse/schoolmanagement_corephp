<?php
	//include '../class_nine/.php';
	$sesid = $ses['id'];

	$query_setting = "SELECT * FROM setting WHERE user_id = $sesid";
	$setting = mysqli_fetch_array(mysqli_query($con, $query_setting));
	$semester = $setting['semester'];
	$year = $setting['year'];
 
	//Start Query for Passesd
	$sqlp = "SELECT * FROM ten_madrasah WHERE admin_id = '$sesid' and semester = '$semester' and year = '$year' and status = 'Passed' and delete_status = '0' ORDER BY gpa DESC, total_mark DESC";
	$exep = mysqli_query($con, $sqlp);
	$resultp = mysqli_num_rows($exep);//End Query Passed

	//Start query for Reffard
	$sqlr = "SELECT * FROM ten_madrasah WHERE admin_id = '$sesid' and semester = '$semester' and year = '$year' and status = 'Reffard' and delete_status = '0' ORDER BY roll ASC";
	$exer = mysqli_query($con, $sqlr);
	$resultr = mysqli_num_rows($exer);//End Query Reffard

	//Start Query for All student
	$sqla = "SELECT * FROM ten_madrasah WHERE admin_id = '$sesid' and semester = '$semester' and year = '$year' and delete_status = '0'";
	$exea = mysqli_query($con, $sqla);
	$total = mysqli_num_rows($exea); // End Query all student

	
?>

<script type="text/javascript">
	function selected (it, box) {
    var vis = (box.checked) ? "block" : "none";
 	document.getElementById(it).style.display = vis;
	}
</script>