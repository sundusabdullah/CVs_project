<?php include 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';?>
<style>
<?php require_once 'style.css';?>
</style>


<body>
<!--Header-->
<div id="header">
      <div style=" text-align:left; font-size:40px; position:relative; left:40px; top:140px;">
        <p >Welcome to CVs Website</p>
      </div>
      <div style="position:relative; left:150px; top:160px;">
          <a  class="btn btn-primary"  href="cv.php">Create Your CV</a>
      </div>
</div>
<!--Web information--->
<div id="about" style=" height:100px; width:100%; margin-top:50px;">
<p  style=" text-align:center; font-size:40px;">We can help you create CV</p>
</div>  
<!-- End Web information--->

<!--Show some CVs from database-->
<?php 
//quary to select CVs
$quariy = ("select * from information order by id desc limit 3");
$result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 
?>


        <div  style="height: 200px  width: 50%; background-color:#F9F5EB;">
            <p class="pt-3" style="text-align:center; color:black; font-size:35px; margin-top:80px;">Last Update CVs</p>
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
                        <a href="show.php?id=<?=$data['id'];?>" class="btn btn-secondary"  style="border-radius: 25px; background-color:black; border: none; width: 100px;">
                        Read all</a>
                    </div>
                </div>
            </div>
          <?php } ?>
        </div>
  </main>
<div class="form-row text-center">
    <div class="col-12 pb-5">
    </div>
</div>
<div class="container pt-5"></div>
<?php include 'template/footer.php' ?>
