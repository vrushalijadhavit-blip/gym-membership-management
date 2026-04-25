<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: user_login.php");
    exit;
}

$showReceipt = false;
$paidAmount = "";
$methodUsed = "";

if(isset($_POST['submit'])){
    $amount = $_POST['amount'];
    $method = $_POST['method'];
    $date = date("Y-m-d");
    $user_id = $_SESSION['user_id'];

    $conn->query("INSERT INTO payments(user_id,amount,payment_date,method) 
                  VALUES('$user_id','$amount','$date','$method')");

    $showReceipt = true;
    $paidAmount = $amount;
    $methodUsed = $method;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>

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

body::before{
    content:"";
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.6);
    z-index:-1;
}

/* MAIN BOX */
.payment-box{
    max-width:450px;
    padding:30px;
    border-radius:20px;

    background:rgba(255,255,255,0.12);
    backdrop-filter: blur(12px);

    color:white;
    text-align:center;
}

/* inputs */
.form-control{
    border-radius:10px;
}

/* button */
.btn-success{
    border-radius:25px;
}

/* QR */
.qr-box{
    display:none;
    margin-top:15px;
}
.qr-box img{
    width:180px;
}

/* RECEIPT STYLE */
.receipt{
    margin-top:20px;
    padding:15px;
    border-radius:15px;
    background:rgba(255,255,255,0.15);
}

.receipt input{
    width:100%;
    padding:10px;
    border-radius:10px;
    border:none;
    margin-top:10px;
}
</style>

</head>

<body>

<div class="payment-box">

<?php if(!$showReceipt){ ?>

    <h3>Make Payment</h3>

    <form method="post">

        <input type="number" name="amount" class="form-control mb-3" placeholder="Amount" required>

        <select name="method" class="form-control mb-3" id="methodSelect">
            <option value="Cash">Cash</option>
            <option value="UPI">UPI</option>
            <option value="Card">Card</option>
        </select>

        <div class="qr-box" id="qrBox">
            <p>Scan QR to Pay</p>
            <img src="qr.jpg">
        </div>

        <input type="submit" name="submit" value="Pay Now" class="btn btn-success w-100">

    </form>

<?php } else { ?>

    <!-- 🔥 RECEIPT SAME PAGE -->
    <h3>Payment Successful ✅</h3>

    <div class="receipt">

        <p><b>Amount Paid:</b></p>
        <input type="text" value="<?php echo $paidAmount; ?>" readonly>

        <p class="mt-2"><b>Method:</b> <?php echo $methodUsed; ?></p>

    </div>

    <br>
    <a href="user_dashboard.php" class="btn btn-success w-100">Back to Dashboard</a>

<?php } ?>

</div>

<script>
document.getElementById("methodSelect")?.addEventListener("change", function(){
    let qr = document.getElementById("qrBox");
    if(this.value === "UPI"){
        qr.style.display = "block";
    } else {
        qr.style.display = "none";
    }
});
</script>

</body>
</html>