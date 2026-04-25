<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: user_login.php");
    exit;
}

if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $msg = $_POST['message'];

    $conn->query("INSERT INTO feedback(user_id,message) VALUES('$user_id','$msg')");
    $success = "Feedback Submitted Successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Feedback</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    margin:0;
    min-height:100vh;

    /* 🔥 BACKGROUND */
    background: url('bg.jpg') no-repeat center center/cover;
}

/* overlay */
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

/* 🪞 GLASS CARD */
.card{
    max-width:500px;
    margin:auto;
    margin-top:80px;

    padding:30px;

    background:rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);

    border-radius:20px;
    border:1px solid rgba(255,255,255,0.2);

    color:white;
    text-align:center;

    box-shadow:0 0 20px rgba(255,255,255,0.1);
}

/* textarea */
.form-control{
    border-radius:10px;
}

/* 💬 SUBMIT BUTTON */
.btn-info{
    border-radius:25px;
    font-weight:bold;
    transition:0.3s;
}

.btn-info:hover{
    background: linear-gradient(45deg, #00c6ff, #ff416c);
    border:none;
    transform:scale(1.05);
}

/* 🌈 BACK BUTTON */
.back-btn{
    display:inline-block;
    margin-top:10px;

    padding:8px 20px;
    border-radius:25px;

    text-decoration:none;
    font-weight:bold;

    color:white;

    background: linear-gradient(45deg, #ff4b2b, #ff416c);
    transition:0.3s;
}

.back-btn:hover{
    transform:scale(1.1);
}
</style>

</head>

<body>

<div class="card">

    <h3>💬 Give Feedback</h3>

    <?php if(isset($success)) echo "<p class='text-success'>$success</p>"; ?>

    <form method="post">

        <textarea name="message" class="form-control mb-3" placeholder="Write your feedback..." required></textarea>

        <input type="submit" name="submit" value="Submit Feedback" class="btn btn-info w-100">

    </form>

    <!-- BACK BUTTON -->
    <a href="user_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>