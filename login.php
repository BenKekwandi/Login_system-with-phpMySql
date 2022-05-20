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
       //read the database
        $query="select * from users where user_name='$user_name'limit 1";
        $result=mysqli_query($con, $query);
        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $user_data=mysqli_fetch_assoc($result);
                if($user_data['password']===$password)
                {
                    $_SESSION['user_id']=$user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "wrong username or password!";
      
    }
    else{
        echo "Please enter some valid information!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<div id="box">
        <div style="font-size:20px;margin:10px;color:white">
        Login
        </div>
        <form method="post">
            <input type="text" id="text" name="user_name" placeholder="username"><br><br>
            <input type="password" id="text" name="password" placeholder="password"><br><br>
            <input type="submit" id="button" value="Login"><br><br>
            <a href="signup.php">Sign up</a>
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