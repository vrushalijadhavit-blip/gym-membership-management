<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM admin WHERE email='$email'");

    if($result->num_rows > 0){
        $admin = $result->fetch_assoc();

        if($password == $admin['password']){
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];

            header("Location: admin_dashboard.php");
            exit;
        } else {
            $error = "Wrong Password!";
        }
    } else {
        $error = "Admin Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body {
    margin: 0;
    height: 100vh;
    background: linear-gradient(120deg, #ff6a00, #ee0979);
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Arial;
    overflow: hidden;
}

/* Floating circles */
body::before, body::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    opacity: 0.3;
    animation: float 6s infinite alternate;
}

body::before {
    width: 250px;
    height: 250px;
    background: white;
    top: -50px;
    left: -50px;
}

body::after {
    width: 300px;
    height: 300px;
    background: black;
    bottom: -80px;
    right: -80px;
}

@keyframes float {
    from { transform: translateY(0); }
    to { transform: translateY(40px); }
}

/* Main Box */
.container-box {
    width: 900px;
    height: 500px;
    display: flex;
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 0 30px rgba(0,0,0,0.3);
    animation: fadeIn 1s ease;
}

.container-box:hover {
    transform: scale(1.02);
    transition: 0.3s;
}

/* Left */
.left {
    width: 50%;
    padding: 40px;
}

/* Admin Badge */
.admin-badge {
    display: inline-block;
    background: #ff4d4d;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    margin-bottom: 10px;
    animation: pulse 1.5s infinite;
}

/* Pulse */
@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

/* Right Image */
.right {
    width: 50%;
    background: url('Gym2.jpg') no-repeat center/cover;
    animation: zoom 8s infinite alternate;
}

@keyframes zoom {
    0% { background-size: 100%; }
    100% { background-size: 110%; }
}

/* Input glow */
.form-control:focus {
    box-shadow: 0 0 10px #ff4d4d;
    border-color: #ff4d4d;
}

/* Button */
.btn-custom {
    background: linear-gradient(to right, #ff512f, #dd2476);
    color: white;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
}

.btn-custom::after {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.3);
    transition: 0.5s;
}

.btn-custom:hover::after {
    left: 100%;
}

.btn-custom:hover {
    transform: scale(1.05);
}

/* Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

</head>

<body>

<div class="container-box">

    <div class="left">

        <span class="admin-badge">ADMIN PANEL</span>

        <h2 id="typing"></h2>
        <p>Secure login for admin 🔐</p>

        <?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>

        <form method="post">

            <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>

            <!-- Password with eye -->
            <div class="position-relative">
                <input type="password" id="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>
                <span onclick="togglePass()" style="position:absolute; right:10px; top:10px; cursor:pointer;">👁️</span>
            </div>

            <input type="submit" name="login" value="Admin Login" class="btn btn-custom w-100">

        </form>

    </div>

    <div class="right"></div>

</div>

<script>
// Show/Hide Password
function togglePass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// Typing Effect
let text = "Admin Login Panel";
let i = 0;
function typing(){
    if(i < text.length){
        document.getElementById("typing").innerHTML += text.charAt(i);
        i++;
        setTimeout(typing, 80);
    }
}
typing();
</script>

</body>
</html>