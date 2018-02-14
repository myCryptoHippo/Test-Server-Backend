<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
require '../../db.php';
session_start();

if ( $_SESSION['logged_in'] != 1 ) {
  header("location: ../../login.php");    
}
// Set session variables to be used on profile.php page
else {
    // Makes it easier to read
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];

}

$amount = $_POST['amount'];
$value  = $_POST['value'];
$value = 1000;
$coin = $_POST['coin'];

$usd = $mysqli->query("SELECT USD FROM users WHERE username='$username'");
$btc = $mysqli->query("SELECT BTC FROM users WHERE username='$username'");


$balance = $usd - ($amount * $value);
$newAmount = $amount + $btc;

$sql = "UPDATE users SET BTC= '$newAmount', USD = '$balance' WHERE username='$username'";

if ( $mysqli->query($sql) ) {

$_SESSION['message'] = "Your balance has been updated successfully!";
header("location: ../../error.php");    

}

?>
