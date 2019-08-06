<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mail Tracking System</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    
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
                                <li><a href="staff/login.php" title="">STAFF</a></li>
                                <li><a href="admin/login.php" title="">ADMIN</a></li>
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
    <main class="site-main">
        <section class="hero_area">
            <div class="hero_content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>BSU MAIL TRACKING SYSTEM</h1>
                            <h2 style="color:white">Helps you find the status of your mail</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="boxes_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box">
                            <h3 style="color:black; font-weight:bold">STUDENT</h3>
                            <p style="color:black; font-weight:bold">student can login to the system and send mail. they can also track their mails using teh tracking code</p>
                            <i class="fa fa-user-o"></i>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box">
                            <h3 style="color:black; font-weight:bold">STAFF</h3>
                            <p style="color:black; font-weight:bold">Staff from different offices can login to the system and check their office desk for mail from student and attend to them as appropriate.</p>
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box">
                            <h3 style="color:black; font-weight:bold">TRACK MAIL</h3>
                            <p style="color:black; font-weight:bold">This interface makes provision for users to enter their mail tracking code.</p>
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.carousel[data-type="multi"] .item').each(function(){
          var next = $(this).next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));

          for (var i=0;i<4;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
          }
        });        
    </script>
</body>
</html>