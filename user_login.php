<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if($password == $user['password']){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header("Location: user_dashboard.php");
        } else {
            $error = "Wrong Password!";
        }
    } else {
        $error = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>User Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body {
    margin: 0;
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;

    /* 🔥 Animated Gradient Background */
    background: linear-gradient(-45deg, #6a11cb, #2575fc, #ff6a00, #ee0979);
    background-size: 400% 400%;
    animation: gradientMove 10s ease infinite;

    display: flex;
    justify-content: center;
    align-items: center;
}

/* Background Animation */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* MAIN CARD */
.container-box {
    width: 850px;
    display: flex;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    animation: fadeUp 1s ease;
}

/* LEFT */
.left {
    width: 50%;
    padding: 40px;
    color: white;
    animation: slideLeft 1s ease;
}

/* TAG */
.tag {
    display: inline-block;
    padding: 5px 15px;
    background: rgba(255,255,255,0.3);
    border-radius: 20px;
    font-size: 12px;
    margin-bottom: 10px;
}

/* INPUT */
.form-control {
    border-radius: 10px;
    margin-bottom: 15px;
    transition: 0.3s;
}

.form-control:focus {
    transform: scale(1.03);
    box-shadow: 0 0 10px rgba(255,255,255,0.5);
}

/* BUTTON */
.btn-login {
    background: linear-gradient(to right, #ff6a00, #ee0979);
    color: white;
    border-radius: 25px;
    font-weight: bold;
    border: none;
    transition: 0.3s;
}

.btn-login:hover {
    transform: scale(1.08);
}

/* RIGHT IMAGE */
.right {
    width: 50%;
    background: url('FIT.jpg') no-repeat center/cover;
    animation: zoomImage 10s infinite alternate;
}

/* Animations */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes zoomImage {
    from { background-size: 100%; }
    to { background-size: 110%; }
}

/* Responsive */
@media(max-width:768px){
    .container-box {
        flex-direction: column;
        width: 90%;
    }
    .right {
        height: 200px;
    }
}
</style>

</head>

<body>

<div class="container-box">

    <!-- LEFT -->
    <div class="left">

        <div class="tag">USER PANEL 👤 </div>

        <h2>User Login</h2>
        <p>Access your fitness dashboard</p>

        <?php if(isset($error)) echo "<p class='text-warning'>$error</p>"; ?>

        <form method="post">

            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>

            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>

            <input type="submit" name="login" value="Login" class="btn btn-login w-100">

        </form>

    </div>

    <!-- RIGHT -->
    <div class="right"></div>

</div>

</body>
</html>