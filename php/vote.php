<?php
include 'DAL.php';

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];

switch($method){
	case 'GET':
		// retrieve number of votes cast for this option
		echo 'get selected';
		break;
	case 'POST':
		// cast new vote
		echo 'Post selected';
		break;
	default:
		echo 'Method not supported';
		break;
}

echo $method;

echo 'end';
?>