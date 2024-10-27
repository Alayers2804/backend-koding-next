<?php
include("config.php");
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim(mysqli_real_escape_string($db, $_POST['username']));
    $password = trim(mysqli_real_escape_string($db, $_POST['password']));

    // Prepare the SQL statement
    $stmt = $db->prepare("SELECT `password` FROM `users` WHERE `users` = ? LIMIT 1;");
    $stmt->bind_param("s", $username);
    
    if ($stmt === false) {
        $error = "SQL statement preparation failed: " . $db->error;
    } else {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['login_user'] = $username;  // Set the session variable here
                header("location: student.php");       // Redirect to the protected page
                exit;
            }else {
                $error = "Your Login name or password is invalid";
            }
        } else {
            $error = "Your Login name or password is invalid";
        }
    }
}
?>

<html>
<head>
    <title>Login Page</title>
    <style type="text/css">
        body { font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
        label { font-weight: bold; width: 100px; font-size: 14px; }
        .box { border: #666666 solid 1px; }
    </style>
</head>
<body bgcolor="#FFFFFF">
    <div align="center">
        <div style="width:300px; border: solid 1px #333333;" align="left">
            <div style="background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style="margin:30px">
                <form action="" method="post">
                    <label>UserName :</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password :</label><input type="password" name="password" class="box" /><br /><br />
                    <input type="submit" value=" Submit " /><br />
                </form>
                <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
        </div>
    </div>
</body>
</html>
