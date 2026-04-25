<?php
include 'db.php';
$result = $conn->query("SELECT * FROM schedule");
?>

<!DOCTYPE html>
<html>
<head>
<title>Schedule</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
<h3>Workout Schedule</h3>

<table class="table table-striped table-bordered shadow">
<tr>
<th>Workout</th>
<th>Day</th>
<th>Time</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
    echo "<tr>
    <td>{$row['workout_name']}</td>
    <td>{$row['day_of_week']}</td>
    <td>{$row['time']}</td>
    </tr>";
}
?>

</table>
</div>

</body>
</html>