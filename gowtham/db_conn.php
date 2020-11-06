<?php 

$conn = mysqli_connect('localhost','gowtham','12345','gowtham\'s_pizza');
if(!$conn){
	echo "Connection Error". mysqli_connect_error();
}