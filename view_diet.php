<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin_id'])){ header("Location: admin_login.php"); exit; }

$result = $conn->query("SELECT * FROM diet_plan");
?>

<h2>All Diet Plans</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Plan Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    <?php
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['plan_name']."</td>
                <td>".$row['description']."</td>
                <td>
                    <a href='edit_diet.php?id=".$row['id']."'>Edit</a> | 
                    <a href='delete_diet.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No diet plans found</td></tr>";
    }
    ?>
</table>
<a href="admin_dashboard.php">Back to Dashboard</a>