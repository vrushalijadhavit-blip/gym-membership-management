<?php
include 'db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO equipment (name, quantity) 
            VALUES ('$name', '$quantity')";

    if($conn->query($sql)){
        echo "<script>alert('Equipment Added Successfully!');</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Equipment</title>

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
    background:rgba(0,0,0,0.6);
}

/* card */
.card-box{
    position:relative;
    z-index:1;

    width:400px;
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

/* BUTTON STYLE (COLORFUL) */
.btn-custom{
    width:100%;
    border:none;
    border-radius:25px;

    padding:10px;
    font-weight:bold;
    color:white;

    background: linear-gradient(45deg, #ff416c, #ff4b2b, #1fa2ff);
    background-size:300% 300%;

    transition:0.4s;
}

.btn-custom:hover{
    background-position:right center;
    transform:scale(1.05);
}

/* back button */
.btn-back{
    margin-top:10px;
    display:inline-block;
    padding:8px 20px;
    border-radius:20px;

    text-decoration:none;
    color:white;

    background: linear-gradient(45deg, #00c6ff, #0072ff);
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

    <h2>🏋️ Add Equipment</h2>
    <p>Enter gym equipment details</p>

    <form method="post">

        <input type="text" name="name" class="form-control" placeholder="Equipment Name" required>

        <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>

        <input type="submit" name="submit" value="Add Equipment" class="btn-custom">

    </form>

    <a href="admin_dashboard.php" class="btn-back">⬅ Back</a>

</div>

</body>
</html>