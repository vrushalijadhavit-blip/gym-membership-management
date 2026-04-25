<?php
include 'db.php';
session_start();

$id = $_GET['id'];

$result = $conn->query("
SELECT payments.*, users.name 
FROM payments 
JOIN users ON payments.user_id = users.id
WHERE payments.id = '$id'
");

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Receipt</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    background:#111;
    color:white;
    text-align:center;
}

.receipt{
    max-width:400px;
    margin:auto;
    margin-top:80px;

    padding:25px;
    background:rgba(255,255,255,0.1);
    border-radius:15px;
}

.btn-print{
    margin-top:15px;
    padding:8px 20px;
    border-radius:25px;
    background:linear-gradient(45deg,#ff4b2b,#ff416c);
    color:white;
    border:none;
}
</style>

</head>

<body>

<div class="receipt">

    <h3>💳 Payment Receipt</h3>

    <p><b>Name:</b> <?php echo $data['name']; ?></p>
    <p><b>Amount:</b> ₹<?php echo $data['amount']; ?></p>
    <p><b>Date:</b> <?php echo $data['payment_date']; ?></p>
    <p><b>Method:</b> <?php echo $data['method']; ?></p>

    <button class="btn-print" onclick="window.print()">Print Receipt</button>

</div>

</body>
</html>