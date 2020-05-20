<?php
 require_once 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';



    $quariy = ("select * from information where selector ='3'");
    $result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 
?>

<main  class="py-4 container">
    <div class ="row">
            <?php while($data = mysqli_fetch_assoc($result)) {
                    ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <h4 class="card-title"><?php echo $data['name'];?></h4>
                    </h4>
                    <div class="card-text">
                        <?php echo $data['more_information'];?>
                    </div><br>
                    <a href="show.php?id=<?=$data['id'];?>" class="btn btn-primary" style="border-radius: 25px;  background-color:#969FA4; border: none; width: 200px;">Show all information</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</main>


<div class="container pt-5"></div>
<?php include 'template/footer.php' ?>
