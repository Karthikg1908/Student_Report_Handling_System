<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">

	<title>Student Report Handling System</title>

	<link href="../css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/admin/dashboard">
					<span class="align-middle"><img src="../img/logo.png"></span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item active">
						<a class="sidebar-link" href="/admin/dashboard">
							<i class="fa fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/teachers-list">
							<i class="fa fa-chalkboard-teacher"></i> <span class="align-middle">Teachers</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/students-list">
							<i class="fa fa-user"></i> <span
								class="align-middle">Students</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/subject-list">
							<i class="fa fa-book-open"></i> <span
								class="align-middle">Subjects</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/class-list">
							<i class="fa fa-chalkboard"></i> <span
								class="align-middle">Department</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>
				<div class="col-auto d-none d-sm-block">
					<h3><strong>Student Report Handling System</strong></h3>
				</div>


				@include('admin.header')
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title mb-4" style="float: left;"><i class="fa fa-chalkboard-teacher card-title fa-3x"></i></h5>
												<h5 class="card-title mb-4">Teachers</h5>
												<h1 class="mt-2 mb-3" style="color: #fff;text-align: center;">{{ $totalTeachers }}</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card" style="background-color: #53D2DB;">
											<div class="card-body">
												<h5 class="card-title mb-4" style="float: left;"><i class="fa fa-user card-title fa-3x"></i></h5>
												<h5 class="card-title mb-4">Students</h5>
												<h1 class="mt-2 mb-3" style="color: #fff;text-align: center;">{{ $totalStudents }}</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0"><strong class="text-muted">2022 Designed and Developed under</strong> <i class="align-middle" data-feather="heart"></i>
								<a href="https://www.nxtgio.com/" target="_blank" class="text-muted"><strong> nxtGIO Technologies LLP</strong></a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="../js/app.js"></script>
</body>

</html>
