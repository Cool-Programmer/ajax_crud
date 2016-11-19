<?php
require_once 'db.php';

if ($_POST['car_name']){
    $carName = $_POST['car_name'];
        $sql = "INSERT INTO `cars`(`name`) VALUES ('$carName')";
        $q = mysqli_query($connection, $sql);
}