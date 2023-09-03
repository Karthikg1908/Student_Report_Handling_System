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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">

    <style>
        #view-class {
            display: none;
        }
        #upload{
      		display: none;
       }
    </style>
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/admin/dashboard">
					<span class="align-middle"><img src="../img/logo.png"></span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
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
							<i class="fa fa-user"></i> <span class="align-middle">Students</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/admin/subject-list">
							<i class="fa fa-book-open"></i> <span class="align-middle">Subjects</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="/admin/class-list">
							<i class="fa fa-chalkboard"></i> <span class="align-middle">Department</span>
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
									<div class="col-sm-6" onclick="class_list()">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title mb-4" style="float: left;"><i class="fa fa-chalkboard-teacher card-title fa-3x"></i></h5>
												<h5 class="card-title mb-4">Departments</h5>
												<h1 class="mt-2 mb-3" style="color: #fff;text-align: center;">{{ $totalDepartment }}</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div onclick="myupload()">
              							<img src="../img/photos/plus-image.png" alt="Add account" style="width:100px; height:100px; padding-top: 18px;">
              						</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-12" id="view-class">
                        <div class="card">
                            <div class="card-header">
                                <h3><strong>Departments</strong></h3>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Department Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($getDepartment) > 0)
                                    @foreach ($getDepartment as $Department )
                                        <tr>
                                            <td>{{ $Department->departmentId }}</td>
                                            <td>{{ $Department->departmentName }}</td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td>No Departments Added</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>

                    <form action="/admin/addClass" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" id="upload">
                          <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <div class="form-group">
                                  <table class="table" id="addNewRow">
                                    <thead>
                                      <tr>
                                        <th style="font-weight:bold;">Department Name</th>
                                        <th style="font-weight:bold;">Add New Row</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         <tr>
                                             <td>
                                                 <input type="text" class="form-control" id="name" name="addmore[0][class]" placeholder="Enter Subject Name">
                                             </td>
                                             <td style="text-align: center;">
                                                 <a href="#" name="add" id="add-btn">
                                                     <i class="mdi mdi-table-row-plus-after"></i>
                                                 </a>
                                             </td>
                                         </tr>
                                    </tbody>
                                  </table>
                                  </div>
                              <button type="submit" name="addLibrarian" class="btn btn-gradient-primary mr-2">Add Department</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
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
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script>
        function class_list() {
            var x = document.getElementById("view-class");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function myupload(){
            var z = document.getElementById("upload");
            if(z.style.display === "block"){
              z.style.display = "none";
            }
            else{
              z.style.display = "block";
            }
          }
    </script>

<script>
    var i = 0;
    $("#add-btn").click(function () {
        ++i;
        $("#addNewRow").append(
            '<tbody><tr><td><input type="text" class="form-control" id="name" name="addmore['+i+'][class]" placeholder="Enter Subject Name"></td><td style="text-align: center;"><a href="#" name="remove" id="'+i+'" class="status_btn btn_remove"><i class="mdi mdi-table-row-remove"></i></a></td></tr></tbody>'
            );
    });
    $(document).on('click', '.btn_remove', function () {
        $(this).parents('tr').remove();
    });
</script>

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
