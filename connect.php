<?php 

$con = new mysqli('localhost', 'root', '', 'food');

if(!$con){
    die(mysqli_error($con));
}

?>