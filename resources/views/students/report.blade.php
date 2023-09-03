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
		#studentsdetails, #competitorsList, #averageList {
  display:none;
}
	</style>
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="v">
					<span class="align-middle"><img src="../img/logo.png"></span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="/student/dashboard">
							<i class="fa fa-home"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item active">
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
									<div class="col-lg-4 col-6" onclick="myTeacherDetails()">
										<div class="card" style="background-color: #4F8FBF;">
											<div class="card-body">
												<h5 class="card-title" style="float: left;"><i class="fa fa-chart-line card-title"></i></h5>
												<h5 class="card-title" style="font-size: 18px;">Students Graph</h5>
												{{-- <h1 style="color: #fff;text-align: center; font-size: 20px;">23</h1> --}}
											</div>
										</div>
									</div>
								</div>
								<div class="row" id="studentsdetails">
									<div class="col-12">
								        <div class="card">
								          <div class="card-header">
			                                <h3><strong>Students Report:</strong></h3>
			                            </div>
								          <!-- /.card-header -->
								          <div class="card-body p-0">
								            <canvas id="myChart" style="width: 100%;height:200px;"></canvas>
								          </div>
								          <!-- /.card-body -->
								        </div>
								        <!-- /.card -->
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
	<script src="../js/chart.js"></script>
	<!-- ChartJS -->
<script src="../js/charts/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="../js/charts/jquery.knob.min.js"></script>
	<script>
function myTeacherDetails() {
  var x = document.getElementById("studentsdetails");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function competitorsList() {
  var x = document.getElementById("competitorsList");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function averageList() {
  var x = document.getElementById("averageList");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}


var xValues = ["1st Internal","2nd Internal","Exam"];
var yValues = [{{ $getSem->internal1Percentage }}, {{ $getSem->internal2Percentage }}, {{ $getSem->examPercentage }}];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:100,  stepSize: 20},
		scaleLabel: {
            display: true,
            labelString: "Percentage(%)",
            },}],
      xAxes: [{
        scaleLabel: {
            display: true,
            labelString: "Exams",
            },}],
    }
  }
});
</script>
</body>

</html>
