<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: ../auth/login.php");
    exit();

}

include "../includes/header.php";
include "../includes/navbar.php";

?>

<div class="container" style="padding:100px 0;">

    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h1>

    <p>You are logged in as a Customer.</p>

</div>

<?php include "../includes/footer.php"; ?>