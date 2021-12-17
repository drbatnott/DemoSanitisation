<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Demo Sanitse and save</title>
    <?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashedpw = sha1($password);
        $db = "newuserdata";
        $server = "localhost";
        $user = "root";
        $pword= "";
        $conn = mysqli_connect($server,$user,$pword,$db);
        if(mysqli_connect_errno()){
            echo "Connection Failed: " . mysqli_connect_error;
            exit();
        }
        //$newstr = filter_var($username, FILTER_SANITIZE_STRING);
        $newstr = mysqli_real_escape_string($conn,$_POST['username']);
       
        //$sql = "insert into users (username,password) values ('" .$newstr. "','" .$hashedpw. "');";
        $sql = "select * from users;";
        echo $sql. "<br/>";
        if (($result = mysqli_query($conn,$sql))) {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "Row is: " . $row['userName'] ."<br/>";
            }
        }
        else{
            echo "Here is " .mysqli_affected_rows($conn). "<br/>" ;
        }
        mysqli_close($conn);
    ?>
</head>
<body>
    <form method="post" action="index.html">
        
        <input type="submit" value="Return" />
    </form>
</body>
</html>