<?php
include('db_conn.php');
session_start();
$user_check = $_SESSION['email'];

$sql = mysqli_query($conn, "SELECT * FROM guest WHERE email='$user_check' ");

$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$session_uin = $row['uin'];
$session_fullname = $row['fullname'];
$session_email = $row['email'];
$session_phone = $row['phone'];
$session_passport = $row['passport'];
$session_designation = $row['designation'];

if (!isset($user_check)) {
    header("Location:../index.php");
}
