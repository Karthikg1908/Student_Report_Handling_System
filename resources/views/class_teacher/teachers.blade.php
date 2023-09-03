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
    <style>
        #view-teachers {
            display: none;
        }
    </style>
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle"><img src="../img/logo.png"></span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="ct-dashboard.html">
							<i class="fa fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="ct-teachers.html">
							<i class="fa fa-chalkboard-teacher"></i> <span class="align-middle">Teachers</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="ct-students.html">
							<i class="fa fa-user"></i> <span
								class="align-middle">Students</span>
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
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
								data-toggle="dropdown">
								<img src="../img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1"
									alt="profile pic" /> <span class="text-dark">Admin Name</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="ct_profile.html"><i class="align-middle mr-1"
										data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
            <main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6" onclick="teachers_list()">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title mb-4" style="float: left;"><i class="fa fa-chalkboard-teacher card-title fa-3x"></i></h5>
												<h5 class="card-title mb-4">Teachers</h5>
												<h1 class="mt-2 mb-3" style="color: #fff;text-align: center;">23</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div><a href="#open-modal-editactive" class="status_btn">
              							<img src="../img/photos/plus-image.png" alt="Add account" style="width:100px; height:100px; padding-top: 18px;"></a>
              						</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-12" id="view-teachers">
                        <div class="card">
                            <div class="card-header">
                                <h3><strong>Teachers Details</strong></h3>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Teacher Name</th>
                                        <th>Subject</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Vanessa  TuckerTucker</td>
                                        <td>Maths</td>
                                        <td>9900990099</td>
                                        <td>Sadashiva Nagar, Bangalore</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>William Harris</td>
                                        <td>Social Studies</td>
                                        <td>9999000090</td>
                                        <td>Hebbal, Bangalore</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Sharon Lessman</td>
                                        <td>English</td>
                                        <td>990000000099</td>
                                        <td>Malleshwaram, Bangalore</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Christina Mason</td>
                                        <td>Science</td>
                                        <td>9900999999</td>
                                        <td>Ganga Nagar, Bangalore</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Robin Schneiders</td>
                                        <td>Hindi</td>
                                        <td>7788990099</td>
                                        <td>Vijaya Nagar, Bangalore</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

			</main>
			 <div id="open-modal-editactive" class="modal-window">
                <div>
                    <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
                    <div class="input-field-pop">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Add Teachers</h3>
                                </div>
                            </div><br>
							<div class="mb-3">
								<select name="isactive" id="isactive" class="form-control" required>
                            <option>Teacher Name</option>
                            <option value="Vanessa  TuckerTucker">Vanessa  TuckerTucker</option>
                            <option value="William Harris">William Harris</option>
                            <option value="Sharon Lessman">Sharon Lessman </option>
						</select>
							</div>
							<div class="mb-3">
						<select name="isactive" id="isactive" class="form-control" required>
                            <option>Subject Name</option>
                            <option value="Maths">Maths</option>
                            <option value="English">English</option>
                            <option value="Science">Science</option>
						</select>
                        </div>
                        </div>
                        <button class="btn btn-outline-primary">Update</button>
                    </div>
                </div>
            </div>
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
    <script>
        function teachers_list() {
            var x = document.getElementById("view-teachers");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
</body>

</html>
