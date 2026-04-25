<!DOCTYPE html>
<html>
<head>
    <title>Gym Management System</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('gym.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            font-family: Arial;
            animation: zoomEffect 6s infinite alternate ease-in-out;
        }

        /* Zoom Background */
        @keyframes zoomEffect {
            0% { background-size: 100%; }
            100% { background-size: 115%; }
        }

        /* Dark Overlay */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            z-index: 1;
        }

        /* Main Box */
        .main-box {
            position: relative;
            z-index: 2;
            max-width: 450px;
            margin: auto;
            margin-top: 120px;
            padding: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 20px;
            box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
            text-align: center;
            color: white;
        }

        h1 {
            font-weight: bold;
        }

        /* 🔄 Rotating Logo */
        .fa-dumbbell {
            display: inline-block;
            animation: spin 3s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Buttons */
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            border-radius: 10px;
        }

        .btn-admin {
            background-color: #007bff;
            color: white;
        }

        .btn-user {
            background-color: #28a745;
            color: white;
        }

        .btn:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }

        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            color: white;
            padding: 10px;
            z-index: 2;
        }
    </style>
</head>

<body>

<div class="main-box">

    <h1><i class="fas fa-dumbbell"></i> Gym System</h1>
    <p> Welcome 🤗 ! Choose your login👉 </p>

    <a href="admin_login.php" class="btn btn-admin btn-custom mb-3">
        <i class="fas fa-user-shield"></i> Admin Login
    </a>

    <a href="user_login.php" class="btn btn-user btn-custom">
        <i class="fas fa-user"></i> User Login
    </a>

</div>

<footer>
    © 2026 Gym System 💪| Design By Vrushali Jadhav 😍
</footer>

</body>
</html>