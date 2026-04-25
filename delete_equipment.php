<?php
include 'db.php';
session_start();
if(!isset($_SESSION['admin_id'])){ header("Location: admin_login.php"); exit; }

$id = $_GET['id'];
$conn->query("DELETE FROM equipment WHERE id=$id");
header("Location: view_equipment.php");
?>