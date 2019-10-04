
<? $title= 'Show CV'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

    $quariy = ("select * from information where id = $id ");
    $result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 
    while ($data = mysqli_fetch_assoc($result)) {

?>

<div id="" class="pt-4">
 <form action="" method = "post" class= "pl-2 pr-2 pb-5">
        <div class="card border-0" >
            <div class="card-body">
                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF;">
                    <label for="more_information"><b>Objective</b></label>
                    <textarea class="form-control border-0" name="more_information" rows="6"><?php echo $data['more_information'] ?></textarea>
                </div>
                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF">
                    <label for="name" ><b>Name</b></label>
                    <textarea type="text" class="form-control border-0" name="name" rows="3"><?php echo $data['name']?></textarea>
                </div>
                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF">
                    <label for="education"><b>Education</b></label>
                    <textarea type="text" class="form-control border-0" name="education" row="3"><?php echo $data['education']?></textarea>
                </div>

                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF">
                    <label for="contact_information"><b>Contact Information</b></label>
                    <textarea class="form-control border-0" name="contact_information" rows="3"><?php echo $data['contact_information'] ?></textarea>
                </div>
                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF">
                    <label for="skills"><b>ᔕKIᒪᒪᔕ</b></label>
                    <textarea class="form-control border-0" name="skills" rows="3"><?php echo $data['skills'] ?></textarea>
                </div>

                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF">
                    <label for="work"><b>Work Experience</b></label>
                    <textarea class="form-control border-0" name="work" rows="5"><?php echo $data['work'] ?></textarea>
                </div>

                <div class="form-group" style="font-size:20px; text-align:center; background-color:#363C46; color:#FFFFFF">
                    <label for="projects"><b>Projects</b></label>
                    <textarea class="form-control border-0" name="projects" rows="5"><?php echo $data['projects'] ?></textarea>
                </div>

               

               <?php
                if(isset($_SESSION['logged_in'])){

                    $a = $_SESSION['user_name'];
                    $query= "select * from information ";
                    $mysqli->query($query);
                    $result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 
                    while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <div class="form-group">
                    <?php if ($data['created_by'] == $a){?>
                    <a href="delete.php?id=<?=$data['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-success"> Delete </a>
                    <a href="update.php?id=<?=$data['id'];?>" class="btn btn-success"> Update </a>
                </div>
                <?php }?>
                <?php }?>
                <?php }?>

            </div>
        </div>
        <?php }?>
    <?php }else {
        echo 'No User selected or redirect to home page .. ';
    }  ?>
    </form>

    <div class="container pt-5">

<?php include 'template/footer.php' ?>