<? $title= 'Update CV'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';



if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $a = $_SESSION['user_name'];
$quariy = ("select * from information where id = $id ");
$result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 
while ($data = mysqli_fetch_assoc($result)) {

    //echo $id;

$name = '';
$education = '';
$contact_information = '';
$skills = '';
$work = '';
$projects = '';
$more_information = '';
$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = mysqli_real_escape_string($mysqli,$_POST['name']);
    $education = mysqli_real_escape_string($mysqli,$_POST['education']);
    $contact_information = mysqli_real_escape_string($mysqli,$_POST['contact_information']);
    $skills = mysqli_real_escape_string($mysqli,$_POST['skills']);
    $work = mysqli_real_escape_string($mysqli,$_POST['work']);
    $projects = mysqli_real_escape_string($mysqli,$_POST['projects']);
    $selector  = $_POST['selector'];
    $more_information = mysqli_real_escape_string($mysqli,$_POST['more_information']);

    if(empty($name)){array_push($errors, "Name is required");}
    if(empty($education)){array_push($errors, "Education is required");}
    if(empty($contact_information)){array_push($errors, "Contact Information is required");}
    if(empty($skills)){array_push($errors, "Skills is required");}
    if(empty($work)){array_push($errors, "Work Experiences is required");}
    if(empty($projects)){array_push($errors, "Project is required");}
    if(empty($selector)){array_push($errors, "Must select one option");}
    if(empty($more_information)){array_push($errors, " More information is required");}
    //echo $name;

    if(!count($errors)){

        $query = "update information set name='$name',education='$education',
        contact_information='$contact_information',skills='$skills',work='$work',
        projects='$projects',selector='$selector',more_information='$more_information',
        created_by='$a' where id = $id";
        $mysqli->query($query);
        //echo $query;
        
        if($query){
            //header('location: Web_devel.php');
            print_r($query);
            echo " Update";
        }else{
            echo "Not Update";
        }
    }
}
//}
?>

<?php include 'template.php' ?>

<?php }?>
 <?php }?>


