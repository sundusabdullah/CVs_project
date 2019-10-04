<? $title= 'profile'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';





//Select quary 

if(isset($_SESSION['logged_in'])){

    $a = $_SESSION['user_name'];

$query = ("select * from users where user_name = '$a'");
$result = mysqli_query($mysqli, $query) or die("database error:". mysqli_error($mysqli)); 
while ($data = mysqli_fetch_assoc($result)) {

$errors = [];
$name = '';
$email = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email=  mysqli_real_escape_string($mysqli, $_POST['email']);
    $password=  mysqli_real_escape_string($mysqli, $_POST['password']);
    $password_confirmation=  mysqli_real_escape_string($mysqli, $_POST['password_confirmation']);



    if(empty($name)){array_push($errors, "Name is required");}
    if(empty($email)){array_push($errors, "Email is required");}
    if(empty($password)){array_push($errors, "Password is required");}
    if(empty($password_confirmation)){array_push($errors, "Password confirmation is required");}




    if($password != $password_confirmation){
        array_push($errors, "Password don't match");

    }

    if(!count($errors)){
        $password_ = password_hash($password, PASSWORD_DEFAULT);
        //Update quary 
        $query = "update users set user_name='$name', user_email='$email', password='$password_'
                    where user_name = '$name'";

        $mysqli->query($query);
        print_r($query);

        if($query){
            echo "Done";
        }else{
            echo "Error";
        }
    }
}

?>

<?php include 'template/errors.php' ?>
<form method = "post">

    <div class="form-group pl-5 pr-5 pt-5 " style="font-size:25px; text-align:center;">
        <label for="ex2" >Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $data['user_name'] ?>">
    </div>


    <div class="form-group pl-5 pr-5" style="font-size:25px; text-align:center;">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control col-xs-3" value="<?php echo $data['user_email'] ?>">
    </div>


    <div class="form-group form-group pl-5 pr-5" style="font-size:25px; text-align:center;">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control"  name="password">
    </div>


    <div class="form-group form-group pl-5 pr-5" style="font-size:25px; text-align:center;">
        <label for="exampleInputPassword1">Password confirmation</label>
        <input type="password" class="form-control"  name="password_confirmation">
    </div>

        <div class="form-group pl-5 ">
                <button class="btn btn-success" style="border-radius: 25px; background-color:#969FA4; border: none; width: 200px;"> Update </button>
        </div>
    <?php }?>

    </div>
    <?php }?>

</form>

<div class="container pt-5"></div>
<?php include 'template/footer.php' ?>