

<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: user_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    margin:0;
    min-height:100vh;
    background: url('abc.jpg') no-repeat center center/cover;
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

/* navbar glass */
.navbar{
    background: rgba(0,0,0,0.4);
    backdrop-filter: blur(10px);
}

.navbar-brand{
    color:white !important;
    font-weight:bold;
}

/* welcome */
.welcome-text{
    color:white;
    font-weight:bold;
}

/* glass card */
.card{
    border-radius:20px;
    background:rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border:1px solid rgba(255,255,255,0.2);
    color:white;
    transition:0.3s;
    height:100%;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0 0 20px rgba(255,255,255,0.2);
}

.card i{
    font-size:40px;
    margin-bottom:10px;
}

/* buttons */
.btn{
    border-radius:20px;
    font-weight:bold;
    transition:0.3s;
}

.btn:hover{
    transform:scale(1.05);
}

/* spacing */
.row{
    row-gap:25px;
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

    background: linear-gradient(45deg, #ff4b2b, #ff416c);
    transition:0.3s;
}

.back-btn:hover{
    transform:scale(1.1);
}
</style>

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand">🏋️ Gym System</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<!-- Welcome -->
<div class="container mt-4">
    <h3 class="welcome-text">
        Welcome, <?php echo $_SESSION['user_name']; ?> 👋
    </h3>
</div>

<!-- Cards -->
<div class="container mt-4">

    <div class="row">

        <div class="col-md-6 col-lg-3">
            <div class="card p-4 text-center">
                <i class="fas fa-calendar-alt text-primary"></i>
                <h5>Workout Schedule</h5>
                <a href="view_schedule_user.php" class="btn btn-primary mt-2">View</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card p-4 text-center">
                <i class="fas fa-apple-alt text-success"></i>
                <h5>Diet Plan</h5>
                <a href="view_diet_user.php" class="btn btn-success mt-2">View</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card p-4 text-center">
                <i class="fas fa-credit-card text-warning"></i>
                <h5>Payments</h5>
                <a href="payment.php" class="btn btn-warning mt-2">Pay</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card p-4 text-center">
                <i class="fas fa-comments text-info"></i>
                <h5>Feedback</h5>
                <a href="feedback.php" class="btn btn-info mt-2">Give</a>
            </div>
        </div>

    </div>

    <!-- 🔙 BACK BUTTON -->
    <div class="text-center">
        <a href="index.php" class="back-btn">⬅ Back</a>
    </div>

</div>

</body>
</html>