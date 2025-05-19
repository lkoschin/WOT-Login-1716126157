<?php

session_start();

// Replace with your actual application ID
$app_id = "YOUR_APPLICATION_ID";
$redirect_uri = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$login_url = "https://api.worldoftanks.eu/wot/auth/login/?application_id=" . $app_id . "&redirect_uri=" . urlencode($redirect_uri);

if (isset($_GET['status']) && $_GET['status'] == 'ok') {
    // User has successfully logged in
    $account_id = $_GET['account_id'];
    $nickname = $_GET['nickname'];
    $_SESSION['account_id'] = $account_id;
    $_SESSION['nickname'] = $nickname;

    echo "Welcome, " . $nickname . "! Your account ID is " . $account_id . ".";
    echo "<br><a href='logout.php'>Logout</a>";
} else {
    // Display login button
    echo "<a href='" . $login_url . "'>Login with World of Tanks</a>";
}

?>
