<?php
    
require('../vendor/autoload.php');
$client = new MongoDB\Client;
$tracker = $client->filetracker;
$staff = $tracker->staff;
$office = $tracker->office;

$msg="";
$offices = $office->find([]);
//Protecting Pages

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $office_id = $_POST['office'];
   

    if(empty($name) or empty($email) or empty($office)) {
        $msg.="<div class='text-danger'> All fields are compulsory.</div>";
    }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $msg.="<div class='text-danger'> Invalid Email.</div>";
    
    }else{
       
$staff_id="STF20".rand(00000,99999);
$password=md5($staff_id);

$result = $staff->insertOne(['_id'=>$staff_id,'name'=>$name,'email'=>$email,'password'=>$password,'office_id'=>$office_id ]);
if($result){
    $msg.="<div class='text-success'> Registered Successfully.</div>";
}else{
    $msg.="<div class='text-danger'> Error Occur.</div>";
}

    }
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
											<h4>Admin</h4>
											
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">My Profile</a>
									
									<a class="dropdown-item" href="#">Logout</a>
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
									<span class="user-level">Admin</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="index.html">
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
							<a  href="register.php">
								<i class="fas fa-user"></i>
								<p>Add Staff</p>
								
							</a>
							
						</li>
						<li class="nav-item">
							<a  href="add_office.php">
								<i class="fas fa-plus"></i>
								<p>Add Office</p>
								
							</a>
							
						</li
						
						
						
						
						
						
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<!-- Card -->
					<h4 class="page-title">Admin <small>Control Panel</small> </h4>
					<div class="row">

                    <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-heading">
                   <center> <h3 style="margin-top:30px">Register</h3></center>
                </div>
                <center><?php echo $msg ?></center>
                <div style="padding: 30px;" class="card-body">
                    <form  method="post" class="form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" placeholder="you@somewhere.com" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="file_name">Office</label>
                            <select name="office" class="form-control">
                            <?php foreach($offices as $off){
                                ?>
                            <option value="<?php echo $off->_id ?>"><?php echo $off->name ?></option>
                            <?php }?>
                            </select>
                        </div>
                        
                        <input type="submit" value="Register" class="btn btn-danger btn-block" name="register">
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