<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin_id'])){ header("Location: admin_login.php"); exit; }

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM equipment WHERE id=$id");
$eq = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $conn->query("UPDATE equipment SET name='$name', quantity='$quantity', status='$status' WHERE id=$id");
    header("Location: view_equipment.php");
}
?>

<h2>Edit Equipment</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $eq['name']; ?>" required><br><br>
    Quantity: <input type="number" name="quantity" value="<?php echo $eq['quantity']; ?>" required><br><br>
    Status:
    <select name="status">
        <option <?php if($eq['status']=='Available') echo "selected"; ?>>Available</option>
        <option <?php if($eq['status']=='Not Available') echo "selected"; ?>>Not Available</option>
    </select><br><br>
    <input type="submit" name="update" value="Update Equipment">
</form>
<a href="view_equipment.php">Back to Equipment</a>