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
        #view-students{
            display: none;
        }
    </style>
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/class-teacher/dashboard">
					<span class="align-middle"><img src="../img/logo.png"></span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="/class-teacher/dashboard">
							<i class="fa fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item active">
						<a class="sidebar-link" href="/class-teacher/students-list">
							<i class="fa fa-user"></i> <span class="align-middle">Students</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			@include('class_teacher.header')
            <main class="content">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6" onclick="students_list()">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title mb-4" style="float: left;"><i class="fa fa-chalkboard-teacher card-title fa-3x"></i></h5>
												<h5 class="card-title mb-4">Students</h5>
												<h1 class="mt-2 mb-3" style="color: #fff;text-align: center;">{{ $countStudents }}</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-12" id="view-students">
                        <div class="card">
                            <div class="card-header">
                                <h3><strong>Students Details</strong></h3>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Profile Photo</th>
                                        <th>Student Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Add Subjects</th>
                                        <th>Add Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($getStudents)>0)
                                    @foreach ($getStudents as $data)
                                    <tr>
                                        @if($data->profilePicture == null)
                                        <td>
                                            <img src="../img/logo.png" class="avatar img-fluid rounded mr-1"
													alt="profile pic" /> </td>
                                        @else
                                        <td>
                                            <img src="../images/students/{{$data->profilePicture}}" class="avatar img-fluid rounded mr-1"
													alt="profile pic" /> </td>
                                                    @endif
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td><a href="#open-modal-editactive-{{ $data->id }}" class="status_btn"><img src="../img/photos/eye.jpg" alt="eye" width="30px"></a></td>
                                        <td><a href="#open-modal-addmarks-{{ $data->id }}" class="status_btn"><img src="../img/photos/eye.jpg" alt="eye" width="30px"></a></td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>No Students</td>
                                        <td></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

			</main>
            @foreach ($getStudents as $data)
            <form action="/class-teacher/addSubjects" method="POST" enctype="multipart/form-data">
                @csrf
			 <div id="open-modal-editactive-{{ $data->id }}" class="modal-window">
                <div>
                    <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
                    <div class="input-field-pop">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Add Subjects</h3>
                                </div>
                            </div><br>
                      <div class="mb-3">
                        <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                      <select name="sub1" id="sub1" class="form-control" required>
                            <option>Subject Name</option>
                            @foreach ($getSubject as $data)
                            <option value="{{ $data->subjectId }}">{{$data->subjectName}}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <select name="sub2" id="sub2" class="form-control" required>
                            <option>Subject Name</option>
                            @foreach ($getSubject as $data)
                            <option value="{{ $data->subjectId }}">{{$data->subjectName}}</option>
                            @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <select name="sub3" id="sub3" class="form-control" required>
                        <option>Subject Name</option>
                        @foreach ($getSubject as $data)
                        <option value="{{ $data->subjectId }}">{{$data->subjectName}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <select name="sub4" id="sub4" class="form-control" required>
                        <option>Subject Name</option>
                        @foreach ($getSubject as $data)
                        <option value="{{ $data->subjectId }}">{{$data->subjectName}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <select name="sub5" id="sub5" class="form-control" required>
                        <option>Subject Name</option>
                        @foreach ($getSubject as $data)
                        <option value="{{ $data->subjectId }}">{{$data->subjectName}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <select name="sub6" id="sub6" class="form-control" required>
                        <option>Subject Name</option>
                        @foreach ($getSubject as $data)
                        <option value="{{ $data->subjectId }}">{{$data->subjectName}}</option>
                        @endforeach
                      </select>
                    </div>
                        </div>
                    </div>
                <button type="submit" name="addDetails" class="btn btn-gradient-primary mr-2">Add Details</button>
            </div>
            </div></form>
            @endforeach

            @foreach ($getStudents as $data)
            <form action="/class-teacher/addSubjects" method="POST" enctype="multipart/form-data">
                @csrf
            <div id="open-modal-addmarks-{{ $data->id }}" class="modal-window">
                <div>
                    <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
                    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                    <div class="input-field-pop">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Add Marks</h3>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="main-title">
                                    <h3 class="mb-0">Internal 1 Marks</h3>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 1</label>
                                        <input class="form-control" type="text" name="sub1sem1Marks" value="{{ $data->subject1Internal1 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 2</label>
                                        <input class="form-control" type="text" name="sub2sem1Marks" value="{{ $data->subject2Internal1 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 3</label>
                                        <input class="form-control" type="text" name="sub3sem1Marks" value="{{ $data->subject3Internal1 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 4</label>
                                        <input class="form-control" type="text" name="sub4sem1Marks" value="{{ $data->subject4Internal1 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 5</label>
                                        <input class="form-control" type="text" name="sub5sem1Marks" value="{{ $data->subject5Internal1 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 6</label>
                                        <input class="form-control" type="text" name="sub6sem1Marks" value="{{ $data->subject6Internal1 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="main-title">
                                    <h3 class="mb-0">Internal 2 Marks</h3>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 1</label>
                                        <input class="form-control" type="text" name="sub1sem2Marks" value="{{ $data->subject1Internal2 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 2</label>
                                        <input class="form-control" type="text" name="sub2sem2Marks" value="{{ $data->subject2Internal2 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 3</label>
                                        <input class="form-control" type="text" name="sub3sem2Marks" value="{{ $data->subject3Internal2 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 4</label>
                                        <input class="form-control" type="text" name="sub4sem2Marks" value="{{ $data->subject4Internal2 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 5</label>
                                        <input class="form-control" type="text" name="sub5sem2Marks" value="{{ $data->subject5Internal2 }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 6</label>
                                        <input class="form-control" type="text" name="sub6sem2Marks" value="{{ $data->subject6Internal2 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="main-title">
                                    <h3 class="mb-0">Exam Marks</h3>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 1</label>
                                        <input class="form-control" type="text" name="sub1exam" value="{{ $data->subject1Exam }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 2</label>
                                        <input class="form-control" type="text" name="sub2exam" value="{{ $data->subject2Exam }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 3</label>
                                        <input class="form-control" type="text" name="sub3exam" value="{{ $data->subject3Exam }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 4</label>
                                        <input class="form-control" type="text" name="sub4exam" value="{{ $data->subject4Exam }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 5</label>
                                        <input class="form-control" type="text" name="sub5exam" value="{{ $data->subject5Exam }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="status">Subject 6</label>
                                        <input class="form-control" type="text" name="sub6exam" value="{{ $data->subject6Exam }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="addMarks" class="btn btn-gradient-primary mr-2">Add Details</button>
                    </div>
                </div>
            </div></form>
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
        function students_list() {
            var x = document.getElementById("view-students");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
</body>

</html>
