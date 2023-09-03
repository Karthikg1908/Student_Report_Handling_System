<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<title>Student Report Handling System</title>

	<link href="../css/app.css" rel="stylesheet">
	<style>
		.image-upload>input {
			display: none;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/student/dashboard">
					<span class="align-middle"><img src="../img/logo.png"></span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item active">
						<a class="sidebar-link" href="/student/dashboard">
							<i class="fa fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/student/report">
							<i class="fa fa-chart-line"></i> <span class="align-middle">Student Report</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			@include('students.header')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Profile</h1>

					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h3 class="mb-0">Profile Details</h3>
								</div>
								<div class="card-body text-center">
									@if(Auth::user()->profilePicture == 0)
									<img src="../img/avatars/avatar-4.jpg" alt="Christina Mason"
										class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                        @else
                                        <img src="../images/students/{{ Auth::user()->profilePicture }}" alt="Christina Mason"
										class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                        @endif
									<h3 class="mb-0" style="color: black;">Student Name</h3>
									<div class="text-muted mb-2">{{ Auth::user()->name }}</div>
									<form action="/student/profileUpdate" method="post" enctype="multipart/form-data">
                                        @csrf
										<div class="mt-2 image-upload">
											<label for="file-input">
												<span class="btn btn-primary"><i class="fas fa-upload"></i>
													Upload</span>
											</label>
											<input id="file-input" name="img" type="file" />
										</div>
								</div>
								<button type="submit" class="btn btn-success">Submit</button>
								</form>
								<hr class="my-0" />
							</div>
						</div>

						<div class="col-12 col-xl-9">
							<div class="card">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email Id</th>
											<th>Phone Number</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{{ Auth::user()->name }}</td>
											<td>{{ Auth::user()->email }}</td>
											<td>{{ Auth::user()->phone }}</td>
										</tr>
									</tbody>
								</table>
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

	<script src="js/app.js"></script>
    <script>
        @if (session('status'))
            swal({
            title: ' {{ session('status') }}',
            icon: "success",
            button: "Done",
            });
        @endif
    </script>

</body>

</html>
