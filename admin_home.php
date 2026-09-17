<?php
include("admin_header.php");
include("connect.php");

/* ================= DASHBOARD COUNTS ================= */

$count_user = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_user"));
$count_package = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_package"));
$count_gallery = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_gallery"));
$count_destination = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_destination"));
$count_booking = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tbl_booking"));

/* ================= BAR CHART DATA ================= */

$pnames = [];
$booking_counts = [];

$chart_query = mysqli_query($con,"
SELECT p.pname, COUNT(b.bid) AS total_booking
FROM tbl_package p
LEFT JOIN tbl_booking b ON p.pid = b.pid
GROUP BY p.pid
");

while($row = mysqli_fetch_assoc($chart_query)){
    $pnames[] = $row['pname'];
    $booking_counts[] = $row['total_booking'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AtlasGo Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
    body{
        background:#eef5ff;
        font-family:'Segoe UI',sans-serif;
    }

    .dashboard-heading{
        background:linear-gradient(135deg,#2563eb,#3b82f6);
        color:white;
        padding:20px;
        border-radius:18px;
        margin-bottom:30px;
        box-shadow:0 10px 20px rgba(37,99,235,.25);
    }

    .dashboard-heading h2{
        margin:0;
        font-weight:bold;
    }

    .dashboard-heading p{
        margin-top:5px;
        opacity:.9;
    }

    .stat-card{
        background:#fff;
        border-radius:18px;
        padding:20px;
        box-shadow:0 8px 20px rgba(0,0,0,.08);
        transition:.3s;
        display:flex;
        align-items:center;
    }

    .stat-card:hover{
        transform:translateY(-8px);
        box-shadow:0 15px 25px rgba(0,0,0,.15);
    }

    .icon-box{
        width:70px;
        height:70px;
        border-radius:15px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:28px;
        color:#fff;
    }

    .bg1{background:#16a34a;}
    .bg2{background:#2563eb;}
    .bg3{background:#9333ea;}
    .bg4{background:#ea580c;}
    .bg5{background:#0891b2;}
    .bg6{background:#db2777;}

    .title{
        color:#64748b;
        font-size:14px;
    }

    .number{
        font-size:28px;
        font-weight:bold;
        color:#1e293b;
    }

    .chart-card,.footer-box{
        background:#fff;
        border-radius:18px;
        padding:20px;
        box-shadow:0 8px 20px rgba(0,0,0,.08);
        margin-top:25px;
    }

    .chart-title{
        color:#2563eb;
        font-weight:600;
        margin-bottom:15px;
    }

    th{
        background:#2563eb !important;
        color:white !important;
    }
    </style>

</head>

<body>

<div class="container-fluid py-4">

<div class="dashboard-heading">
<h2><i class="fa-solid fa-earth-asia"></i> AtlasGo Admin Dashboard</h2>
<p>Welcome Admin • Travel Management System</p>
</div>

<div class="row g-4">

<div class="col-md-4">
<div class="stat-card">
<div class="icon-box bg1"><i class="fa-solid fa-indian-rupee-sign"></i></div>
<div class="ms-3">
<div class="title">Total Revenue</div>
<div class="number">₹112000</div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="stat-card">
<div class="icon-box bg2"><i class="fa-solid fa-suitcase"></i></div>
<div class="ms-3">
<div class="title">Packages Added</div>
<div class="number"><?php echo $count_package; ?></div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="stat-card">
<div class="icon-box bg3"><i class="fa-solid fa-calendar-check"></i></div>
<div class="ms-3">
<div class="title">Bookings Done</div>
<div class="number"><?php echo $count_booking; ?></div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="stat-card">
<div class="icon-box bg4"><i class="fa-solid fa-location-dot"></i></div>
<div class="ms-3">
<div class="title">Destinations</div>
<div class="number"><?php echo $count_destination; ?></div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="stat-card">
<div class="icon-box bg5"><i class="fa-solid fa-users"></i></div>
<div class="ms-3">
<div class="title">Active Users</div>
<div class="number"><?php echo $count_user; ?></div>
</div>
</div>
</div>

<div class="col-md-4">
<div class="stat-card">
<div class="icon-box bg6"><i class="fa-solid fa-images"></i></div>
<div class="ms-3">
<div class="title">Gallery Images</div>
<div class="number"><?php echo $count_gallery; ?></div>
</div>
</div>
</div>

</div>

<div class="row mt-4">

<div class="col-lg-8">
<div class="chart-card">
<h4 class="chart-title"><i class="fa-solid fa-chart-column"></i> Package Wise Bookings</h4>
<canvas id="bookingChart" height="120"></canvas>
</div>
</div>

<div class="col-lg-4">
<div class="chart-card">
<h4 class="chart-title"><i class="fa-solid fa-chart-pie"></i> Website Statistics</h4>
<canvas id="statsChart"></canvas>
</div>
</div>

</div>

<div class="footer-box">
<h4 class="chart-title"><i class="fa-solid fa-table"></i> Dashboard Summary</h4>

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Module</th>
<th>Total Records</th>
</tr>
</thead>

<tbody>
<tr><td>Users</td><td><?php echo $count_user; ?></td></tr>
<tr><td>Packages</td><td><?php echo $count_package; ?></td></tr>
<tr><td>Bookings</td><td><?php echo $count_booking; ?></td></tr>
<tr><td>Destinations</td><td><?php echo $count_destination; ?></td></tr>
<tr><td>Gallery Images</td><td><?php echo $count_gallery; ?></td></tr>
</tbody>

</table>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

// BAR CHART
new Chart(document.getElementById("bookingChart"),{

type:"bar",

data:{
labels:<?php echo json_encode($pnames); ?>,

datasets:[{
label:"Bookings",
data:<?php echo json_encode($booking_counts); ?>,

backgroundColor:[
"#2563EB",
"#10B981",
"#F59E0B",
"#9333EA",
"#EC4899",
"#06B6D4",
"#EA580C"
],
borderRadius:8
}]
},

options:{
responsive:true,
plugins:{legend:{display:false}},
scales:{y:{beginAtZero:true}}
}

});

// PIE CHART
new Chart(document.getElementById("statsChart"),{

type:"pie",

data:{
labels:["Users","Packages","Bookings","Destinations","Gallery"],

datasets:[{
data:[
<?php echo $count_user; ?>,
<?php echo $count_package; ?>,
<?php echo $count_booking; ?>,
<?php echo $count_destination; ?>,
<?php echo $count_gallery; ?>
],

backgroundColor:[
"#2563EB",
"#10B981",
"#9333EA",
"#F59E0B",
"#DB2777"
]
}]
},

options:{
responsive:true,
plugins:{
legend:{
position:"bottom"
}
}
}

});

</script>

<?php include("admin_footer.php"); ?>

</body>
</html>
