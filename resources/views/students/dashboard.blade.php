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
	<style type="text/css">
		#viewTeachers {
            display: none;
        }
        #viewMarks1, #viewMarks2, #viewMarks3, #viewMarks4, #viewMarks5, #viewMarks6  {
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
					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									{{-- <div class="col-lg-3 col-6" onclick="teachersList()">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title" style="float: left;"><i class="fa fa-user card-title"></i></h5>
												<h5 class="card-title" style="font-size: 18px;">Teachers Details</h5>
												{{-- <h1 style="color: #fff;text-align: center; font-size: 20px;">75</h1>
											</div>
										</div>
									</div> --}}
									<div class="col-lg-3 col-6" onclick="marksList1()">
										<div class="card" style="background-color: #1A95F1;">
											<div class="card-body">
												<h5 class="card-title" style="float: left;"><i class="fa fa-file-alt card-title"></i></h5>
												<h5 class="card-title" style="font-size: 18px;">Internal 1 Mark Sheet</h5>
												<h1 style="color: #fff;text-align: center; font-size: 20px;">{{ $getSem->academicSemesters }}</h1>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-6" onclick="marksList2()">
										<div class="card" style="background-color: #3B6A8D;">
											<div class="card-body">
												<h5 class="card-title" style="float: left;"><i class="fa fa-file-alt card-title"></i></h5>
												<h5 class="card-title" style="font-size: 18px;">Internal 2 Mark Sheet</h5>
												<h1 style="color: #fff;text-align: center; font-size: 20px;">{{ $getSem->academicSemesters }}</h1>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-6" onclick="marksList3()">
										<div class="card" style="background-color: #6391FF;">
											<div class="card-body">
												<h5 class="card-title" style="float: left;"><i class="fa fa-file-alt card-title"></i></h5>
												<h5 class="card-title" style="font-size: 18px;">Exam Mark Sheet</h5>
												<h1 style="color: #fff;text-align: center; font-size: 20px;">{{ $getSem->academicSemesters }}</h1>
											</div>
										</div>
									</div>
								</div>
								{{-- <div class="col-12 col-xl-12" id="viewTeachers">
			                        <div class="card">
			                            <div class="card-header">
			                                <h3><strong>Teachers Details:</strong></h3>
			                            </div>
			                            <table class="table table-striped">
			                                <thead>
			                                    <tr>
			                                        <th>Profile Picture</th>
			                                        <th>Name</th>
			                                        <th>Phone Number</th>
			                                        <th>Email</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    <tr>
			                                        <td><img src="../img/avatars/avatar.jpg" alt="teachers profile" class="avatar1 rounded-circle mr-2"></td>
			                                        <td>Vanessa  TuckerTucker</td>
			                                        <td>5846546566</td>
			                                        <td class="table-action">
			                                            <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
			                                            <a href="#"><i class="align-middle" data-feather="trash"></i></a>
			                                        </td>
			                                    </tr>
			                                    <tr>
			                                        <td>William Harris</td>
			                                        <td>914-939-2458</td>
			                                        <td class="d-none d-md-table-cell">May 15, 1948</td>
			                                        <td class="table-action">
			                                            <a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
			                                            <a href="#"><i class="align-middle" data-feather="trash"></i></a>
			                                        </td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </div>
			                    </div> --}}
			                    <div class="col-12 col-xl-12" id="viewMarks1">
			                        <div class="card">
			                            <div class="card-header">
			                                <h3><strong>Marks List {{ $getSem->academicSemesters }} 1st Internal:</strong></h3>
			                            </div>
			                            <table class="table table-striped">
			                                <thead>
			                                    <tr>
			                                        <th>Subject</th>
			                                        <th>Marks</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    <tr>
			                                        <td>{{ $Sub1->subjectName }}</td>
			                                        <td>{{ $getSem->subject1Internal1 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub2->subjectName }}</td>
			                                        <td>{{ $getSem->subject2Internal1 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub3->subjectName }}</td>
			                                        <td>{{ $getSem->subject3Internal1 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub4->subjectName }}</td>
			                                        <td>{{ $getSem->subject4Internal1 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub5->subjectName }}</td>
			                                        <td>{{ $getSem->subject5Internal1 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub6->subjectName }}</td>
			                                        <td>{{ $getSem->subject6Internal1 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td><b>Grand Total</b></td>
			                                        <td><b>{{ $getSem->internal1Total }}</b></td>
			                                    </tr>
			                                    <tr>
			                                        <td><b>Percentage</b></td>
			                                        <td><b>{{ $getSem->internal1Percentage }}%</b></td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </div>
			                    </div>
			                    <div class="col-12 col-xl-12" id="viewMarks2">
			                        <div class="card">
			                            <div class="card-header">
			                                <h3><strong>Marks List {{ $getSem->academicSemesters }} 2nd Internal:</strong></h3>
			                            </div>
			                            <table class="table table-striped">
			                                <thead>
			                                    <tr>
			                                        <th>Subject</th>
			                                        <th>Marks</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    <tr>
			                                        <td>{{ $Sub1->subjectName }}</td>
			                                        <td>{{ $getSem->subject1Internal2 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub2->subjectName }}</td>
			                                        <td>{{ $getSem->subject2Internal2 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub3->subjectName }}</td>
			                                        <td>{{ $getSem->subject3Internal2}}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub4->subjectName }}</td>
			                                        <td>{{ $getSem->subject4Internal2 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub5->subjectName }}</td>
			                                        <td>{{ $getSem->subject5Internal2 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub6->subjectName }}</td>
			                                        <td>{{ $getSem->subject6Internal2 }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td><b>Grand Total</b></td>
			                                        <td><b>{{ $getSem->internal2Total }}</b></td>
			                                    </tr>
			                                    <tr>
			                                        <td><b>Percentage</b></td>
			                                        <td><b>{{ $getSem->internal2Percentage }}%</b></td>
			                                    </tr>
			                                </tbody>
			                            </table>
			                        </div>
			                    </div>
			                    <div class="col-12 col-xl-12" id="viewMarks3">
			                        <div class="card">
			                            <div class="card-header">
			                                <h3><strong>Marks List {{ $getSem->academicSemesters }} Exam:</strong></h3>
			                            </div>
			                            <table class="table table-striped">
			                                <thead>
			                                    <tr>
			                                        <th>Subject</th>
			                                        <th>Marks</th>
			                                    </tr>
			                                </thead>
			                                <tbody>
			                                    <tr>
			                                        <td>{{ $Sub1->subjectName }}</td>
			                                        <td>{{ $getSem->subject1Exam }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub2->subjectName }}</td>
			                                        <td>{{ $getSem->subject2Exam }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub3->subjectName }}</td>
			                                        <td>{{ $getSem->subject3Exam}}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub4->subjectName }}</td>
			                                        <td>{{ $getSem->subject4Exam }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub5->subjectName }}</td>
			                                        <td>{{ $getSem->subject5Exam }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td>{{ $Sub6->subjectName }}</td>
			                                        <td>{{ $getSem->subject6Exam }}</td>
			                                    </tr>
			                                    <tr>
			                                        <td><b>Grand Total</b></td>
			                                        <td><b>{{ $getSem->examTotal }}</b></td>
			                                    </tr>
			                                    <tr>
			                                        <td><b>Percentage</b></td>
			                                        <td><b>{{ $getSem->examPercentage }}%</b></td>
			                                    </tr>
			                                </tbody>
			                            </table>
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
							<p class="mb-0"><strong class="text-muted">2022 Designed and Developed by</strong> <i class="align-middle" data-feather="heart"></i>
								<a href="https://www.nxtgio.com/" target="_blank" class="text-muted"><strong> nxtGIO Technologies LLP</strong></a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="../js/app.js"></script>
	<script type="text/javascript">
		function teachersList() {
            var x = document.getElementById("viewTeachers");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function marksList1() {
            var y = document.getElementById("viewMarks1");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }
        function marksList2() {
            var y = document.getElementById("viewMarks2");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }
        function marksList3() {
            var y = document.getElementById("viewMarks3");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }
        function marksList4() {
            var y = document.getElementById("viewMarks4");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }
        function marksList5() {
            var y = document.getElementById("viewMarks5");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }
        function marksList6() {
            var y = document.getElementById("viewMarks6");
            if (y.style.display === "block") {
                y.style.display = "none";
            } else {
                y.style.display = "block";
            }
        }
	</script>
</body>

</html>
