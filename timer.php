<?php
$servername = "localhost";
$username = "root";
$dbname = "webdev";

$conn = new mysqli($servername, $username,'', $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT updated,TableID FROM tables";
$result=mysqli_query($conn, $sql);
$currenthour=1+date("H");
$currentmin=date("i");
echo $currenthour." ".$currentmin; 
echo "<br>"; 
while($row = $result->fetch_assoc()){
	$hour=date('H',strtotime($row["updated"]));
	$min=date('i',strtotime($row["updated"]));
	echo $hour." ".$min;
	//echo " - ".round(abs($time1 - $time2) /60,2). " minute";
	$totalminutes=0;
	$totalminutes=($currenthour-$hour)*60+$currentmin-$min;
	echo "total minutes are: ".$totalminutes."<br>";
	if($totalminutes>15){
		//echo "Timeout";
		$table=$row["TableID"];
		$sql1 = "UPDATE tables SET Available=1 WHERE TableID='$table'";
		if(mysqli_query($conn, $sql1)){
			echo "query done";
		}
		else{
			echo "failed";
		}
	}
}
mysqli_close($conn);
 

?>