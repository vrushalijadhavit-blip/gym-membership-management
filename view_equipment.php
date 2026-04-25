<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit;
}

$result = $conn->query("SELECT * FROM equipment");
?>

<h2>All Equipment</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['status']."</td>
                <td>
                    <a href='edit_equipment.php?id=".$row['id']."'>Edit</a> | 
                    <a href='delete_equipment.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No equipment found</td></tr>";
    }
    ?>
</table>
<a href="admin_dashboard.php">Back to Dashboard</a>