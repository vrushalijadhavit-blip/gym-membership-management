<?php
include 'db.php';

$result = $conn->query("
SELECT feedback.*, users.name 
FROM feedback 
JOIN users ON feedback.user_id = users.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>

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

/* overlay */
.overlay{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.65);
}

/* main box */
.box{
    position:relative;
    z-index:1;

    width:90%;
    max-width:900px;

    padding:25px;
    border-radius:15px;

    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(15px);

    color:white;
    text-align:center;

    animation:fadeIn 1s ease;
}

/* title */
h3{
    font-weight:bold;
    color:white;
}

/* table */
.table{
    margin-top:20px;
}

/* 🔥 HEADER WHITE */
.table th{
    color:white !important;
    background:rgba(0,0,0,0.5);
}

/* 🔥 USER DATA BLACK */
.table td{
    color:black !important;
    background:rgba(255,255,255,0.7);
    font-weight:500;
}

/* hover */
.table tbody tr:hover{
    background:rgba(255,255,255,0.2);
    transition:0.3s;
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

    background: linear-gradient(45deg, #00c6ff, #0072ff, #ff4b2b);
    background-size:300% 300%;

    transition:0.4s;
}

.back-btn:hover{
    background-position:right;
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

<div class="box">

    <h3>💬 User Feedback</h3>

    <table class="table table-bordered table-hover text-center">

        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Feedback</th>
        </tr>

        <?php
        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['message']}</td>
            </tr>";
        }
        ?>

    </table>

    <a href="admin_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>