<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Demo Sanitse and save</title>
    <?php
        $username = $_POST['username'];
        $newstr = filter_var($username, FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $hashedpw = sha1($password);
        $db = "newuserdata";
        $server = "localhost";
        $user = "root";
        $pword= "";
        $conn = new mysqli($server,$user,$pword,$db);
        if($conn->connect_errno){
            echo "Connection Failed";
            exit();
        }
        $sql = "insert into users (username,password) values ('" .$newstr. "','" .$hashedpw. "');";
        echo $sql;
        $conn->close();
    ?>
</head>
<body>
    <form method="post" action="index.html">
        
        <input type="submit" value="Return" />
    </form>
</body>
</html>