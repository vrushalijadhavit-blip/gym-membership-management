<?php
include 'db.php';

$result = $conn->query("
SELECT payments.*, users.name 
FROM payments 
JOIN users ON payments.user_id = users.id
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Payments</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    margin:0;
    min-height:100vh;

    background: url('bg.jpg') no-repeat center center/cover;

    display:flex;
    justify-content:center;
    align-items:center;
}

/* overlay */
.overlay{
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.65);
    z-index:-1;
}

/* box */
.box{
    width:90%;
    max-width:1000px;

    padding:25px;
    border-radius:15px;

    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(15px);

    color:white;
    text-align:center;

    animation:fadeIn 1s ease;
}

/* title */
h2{
    font-weight:bold;
    color:white;
}

/* table */
.table{
    margin-top:20px;
}

/* 🔥 HEADER WHITE */
.table th{
    color:white !important;
    background:rgba(0,0,0,0.6);
}

/* 🔥 USER DATA BLACK (IMPORTANT CHANGE) */
.table td{
    color:black !important;
    background:rgba(255,255,255,0.7);
    font-weight:500;
}

/* hover effect */
.table tbody tr:hover{
    background:rgba(255,255,255,0.2);
    transition:0.3s;
}

/* back button */
.back-btn{
    margin-top:15px;
    display:inline-block;

    padding:10px 25px;
    border-radius:25px;

    text-decoration:none;
    color:white;
    font-weight:bold;

    background: linear-gradient(45deg, #00c6ff, #0072ff);
    transition:0.3s;
}

.back-btn:hover{
    transform:scale(1.05);
}

/* animation */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}
</style>

</head>

<body>

<div class="overlay"></div>

<div class="box">

<h2>💰 Payments Records</h2>

<table class="table table-bordered table-hover">

<tr>
<th>ID</th>
<th>User Name</th>
<th>Amount</th>
<th>Date</th>
<th>Method</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['name']}</td>
    <td>{$row['amount']}</td>
    <td>{$row['payment_date']}</td>
    <td>{$row['method']}</td>
    </tr>";
}
?>

</table>

<a href="admin_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>