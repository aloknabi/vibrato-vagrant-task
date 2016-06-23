<?php

$servername = "172.16.111.42";
$username = "app_usr";
$password = "password";
$dbname = "demodb";

/*
// return the list of voting options, id and description
function getOptions(){
	// construct query to get all options
	$query = 'SELECT * FROM voteoptions;';
	// hash query
	$hash = hash('md5', $query);
	// search redis for hash

	// return result
	return 'result list';
}

//getOptions();

// cast a vote
function castVote($id){
	//insert vote in to database
	$query = 'INSERT INTO vote (voteid) VALUES ('. $id .');';
	$hash = hash('md5', $query);
	return 'vote casted';
}

function getTotal($id){
	// construct query
	$query = "SELECT count(*) FROM vote where id =" . $id .";";

	// hash query string
	$hash = hash('md5',$query);
	// check if cached in redis

		// if not cached
		// get from db, cache in redis

		// else
		// get from redis
	return 'total result';
}
*/
?>