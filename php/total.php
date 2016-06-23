<?php
include 'DAL.php';

// get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];
$voteId = $_GET['voteid'];

echo getTotal($voteId);

?>