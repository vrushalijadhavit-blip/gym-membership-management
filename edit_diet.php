<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin_id'])){ header("Location: admin_login.php"); exit; }

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM diet_plan WHERE id=$id");
$diet = $result->fetch_assoc();

if(isset($_POST['update'])){
    $plan_name = $_POST['plan_name'];
    $description = $_POST['description'];
    $conn->query("UPDATE diet_plan SET plan_name='$plan_name', description='$description' WHERE id=$id");
    header("Location: view_diet.php");
}
?>

<h2>Edit Diet Plan</h2>
<form method="post">
    Plan Name: <input type="text" name="plan_name" value="<?php echo $diet['plan_name']; ?>" required><br><br>
    Description: <textarea name="description" rows="5" cols="50" required><?php echo $diet['description']; ?></textarea><br><br>
    <input type="submit" name="update" value="Update Diet Plan">
</form>
<a href="view_diet.php">Back to Diet Plans</a>