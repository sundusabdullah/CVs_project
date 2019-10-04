<?php 

$title= 'Regester'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';

if(isset($_SESSION['logged_in'])){
    header('location: home.php');
}

$errors = [];
$name = '';
$email = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email=  mysqli_real_escape_string($mysqli, $_POST['email']);;
    $password=  mysqli_real_escape_string($mysqli, $_POST['password']);;
    $password_confirmation=  mysqli_real_escape_string($mysqli, $_POST['password_confirmation']);

    if(empty($name)){array_push($errors, "name is required");}
    if(empty($email)){array_push($errors, "Email is required");}
    if(empty($password)){array_push($errors, "password is required");}
    if(empty($password_confirmation)){array_push($errors, "password confirmation is required");}

    if($password != $password_confirmation){
        array_push($errors, "Password don't match");

    }
    if(!count($errors)){
        $userExists = $mysqli->query("select user_email, user_name from users where user_name='$name' limit 1");

        if($userExists->num_rows){
            array_push($errors, "User name already existed");
        }
    }

     //create new user
     if(!count($errors)){
        $password_ = password_hash($password, PASSWORD_DEFAULT);
        $query = "insert into users(user_name, user_email, password)
                            values ('$name', '$email', '$password_')";
                    
        $mysqli->query($query);

        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $mysqli->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

        $_SESSION['success_message'] = "$name You are logged in, Thank you!";



        //header('location: home.php');  
    }

}

?>

    <div id="register" class="pt-4 pr-4 pl-4">
        <h4 style="text-align:center; font-size:40px;">ᗯEᒪᑕOᗰE TO ᑕᐯᔕ ᗯEᗷᔕITE</h4>
        <h5  style="text-align:center; font-size:20px;"> ͏p͏l͏e͏a͏s͏e ͏f͏i͏l͏l ͏i͏n ͏t͏h͏e ͏f͏o͏r͏m ͏b͏e͏l͏o͏w ͏t͏o ͏r͏e͏g͏i͏s͏t͏e͏r ͏a ͏n͏e͏w ͏a͏c͏c͏o͏u͏n͏t</h5>
        <hr>

        <?php include 'template/errors.php' ?>
        <form action="" method = "post">
            <div class="form-group">
                <label for="name"> User name: </label>
                <input type="text" name= "name" class="form-control" placeholder="User name" id="name" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label for="email"> Your email: </label>
                <input type="email" name= "email" class="form-control" placeholder="Your email" id="email" value="<?php echo $email ?>">
            </div>

            <div class="form-group">
                <label for="password"> Your password: </label>
                <input type="password" name= "password" class="form-control" placeholder="Your password" id="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation"> Confirm password:</label>
                <input type="password" name= "password_confirmation" class="form-control" placeholder="Confirm password" id="repassword">
            </div>

            <div class="form-group">
                <button class="btn btn-success" style="border-radius: 25px; border: none; width: 100px; background-color:#969FA4;"> Register</button>
                <a href="login.php" class="pl-2"> Already have an account? login here </a>

            </div>
        </form>
    </div>

    <div class="container pt-5"></div>
<?php include 'template/footer.php' ?>