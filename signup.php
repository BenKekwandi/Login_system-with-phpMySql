<?php
session_start();
include("connection.php");
include("functions.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $user_name=$_POST['user_name'];
    $password=$_POST['password'];
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        $user_id=random_num(20);
        $query="insert into users (user_id_,user_name,password) values ('$user_id','$user_name','$password')";
        mysqli_query($con, $query);
       header("location: login.php");
       die;
    }
    else{
        echo "Please enter some valid information!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
<div id="box">
        <div style="font-size:20px;margin:10px;color:white">
        Register
        </div>
        <form method="post">
            <input type="text" id="text" name="user_name" placeholder="username"><br><br>
            <input type="password" id="text" name="password" placeholder="password"><br><br>
            <input type="submit" id="button" value="Register"><br><br>
            <a href="login.php">Login</a>
        </form>
    </div>
    <style type="text/css">
        body{
            background-color: white;
        }
        form >a{
            text-decoration:none;
            color:white;
            font-weight: bold;
            font-family:Arial, Helvetica, sans-serif
        }
        form >a:hover{
            color:cyan;
            font-style:italic;
        }
        #text{
            height:25px;
            border-radius:5px;
            padding:4px;
            border:solid thin #aaa;
        }
        #button{
            padding:10px;
            width:200px;
            color:white;
            background-color:black;
            border:none;
        }
        #button:hover
        {
            padding-left:15px;
            background-color: lightblue;
            color:black;
            font-weight:bolder;
            font-style:italic;
            font-family:'Times New Roman', Times, serif;
        }
        #box{
            background-color: red;
            margin:auto;
            width:300px;
            padding:20px;
        }

    </style>
    
</body>
</html>