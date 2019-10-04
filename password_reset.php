<?php 
$title= 'Reset password'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';

if(isset($_SESSION['logged_in'])){
    header('location: home.php');
}

$errors = [];
$email ='';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=  mysqli_real_escape_string($mysqli, $_POST['email']);;

    if(empty($email)){array_push($errors, "Email is required");}


   
    if(!count($errors)){
        $userExists = $mysqli->query("select id, user_email, password, user_name from users where user_email='$email' limit 1");

        if($userExists->num_rows){

            $userId = $userExists->fetch_assoc()['id'];

            $tokenExists = $mysqli->query("delete from password_resets where user_id='$userId'");

            
            //Create random password
            $token = bin2hex(random_bytes(16));

            $expire_at = date('Y-m-d H:i:s', strtotime('+1 day'));

            $mysqli->query("insert into password_resets (user_id, token, expires_at)
            values('$userId', '$token', '$expire_at');
            ");

            $changPasswordUrl = $config['app_url'].'change_password.php?token='.$token;

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers = 'Content-type text/html; charset=UFT-8' . "\r\n";
            $headers = 'Form: '.$config['admin_email']."\r\n".
            'Reply-To: '.$config['admin_email']. "\r\n".
            'X-Mailer: PHP/' .phpversion();

            $htmlMassage = '<html><body>';
            $htmlMassage = '<p style="color:#ff0000;">'.$changPasswordUrl.'</p>';
            $htmlMassage = '<body><html>';

            mail($email, 'Password reset link',$htmlMassage, $headers);


        }

        $_SESSION['success_message'] = 'please ckeck your email for password reset link';
        header('location: password_reset.php');
    }

}




?>

<div id="password_reset">
    <h4 class="pt-5" style="text-align:center; font-size:40px;">ᖇEᔕET ᑭᗩᔕᔕᗯOᖇᗪ</h4>
    <h5 style="text-align:center; font-size:20px;">Fill in your email to reset your password</h5>

    

    <?php include 'template/errors.php' ?>
    <form action="" method = "post">

        <div class="form-group pl-5 pr-5">
            <label for="email"> Your email: </label>
            <input type="email" name= "email" class="form-control" placeholder="Your email" id="email" value="<?php echo $email ?>">
        </div>
        

       

        <div class="form-group pl-5">
            <button class="btn btn-primary" style="border-radius: 25px; background-color:#969FA4; border: none; width: 200px;"> Reset password! </button>
        </div>
    </form>
</div>

