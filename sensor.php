<?php

$hostname = "localhost";
$username = "coba";
$password = "sandi";
$database = "shmsv2";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} else {
	echo "Database connection is OK<br>";
}

// If values send by Arduino/NodeMCU are not empty then insert into MySQL database table

if (!empty($_POST['temperature']) && !empty($_POST['humidity']) && !empty($_POST['accelX']) && !empty($_POST['accelY']) && !empty($_POST['accelZ']) && !empty($_POST['gyroX']) && !empty($_POST['gyroY']) && !empty($_POST['gyroZ']) && !empty($_POST['strainValue'])) {
	$temperature = $_POST['temperature'];
	$humidity  = $_POST['humidity'];
	$accelX  = $_POST['accelX'];
	$accelY  = $_POST['accelY'];
	$accelZ = $_POST['accelZ'];
	$gyroX = $_POST['gyroX'];
	$gyroY = $_POST['gyroY'];
	$gyroZ = $_POST['gyroZ'];
	$strainValue = $_POST['strainValue'];


	// Update your tablename here
	// table
	//$sql = "INSERT INTO tbl_shms(gyroX, gyroY, gyroZ, accelX, accelY, accelZ, strainValue, temperature, humidity) VALUES (".$gyroX.",".$gyroY.",".$gyroZ.",".$accelX.",".$accelY.",".$accelZ.",".$strainValue.",".$temperature.",".$humidity.")"; 
	$sql = "INSERT INTO tbl_shms(gyroX, gyroY, gyroZ, accelX, accelY, accelZ, strainValue, temperature, humidity) 
	VALUES ('$gyroX', '$gyroY', '$gyroZ', '$accelX', '$accelY', '$accelZ', '$strainValue', '$temperature', '$humidity')";

	// // table akselero
	// $sql2 = "INSERT INTO tbl_shms(accelX, accelY, accelZ) VALUES (".$accelX.",".$accelY.",".$accelZ.")";

	// // table gyro
	// $sql3 = "INSERT INTO tbl_shms(gyroX, gyroY, gyroZ) VALUES (".$gyroX.",".$gyroY.",".$gyroZ.")";

	//eksekusi table suhu & kelembaban
	if ($conn->query($sql) === TRUE) {
		echo "Values inserted in MySQL database table.";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
// 	//eksekusi table akselero
// 	if ($conn->query($sql2) === TRUE) {
// 		echo "Values inserted in MySQL database table.";
// 	} else {
// 		echo "Error: " . $sql2 . "<br>" . $conn->error;
// 	}

// 	//eksekusi tabel gyro
// 	if ($conn->query($sql3) === TRUE) {
// 		echo "Values inserted in MySQL database table.";
// 	} else {
// 		echo "Error: " . $sql3 . "<br>" . $conn->error;
// 	}
// }

// Close MySQL connection
$conn->close();

