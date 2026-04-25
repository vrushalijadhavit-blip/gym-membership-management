<?php
include 'db.php';

if(isset($_POST['submit'])){
    $workout = $_POST['workout'];
    $day = $_POST['day'];
    $time = $_POST['time'];

    $conn->query("INSERT INTO schedule(workout_name, day_of_week, time) 
                  VALUES('$workout','$day','$time')");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Schedule</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    margin:0;
    height:100vh;

    /* 🔥 LOCAL BACKGROUND */
    background: url('bg.jpg') no-repeat center center/cover;

    display:flex;
    justify-content:center;
    align-items:center;
}

/* dark overlay */
.overlay{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.65);
}

/* card */
.card-box{
    position:relative;
    z-index:1;

    width:420px;
    padding:30px;

    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);

    border-radius:15px;
    color:white;

    text-align:center;
    animation:fadeIn 1s ease;
}

/* inputs */
.form-control{
    margin-bottom:15px;
    border-radius:10px;
}

/* 🌈 BUTTON */
.btn-custom{
    width:100%;
    border:none;
    border-radius:25px;

    padding:10px;
    font-weight:bold;
    color:white;

    background: linear-gradient(45deg, #ff4b2b, #ff416c, #1fa2ff);
    background-size:300% 300%;

    transition:0.4s;
}

.btn-custom:hover{
    background-position:right;
    transform:scale(1.05);
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

<div class="card-box">

    <h2>🏋️ Workout Schedule</h2>
    <p>Add daily gym plan</p>

    <form method="post">

        <input type="text" name="workout" class="form-control" placeholder="Workout Name" required>

        <input type="text" name="day" class="form-control" placeholder="Day (Mon, Tue...)" required>

        <input type="time" name="time" class="form-control" required>

        <input type="submit" name="submit" value="Add Schedule" class="btn-custom">

    </form>

    <!-- BACK BUTTON -->
    <a href="admin_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>