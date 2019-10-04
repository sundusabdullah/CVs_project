<?php 
$title= 'Delete'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';


if(isset($_GET['id'])) {
    $id = $_GET['id'];
$quariy = ("select * from information where id = $id ");
$result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 


//Delete all column in tabel

$query = "DELETE FROM information where id='$id'";
$mysqli->query($query);

if(isset($_SESSION['logged_in'])){
    header('location: home.php');
}
}
?>

