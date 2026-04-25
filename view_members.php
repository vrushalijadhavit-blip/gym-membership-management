<?php
include 'db.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
<title>Members</title>

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

    width:85%;
    max-width:900px;

    padding:25px;
    border-radius:15px;

    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(15px);

    color:white;
    text-align:center;

    animation:fadeIn 1s ease;
}

/* table */
.table{
    color:white;
    margin-top:20px;
}

/* header */
h2{
    background: linear-gradient(45deg, #ff4b2b, #ff416c, #1fa2ff);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
    font-weight:bold;
}

/* table row hover */
.table tbody tr:hover{
    background:rgba(255,255,255,0.1);
    transition:0.3s;
}

/* back button */
.back-btn{
    margin-top:20px;
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

<div class="box">

    <h2>🏋️ Gym Members List</h2>

    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <?php } ?>
        </tbody>

    </table>

    <!-- BACK BUTTON -->
    <a href="admin_dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>