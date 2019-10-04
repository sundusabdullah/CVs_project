<? $title= 'user CV'; 
require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';

$errors = [];

$a = $_SESSION['user_name'];
$query= "select * from information where created_by='$a'";
$mysqli->query($query);
$result = mysqli_query($mysqli, $query) or die("database error:". mysqli_error($mysqli)); 

?>



<main  class="py-4 container">
<?php include 'template/errors.php' ?>

    <div class ="row">
    <?php while ($data = mysqli_fetch_assoc($result)) {?>

        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header">
                    <a href="show.php?id=<?=$data['id'];?>" class="btn btn-primary" style="border-radius: 25px;  background-color:#969FA4; border: none; width: 200px;">
                    Show all information</a>
                </h4>
                <div class="card-body"><?php echo $data['more_information'];?></div>
                <div class="card-footer"><?php echo $data['name'];?></div>
            </div>

        </div>
        <?php } ?>
    </div>
    <?php if (mysqli_num_rows($result)==0) { ?>
    <div class="alert alert-warning" role="alert">
        Not create any CV right now!
    </div>
<?php }?>
</main>




<div class="container pt-5"></div>
<?php include 'template/footer.php' ?>


