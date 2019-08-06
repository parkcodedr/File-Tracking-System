<?php

session_start();
require('../vendor/autoload.php');
$client = new MongoDB\Client;
$tracker = $client->filetracker;
$routes = $tracker->routes;
$staff=$tracker->staff;
$file=$tracker->files;
$offices=$tracker->office;
$notification=$tracker->notification;

$staff_id = $_SESSION['staff'];
$file_info = $file->findOne(['_id'=>$_GET['file_id']]);
$staffObject =$staff->find([]);
$staff_id = $_SESSION['staff'];
    $staffoffice = $staff->findOne(['_id'=>$staff_id]);
    $id =(int)$staffoffice->office_id;
    $fromOffice = $offices->findOne(['_id'=>$id]);
    //var_dump($fromOffice);
    
$officeData =$offices->find([]);

if(isset($_POST['dispatch'])){
    
    $to_id = $_POST["dispatch_name"];
    $file_id = $_POST["file_id"];
    $note = $_POST["note"];
    

    
    $route_id = "ROT".rand(0000,9999);
    $routes->insertOne(['_id'=>$route_id,'from_id'=>$staffoffice->office_id,'file_id'=>$file_id,'to_id'=>$to_id,'note'=>$note]);
    
    $fileObject = $file->findOne(['_id'=>$file_id]);
    $name = ($fileObject->name);
    
    $date = date('Y-m-d:h-i-s');
    $notification->insertOne(['office_id'=>$to_id,'content'=>'A file with name  '.$fileObject->name.'  arrived from   '.$fromOffice->name.'  with note:  '.$note,'add_time'=>$date]);
     
    
}  

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Mail Tracking System</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.php" class="logo">
					<h3  class="navbar-brand" style="color:white">Mail Tracking </h3>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="assets/img/user.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="assets/img/user.png" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>Staff</h4>
											
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									
									<a class="dropdown-item" href="logout.php">Logout</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/user.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Mail Tracking System
									<span class="user-level">Staff</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="index.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">ADMIN MENU</h4>
						</li>
						<li class="nav-item">
							<a  href="notifications.php">
								<i class="fas fa-bell"></i>
								<p>Notification</p>
								
							</a>
							
						</li>
						<li class="nav-item">
							<a  href="files.php">
								<i class="fas fa-envelope"></i>
								<p>Mails</p>
								
							</a>
							
	</li>
						
						
						
						
						
						
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- Card -->
					<h4 class="page-title">Staff <small>Control Panel</small> </h4>
					<div class="row" style="background:white; padding:20px">
						
                    <div class="col-md-6 offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Dispatch File: <?php echo $file_info->name ?></h3>
                </div>
                <div style="padding: 10px;">
                    <form action="" method="post">
                      
                        <div class="form-group">
                            <label for="dispatch_name">Dispatch File to:</label><br>
                            <select name="dispatch_name" id="dispatch_name" class="form-control">
                                <?php foreach ($officeData as $office): ?>
                                    <option value="<?php echo $office->_id; ?>"><?php echo $office->name; ?></option>
                                <?php endforeach ?>
                            </select>
                            <br>
                            <div class="form-group">
                            <label for="note">Note (Optional)</label>
                            <input type="text" name="note" class="form-control" value="">
                            </div>   
                            <br>
                            <input type="hidden" name="file_id" value="<?php echo $_REQUEST['file_id'] ?>">
                        </div>
                        <input type="submit" value="Dispatch" class="btn btn-primary btn-block" name="dispatch">
                    </form>
                </div>
            </div>
        </div>
						</div>
					</div>
					<!-- Card With Icon States Color -->
					

					

					<!-- Pricing -->
			</div>		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Azzara JS -->
	<script src="assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
</body>
</html>





