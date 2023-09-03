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

    <style>
        #view-teachers {
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
					<li class="sidebar-item active">
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
									<div class="col-sm-6" onclick="teachers_list()">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title mb-4" style="float: left;"><i class="fa fa-chalkboard-teacher card-title fa-3x"></i></h5>
												<h5 class="card-title mb-4">Teachers</h5>
												<h1 class="mt-2 mb-3" style="color: #fff;text-align: center;">{{ $totalTeachers }}</h1>
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
					<div class="col-12 col-xl-12" id="view-teachers">
                        <div class="card">
                            <div class="card-header">
                                <h3><strong>Teachers Details</strong></h3>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>Semester</th>
                                        <th>Add Sem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($getTeachers)>0)
                                    @foreach ($getTeachers as $data)
                                    <tr>
                                        @if($data->profilePricture == null)
                                        <td><img src="../img/logo.png" alt="teachers profile" class="avatar1 rounded-circle mr-2"></td>
                                        @else
                                        <td><img src="../img/avatars/teachers/{{ $data->profilePicture }}" alt="teachers profile" class="avatar1 rounded-circle mr-2"></td>
                                        @endif
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->email }}</td>
                                        @foreach ($getDepartment as $datas)
                                        @if($data->departmentId_fk == $datas->departmentId)
                                        <td>{{ $datas->departmentName }}</td>
                                        @else
                                        <td>-</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $data->academicSemesters }}</td>
                                        <td><a href="#open-modal-editactive-{{ $data->id }}" class="status_btn"><img src="../img/photos/eye.jpg" alt="eye" width="30px"></a></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>No Data Added</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @include("admin.fileUpload")
			</main>
                @foreach ($getTeachers as $data)
                <form action="/admin/addteacher" method="POST" enctype="multipart/form-data">
                    @csrf
			<div id="open-modal-editactive-{{ $data->id }}" class="modal-window">
                <div>
                <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
                <div class="input-field-pop">
                <div class="white_box mb_30">
                    <div class="box_header ">
                        <div class="main-title">
                            <h3 class="mb-0">Subjects</h3>
                        </div>
                    </div>
                    <input type="hidden" name="userid" id="id" value="{{ $data->id }}">
                    <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select class="form-control" name="department" id="department">
                                                <option value="">Select Department</option>
                                                    @foreach ($getDepartment as $datas=>$data)
                                                        <option value="{{ $data->departmentId }}">{{ $data->departmentName }}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td>
                                        <select class="form-control" name="academicSemesters" id="year">
                                            <option value="1st Sem">First Sem</option>
                                            <option value="2nd Sem">Second Sem</option>
                                            <option value="3rd Sem">Third Sem</option>
                                            <option value="4th Sem">Fourth Sem</option>
                                            <option value="5th Sem">Fifth Sem</option>
                                            <option value="6th Sem">Sixth Sem</option>
                                          </select>
                                        </td>
                                    </tr>
                                </tbody>
                    </table>
                <button type="submit" name="addDetails" class="btn btn-gradient-primary mr-2">Add Details</button>

                </div>
            </div>
        </div>
    </div>
</form>
    @endforeach
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
