
<?php

session_start();
require_once __DIR__.'/../config/app.php';
require_once 'config/database.php';

if(isset($_SESSION['logged_in'])){
    $_SESSION['user_name'];
}

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="home.php">CVs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                 <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                 <a class="nav-link" href="#about">About <span class="sr-only"></span></a>
                </li>
               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Section
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Web_devel.php">Web develop</a>
                        <a class="dropdown-item" href="Mobile_devel.php">Mobile develop</a>
                        <a class="dropdown-item" href="Data_analy.php">Data Analysis</a>

                    </div>
                </li>


                <li class="nav-item dropdown">
                <?php if(isset($_SESSION['logged_in'])) {?>

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Setting
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="user_cv.php">Your cv</a>
                                <a class="dropdown-item" href="profile.php">Profile</a>
                            </div> 
                            <?php }?>

                              
                </li>              
            </ul>
        </div>

       
    

 
        <ul class="navbar-nav ml-auto">
        <?php if(!isset($_SESSION['logged_in'])): ?>


        <li class="nav-item">
            <a class="nav-link " href="login.php">Login</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="<?php echo $config['app_url']?>regestier.php">Signup</a>
        </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $_SESSION['user_name'] ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="<?php echo $config['app_url']?>logout.php">logout</a>
            </li>
        <?php endif ?>

      
    </ul>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</nav>


<div class="container pt-0"></div>

<?php include 'template/messages.php' ?>



