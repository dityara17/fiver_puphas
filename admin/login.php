<?php include '../config/MainClass.php';

?>
<?php if (isset($_POST['do'])) {
    $to = $use->login($_POST['u'],$_POST['pw']);
    if ($to == 0) {
        ?>
        <script type="text/javascript">alert('Undefined user')</script>
        <meta http-equiv="refresh" content="0; ./login.php">
    <?php } else {
        header("Location: ./");
    }
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php //print_r($to); ?>
<form method="post" action="">
    <div class="kotak">
        <h3>Admin Login</h3>
        <label>Username</label>
        <p><input type="text" name="u"></p><br>
        <hr>
        <label>Password</label>
        <p><input type="Password" name="pw"></p><br>
        <button type="submit" name="do">Login</button>
        <hr>
    </div>
</form>
</body>
</html>