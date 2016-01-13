<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	$conn = new mysqli("localhost", "root", "", "gt_angular_dt");

	$result = $conn->query("SELECT * FROM gt_ang_users");

	$outp = "";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "") {$outp .= ",";}
		$outp .= '{"Name":"'  . $rs["ang_users_name"] . '",';
		$outp .= '"Username":"'   . $rs["ang_users_username"]        . '",';
	}
	$outp ='{"records":['.$outp.']}';
	$conn->close();

	echo($outp);
?>