<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {
    
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Next Page</title>
</head>
<body>
    <h1>Welcome VENDARASAN!</h1>
    
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="hidden" name="logout" value="true">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
