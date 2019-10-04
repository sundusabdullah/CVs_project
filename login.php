<?php 
$title= 'Login'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';


if(isset($_SESSION['logged_in'])){
    header('location: home.php');
}

$errors = [];
$email = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=  mysqli_real_escape_string($mysqli, $_POST['email']);
    $password=  mysqli_real_escape_string($mysqli, $_POST['password']);


    if(empty($email)){array_push($errors, "Email is required");}
    if(empty($password)){array_push($errors, "password is required");}


   
    if(!count($errors)){
        $userExists = $mysqli->query("select id, user_email, password, user_name from users where user_email='$email' limit 1");

        if(!$userExists->num_rows){
            array_push($errors, "Your email does not exists.");
        }else{

            $founduser= $userExists->fetch_assoc();
            if(password_verify($password, $founduser['password'])){

                $_SESSION['logged_in'] = true;
                $_SESSION['user_name'] = $founduser['user_name'];

                header('location: home.php');
                
                //login
            } else {

                array_push($errors, 'Wrong password');
            }
        }
    }
} 

?>

<div id="login" class="pt-4">
    <h4 style="text-align:center; font-size:40px;">ᗯEᒪᑕOᗰE TO ᑕᐯᔕ ᗯEᗷᔕITE</h4>
    <hr>

    <?php include 'template/errors.php' ?>
    <form action="" method = "post" class= "pl-4 pr-4">

        <div class="form-group">
            <label for="email"> Your email: </label>
            <input type="email" name= "email" class="form-control" placeholder="Your email" id="email" value="<?php echo $email ?>">
        </div>
        

        <div class="form-group">
            <label for="password"> Your password: </label>
            <input type="password" name= "password" class="form-control" placeholder="Your password" id="password">
        </div>

       

        <div class="form-group">
            <button class="btn btn-success" style="border-radius: 25px; border: none; width: 100px; background-color:#969FA4;"> Login </button>
            <a href="password_reset.php" class="pl-2"> Forgot your password </a>
        </div>
    </form>
</div>


<div class="container pt-5"></div>
<?php include 'template/footer.php' ?>
