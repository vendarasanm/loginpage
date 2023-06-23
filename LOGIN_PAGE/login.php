<?php
session_start();

include('database.php');

if (isset($_SESSION['user_id'])) {
    
    header('Location: session.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['user'];
    $password = $_POST['pass'];

    
    $query = mysqli_query($con, "SELECT name, password FROM login_table WHERE name='" . $username . "' AND password='" . $password . "'");
    $numrows = mysqli_num_rows($query);

    if ($numrows > 0) {
        $_SESSION['user_id'] = $username;
        header('Location: session.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script language="javascript" type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function(){ null; }
    </script>
</head>
<body>
    <center>
        <h1>LOGIN FORM</h1>
    </center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        Username: <input type="text" name="user"><br />
        Password: <input type="password" name="pass"><br />
        <input type="submit" value="Submit" name="submit" />
        
    </form>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>
