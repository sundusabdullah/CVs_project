<? $title= 'Craete CV'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';


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

    
    

    if(!count($errors)){
        if(isset($_SESSION['logged_in'])){
            $a = $_SESSION['user_name'];
            echo $a;
            $query =  "insert into information(name, education, contact_information, skills, 
                    work, projects, selector, more_information, created_by)
                                    values ('$name', '$education', '$contact_information', '$skills', 
                                    '$work', '$projects', $selector, '$more_information', '$a')";
    
                $mysqli->query($query);
                header('location: Web_devel.php');
        }
    }   

}

?>
    <?php if(isset($_SESSION['logged_in'])){?>
    <?php include 'template/errors.php' ?>
    <div id="" class="pt-2">
        <h4 class="alert alert-danger " role="alert">  All fields are required, Please fill it </h4> 
    <form action="" method = "post" class= "pl-4 pr-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                    <label for="education">Your Education</label>
                    <input type="text" class="form-control" name="education" value="<?php echo $education ?>" >
                </div>

                <div class="form-group">
                    <label for="contact_information"> Contact Information </label>
                    <textarea class="form-control" name="contact_information" rows="3"><?php echo $contact_information ?></textarea>
                </div>
                <div class="form-group">
                    <label for="skills">Skills</label>
                    <textarea class="form-control" name="skills" rows="3"><?php echo $skills ?></textarea>
                </div>

                <div class="form-group">
                    <label for="work">Work Experiences </label>
                    <textarea class="form-control" name="work" rows="3"><?php echo $work ?></textarea>
                </div>

                <div class="form-group">
                    <label for="projects">Projects </label>
                    <textarea class="form-control" name="projects" rows="3"><?php echo $projects ?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1"> select the section of your CV</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="selector">
                    <option> </option>
                    <option value = "1">Mobile Development </option>
                    <option value = "2">Web Development</option>
                    <option value = "3">Data Analysis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="more_information">Write more information</label>
                    <textarea class="form-control" name="more_information" rows="6"><?php echo $more_information ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success"> Save </button>
                   
                </div>
            </div>
        </div>
    </form>


    <?php } 

    else {?>
        <div class="alert alert-danger" role="alert">
        login first to write your CV
        </div>
    <?php } ?>


<div class="container pt-5">
<?php include 'template/footer.php'?>
