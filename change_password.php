<?php 
$title= 'Change password'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';

if(isset($_SESSION['logged_in'])){
    header('location: home.php');
} 

if (!isset($_GET['token'])|| !$_GET['token']){
    die('Token parameter is missing');
}

$now = date('Y-m-d H:i:s');
$stmt = $mysqli->prepare("select * from password_resets where token = ? and expires_at > '$now' ");
$stmt->bind_param('s', $token);
$token = $_GET['token'];

$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows){
    die('Token is not valid');

}


$errors = [];


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $password=  mysqli_real_escape_string($mysqli, $_POST['password']);;
    $password_confirmation= mysqli_real_escape_string($mysqli, $_POST['password_confirmation']);

    if(empty($password)){array_push($errors, "password is required");}
    if(empty($password_confirmation)){array_push($errors, "password confirmation is required");}

    if($password != $password_confirmation){
        array_push($errors, "Password don't match");

    }

    if(!count($errors)){

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $userId = $result->fetch_assoc()['user_id'];
        $mysqli->query("update users set password = '$hashed_password' where id = '$userId'");
        $mysqli->query("delete from password_resets where user_id='$userId'");

        $_SESSION['success_message'] = ' Your password has been change, please log in';
        header('location: login.php');
        die();




       

            
    }

        

}




?>

<div id="create new password">

    <?php include 'template/errors.php' ?>
    <form action="" method = "post">

        <div class="form-group">
            <label for="password"> New password: </label>
            <input type="password" name= "password" class="form-control" placeholder="Your password" id="password">
        </div>


        <div class="form-group">
            <label for="password_confirmation"> Confirm new Password : </label>
            <input type="password" name= "password_confirmation" class="form-control" placeholder=" Confirm password " id="password">
        </div>
        

       

        <div class="form-group">
            <button class="btn btn-primary" style="border-radius: 25px;"> Change password! </button>
        </div>
    </form>
</div>


