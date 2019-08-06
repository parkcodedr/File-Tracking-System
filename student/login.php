<?php
$msg="";
 session_start();
 require('../vendor/autoload.php');
 $client = new MongoDB\Client;
 $tracker = $client->filetracker;
 $user = $tracker->users;
 
 
 //Protecting Pages

 
 if (isset($_POST['login'])) {
     $email = trim($_POST['email']);
     $password = trim($_POST['password']);
 if(empty($email) || empty($password)){
    $msg.="<div class='text-danger'> All fields are required</div>";
 }else{

 $password=md5($password);
 $result=$user->findOne(['email'=>$email,'password'=>$password]);
 
 if (!$result) {
    $msg.="<div class='text-danger'> Wrong username or Password</div>";
 }else{
     $user_id = $result->_id;
     $_SESSION['user'] = $user_id;
     header("location: index.php");
 }
}
 }
 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mail Tracking System</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header class="site-header">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Find your mail just with a single click</p>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-inline pull-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                            <li><a href="tel:+902222222222"><i class="fa fa-phone"></i> 08140615512</a></li>
                        </ul>                        
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default">
			<div class="container">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-bars"></i>
				</button>
				<a href="index.php" class="navbar-brand ">
					<h1 class="hero_header">MAIL TRACKING SYSTEM</h1>
				</a>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                    <ul class="nav navbar-nav main-navbar-nav">
                        <li class="active"><a href="index.php" title="">HOME</a></li>
                        <li class="dropdown">
                            <a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">LOGIN <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="student/login.php" title="">STUDENT</a></li>
                                
                            </ul>
                        </li>
                        <li><a href="track.php" title="">TRACK MAIL</a></li>
                        <li><a href="register.php" title="">REGISTER</a></li>
                        <li><a href="#" title="">ABOUT</a></li>
                        <li><a href="#" title="">CONTACT</a></li>
                    </ul>                           
                </div><!-- /.navbar-collapse -->                
				<!-- END MAIN NAVIGATION -->
			</div>
		</nav>        
    </header>
    <div class="bread_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="../index.php" title="Post">Home</a></li>
                        <li class="active">Student</li>
                        <li class="active">Login</li>
                    </ol>                    
                </div>
            </div>
        </div>
    </div>    
    <main class="site-main category-main">
        <div class="container">
            <div class="row">
                <section class="category-content col-sm-9">
                    <h2 class="category-title col-md-offset-2">Login</h2>
                    <ul class="media-list">
                        <li class="media">
                            <center><?php echo $msg ?></center>
                            <br>
                            
                            <form class="form-horizontal" method="POST">
                                
                                  <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email:</label>
                                    <div class="col-sm-10">
                                      <input type="email" class="form-control"  name="email" >
                                    </div>
                                  </div>
                                  <div class="form-group">
                                  <label class="control-label col-sm-2" for="password">Password:</label>
                                  <div class="col-sm-10"> 
                                    <input type="password" class="form-control" id="pwd" name="password" >
                                  </div>
                                </div>
                                
                                
                                <div class="form-group"> 
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                                  </div>
                                </div>
                              </form>
                              <br>
                              <br><br><br>
                        </li>
                        
                        </ul>
                        </section>
                        
                        </main>
                        <footer class="site-footer">
                            <div class="container">
                               
                            </div>
                            <div id="copyright">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pull-left">&copy; 2019 Mail Tracking System | All right reserved</p>
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="list-inline navbar-right">
                                                <li><a href="#">By Akawo Samuel</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>




