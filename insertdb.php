<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="12" >
    <title></title>
</head>
<body>

</body>
</html>

<?php
$server="localhost";
$username="root";//THE DEFAULT USERNAME OF THE DATABASE
$password="";
$dbname="hydrocheck";
$conn=new mysqli($server,$username,$password,$dbname);

if($_GET["SENSOR"]==!null && $_GET["LEVEL"]==!null){
	if($_GET['SENSOR']=='Active'){
    $water_sensor=$_GET["SENSOR"];
    $water_level=70-$_GET["LEVEL"];
    echo $water_level;
    echo $water_sensor;

    //$sql="INSERT INTO sensor_datas (location,water_sensor,water_level) VALUES ('Uttara','$water_sensor','$water_level')";

	$sql="UPDATE sensor_datas SET water_sensor='$water_sensor', water_level='$water_level' WHERE serial=1";    
   	
    $conn -> query($sql);
	}
}
else{
    $sql="UPDATE sensor_datas SET water_sensor='Inactive', water_level='0' WHERE serial=1";    
    
    $conn -> query($sql);

}
?>

