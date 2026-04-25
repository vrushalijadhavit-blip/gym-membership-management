<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership_type = $_POST['membership_type'];
    $join_date = $_POST['join_date'];

    $conn->query("UPDATE users SET 
        name='$name', 
        email='$email', 
        phone='$phone', 
        membership_type='$membership_type', 
        join_date='$join_date' 
        WHERE id=$id");

    header("Location: view_members.php");
}
?>

<h2>Edit Member</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
    Phone: <input type="text" name="phone" value="<?php echo $user['phone']; ?>"><br><br>
    Membership Type: 
    <select name="membership_type">
        <option <?php if($user['membership_type']=='Monthly') echo "selected"; ?>>Monthly</option>
        <option <?php if($user['membership_type']=='Quarterly') echo "selected"; ?>>Quarterly</option>
        <option <?php if($user['membership_type']=='Yearly') echo "selected"; ?>>Yearly</option>
    </select><br><br>
    Join Date: <input type="date" name="join_date" value="<?php echo $user['join_date']; ?>" required><br><br>
    <input type="submit" name="update" value="Update Member">
</form>
<a href="view_members.php">Back to Members</a>