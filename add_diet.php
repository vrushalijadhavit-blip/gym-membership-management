<?php
include 'db.php';

if(isset($_POST['submit'])){
    $plan = $_POST['plan'];
    $desc = $_POST['desc'];

    $conn->query("INSERT INTO diet_plan(plan_name, description) 
                  VALUES('$plan','$desc')");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Diet Plan</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body{
    margin:0;
    height:100vh;

    background: url('bg.jpg') no-repeat center center/cover;

    display:flex;
    justify-content:center;
    align-items:center;
}

.overlay{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.65);
}

.card-box{
    position:relative;
    z-index:1;

    width:450px;
    padding:30px;

    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(15px);

    border-radius:15px;
    color:white;

    text-align:center;
    animation:fadeIn 1s ease;
}

.form-control{
    margin-bottom:15px;
    border-radius:10px;
}

.btn-custom{
    width:100%;
    border:none;
    border-radius:25px;

    padding:10px;
    font-weight:bold;
    color:white;

    background: linear-gradient(45deg, #00c6ff, #ff4b2b, #ff416c);
    background-size:300% 300%;

    transition:0.4s;
}

.btn-custom:hover{
    background-position:right;
    transform:scale(1.05);
}

/* 🔵 BACK BUTTON */
.back-btn{
    margin-top:15px;
    display:inline-block;

    width:100%;
    text-align:center;

    padding:10px;
    border-radius:25px;

    text-decoration:none;
    color:white;
    font-weight:bold;

    background: linear-gradient(45deg, #0072ff, #00c6ff);
    transition:0.3s;
}

.back-btn:hover{
    transform:scale(1.05);
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}
</style>

</head>

<body>

<div class="overlay"></div>

<div class="card-box">

    <h3>🥗 Add Diet Plan</h3>
    <p>Create healthy fitness plan</p>

    <form method="post">

        <input type="text" name="plan" class="form-control" placeholder="Plan Name" required>

        <textarea name="desc" class="form-control" placeholder="Diet Description" required></textarea>

        <input type="submit" name="submit" value="Add Plan" class="btn-custom">

    </form>

    <!-- ✅ BACK BUTTON ADDED -->
    <a href="admin_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>