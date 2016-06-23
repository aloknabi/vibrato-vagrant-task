<?php

function dbConnect(){
	$servername = "172.16.111.42";
	$username = "app_usr";
	$password = "password";
	$dbname = "demodb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	return $conn;
}

function redisConnect(){
	$client = new Redis();
	$client->connect('172.16.111.43');
	return $client;
} 


function getTotal($id){

	$conn = dbConnect();
	$redis = redisConnect();
	
	// construct query
	$query = 'SELECT count(*) FROM vote where voteid = ' . $id;

	// hash query string
	$hash = hash('md5',$query);

	// return value from cache if exists
	if($redis->exists($hash)){
		return $redis->get($hash);
	} else {
		// get value from db
		$result = mysqli_query($conn, $query);
		$total = $result->fetch_row()[0];
		// save value in cache for 5 minutes
		$redis->setex($hash, 300, $total);
		return $total;
	}

}

?>