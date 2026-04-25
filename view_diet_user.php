<?php
include 'db.php';
$result = $conn->query("SELECT * FROM diet_plan");
?>

<!DOCTYPE html>
<html>
<head>
<title>Diet</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    margin:0;
    min-height:100vh;

    /* 🔥 BACKGROUND */
    background: url('bg.jpg') no-repeat center center/cover;
}

/* dark overlay */
body::before{
    content:"";
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.55);
    z-index:-1;
}

/* title */
h3{
    color:white;
    font-weight:bold;
    text-align:center;
}

/* table glass */
.table{
    background:rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    color:white;
    border-radius:10px;
    overflow:hidden;
}

/* header */
.table th{
    background:rgba(0,0,0,0.6);
    color:white;
}

/* hover effect */
.table tbody tr:hover{
    background:rgba(255,255,255,0.1);
}

/* container spacing */
.container{
    margin-top:50px;
}

/* 🌈 BACK BUTTON */
.back-btn{
    display:inline-block;
    margin-top:20px;

    padding:10px 25px;
    border-radius:25px;

    text-decoration:none;
    font-weight:bold;

    color:white;

    background: linear-gradient(45deg, #00c6ff, #ff416c);
    transition:0.3s;
}

.back-btn:hover{
    transform:scale(1.1);
}
</style>

</head>

<body>

<div class="container">

<h3>🥗 Diet Plans</h3>

<table class="table table-hover table-bordered shadow mt-3">

<tr>
<th>Plan</th>
<th>Description</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['plan_name']; ?></td>
    <td><?php echo $row['description']; ?></td>
</tr>
<?php } ?>

</table>

<!-- 🔙 BACK BUTTON -->
<div class="text-center">
    <a href="user_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>
</div>

</div>

</body>
</html>