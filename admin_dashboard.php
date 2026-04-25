<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    margin:0;
    height:100vh;

    /* 🔥 BACKGROUND */
    background: url('abc.jpg') no-repeat center center/cover;
}

/* dark overlay for readability */
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
h2{
    color:white;
    font-weight:bold;
    margin-bottom:30px;
}

/* 🪞 GLASS CARD */
.card{
    border-radius:20px;

    background:rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);

    border:1px solid rgba(255,255,255,0.2);

    color:white;

    transition:0.3s;
}

.card:hover{
    transform:scale(1.07);
    box-shadow:0 0 20px rgba(255,255,255,0.3);
}

/* icon */
.card i{
    font-size:30px;
    margin-bottom:10px;
}

/* 🌈 BUTTON */
.btn-light{
    border-radius:20px;
    font-weight:bold;
    transition:0.3s;
}

/* 🔥 hover effect on button */
.btn-light:hover{
    background: linear-gradient(45deg, #ff4b2b, #ff416c);
    color:white;
    border:none;
    transform:scale(1.1);
}

/* logout */
.logout-btn{
    border-radius:25px;
    font-weight:bold;
}
</style>

</head>

<body>

<div class="container mt-5 text-center">

    <h2>👋 **Welcome Admin 🔰** </h2>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-user-plus"></i>
                <h4>Add Member</h4>
                <a href="add_member.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-users"></i>
                <h4>View Members</h4>
                <a href="view_members.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-dumbbell"></i>
                <h4>Equipment</h4>
                <a href="add_equipment.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-calendar"></i>
                <h4>Schedule</h4>
                <a href="add_schedule.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-apple-alt"></i>
                <h4>Diet Plan</h4>
                <a href="add_diet.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-money-bill"></i>
                <h4>Payments</h4>
                <a href="view_payments.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4 shadow">
                <i class="fas fa-comments"></i>
                <h4>Feedback</h4>
                <a href="view_feedback.php" class="btn btn-light mt-2">Go</a>
            </div>
        </div>

    </div>

    <a href="logout.php" class="btn btn-danger mt-3 logout-btn px-4">Logout</a>

</div>

</body>
</html>