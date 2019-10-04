<?php include 'template/header.php';
require_once 'config/database.php';
require_once 'config/app.php';?>




<!DOCTYPE html>
<html>
    <head>
        <style>
            html,
            body {
              width: 100%;
              height: 100%;
              }
              #header {
                width: 100%;
                height: 400px;
                min-width:1000px;
                background-image: url("./image/h22.jpeg");
                background-size: cover;
              } 

              .btn_{
                background-color:#969FA4;
                position: absolute;
                border: none;
                color: white;
                top: 3%;
                left: -4%;
                width: 300px;
                border-radius: 25px;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 250px 500px;
              }
              .centered{
                position: absolute;
                top: 30%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 40px;
              }
        </style>
    </head>
<body>



<!--Header-->
<div id="header">
      <div>
       <div class="centered">ᗯEᒪᑕOᗰE TO ᑕᐯᔕ ᗯEᗷᔕITE</div>

        <a class="btn_ btn-primary" href="cv.php" role="button">Create own CV</a>
      </div>
</div>




<!--Web information--->
      <div class="card-deck">
        <div class="card border-0 mt-5" style="width: 18rem;">

          <img class="card-img-top pl-5 pr-5 pt-3" src="./image/what.png" width="150px" height="250px">
          <div class="card-body">
            <h5 class="card-title pl-5" style="font-size:25px;">ᗯᕼᗩT</h5>
            <p class="card-text pl-5" style="text-align:center;"> ͏Th͏e ͏c͏v ͏i͏s ͏a ͏d͏o͏c͏u͏m͏e͏n͏t ͏y͏o͏u ͏u͏s͏e ͏f͏o͏r ͏a͏c͏a͏d͏e͏m͏i͏c ͏p͏u͏r͏p͏o͏s͏e͏s. ͏t͏h͏e ͏c͏v ͏o͏u͏t͏l͏i͏n͏e͏s ͏e͏v͏e͏r͏y ͏d͏e͏t͏a͏i͏l ͏o͏f ͏y͏o͏u͏r ͏s͏c͏h͏o͏l͏a͏r͏l͏y ͏c͏a͏r͏e͏e͏r.<br>
             ͏y͏o͏u ͏u͏s͏e ͏i͏t ͏w͏h͏e͏n ͏y͏o͏u ͏a͏p͏p͏l͏y ͏f͏o͏r ͏j͏o͏b͏s.</p>
        </div>
      </div>
    <div class="card border-0 mt-5" style="width: 30rem;">
      <img class="card-img-top pl-5 pr-5 pt-3" src="./image/exc.png" width="150px" height="250px">
      <div class="card-body">
        <h5 class="card-title" style="font-size:25px;">ᕼOᗯ</h5>
        <p class="card-text" style="text-align:center;"> Use active verbs to write your cv.
There should be no spelling or grammar mistakes.
Take a look at the company's website, local press and the job advert to make sure that your CV is targeted to the role and employer.
Create the right type of CV for your circumstances.
Never lie or exaggerate on your CV or job application.</p>
      </div>
    </div>
  
    <div class="card border-0 mt-5" style="width: 18rem;">
      <img class="card-img-top pl-5 pr-5 pt-3" src="./image/about.png" width="150px" height="250px">
      <div class="card-body">
        <h5 class="card-title" style="font-size:25px;">ᗩᗷOᑌT</h5>
        <p class="card-text " style="text-align:center;"> Platform to help you write and deploy your cv in the easiest way.</p>
      </div>
    </div>
  </div>
  


<!--Show some CVs from database-->
<?php 
//quary to select CVs
$quariy = ("select * from information limit 3");
$result = mysqli_query($mysqli, $quariy) or die("database error:". mysqli_error($mysqli)); 

?>

<p style="text-align:center; font-size:40px; margin-top:80px;">ᒪᗩᔕT ᑌᑭᗪᗩTEᗪ ᑕᐯ</p>
<main  class="py-4 container">
    <div class ="row">
            <?php while($data = mysqli_fetch_assoc($result)) {
                    ?>
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-header">
                    <a href="show.php?id=<?=$data['id'];?>" class="btn btn-primary" style="border-radius: 25px; background-color:#969FA4; border: none; width: 100px;">
                    Read all</a>
                </h4>
                <div class="card-body"><?php echo $data['more_information'];?></div>
                <div class="card-footer"><?php echo $data['name'];?></div>
            </div>

        </div>
        <?php } ?>
    </div>
</main>

<div class="form-row text-center">
    <div class="col-12 pb-5">
        <a class="btn btn-primary" href="cv.php" style="border-radius: 25px; background-color:#969FA4; border: none; width: 200px;" role="button">Create own CV</a>
    </div>
</div>



<div class="container pt-5"></div>
<?php include 'template/footer.php' ?>

















