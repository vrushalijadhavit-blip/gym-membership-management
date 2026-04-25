<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check Admin
    $admin = $conn->query("SELECT * FROM admin WHERE email='$email'");
    
    if($admin->num_rows > 0){
        $a = $admin->fetch_assoc();

        if($password == $a['password']){
            $_SESSION['admin_id'] = $a['id'];
            $_SESSION['admin_name'] = $a['name'];
            header("Location: admin_dashboard.php");
            exit;
        }
    }

    // Check User
    $user = $conn->query("SELECT * FROM users WHERE email='$email'");
    
    if($user->num_rows > 0){
        $u = $user->fetch_assoc();

        if($password == $u['password']){
            $_SESSION['user_id'] = $u['id'];
            $_SESSION['user_name'] = $u['name'];
            header("Location: user_dashboard.php");
            exit;
        }
    }

    $error = "Invalid Email or Password!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body {
    background: linear-gradient(to right, #667eea, #764ba2);
}

.login-box {
    max-width: 400px;
    margin: auto;
    margin-top: 100px;
    padding: 30px;
    background: white;
    border-radius: 20px;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}
</style>

</head>

<body>

<div class="login-box text-center">

    <h3>Gym Login 🔐</h3>

    <?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

    <form method="post">

        <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>

        <input type="submit" name="login" value="Login" class="btn btn-primary w-100">

    </form>

    <p class="mt-3">Admin & User Login</p>

</div>

</body>
</html>