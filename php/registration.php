<?php

function register(string $un, string $pw, mysqli $connection){
    $result = mysqli_query($connection,"select * from userdata where username = '$un'");
    $num = mysqli_num_rows($result); //returns the number of rows that exist with the given username
    
    //checks if the username is already taken if not then registers the creds
    if($num > 0){
        echo ("<script> alert('Username already taken')
                window.location.href='../html/login.html';
                </script>"); //js script to alert and redirect to login page
    }else{
        mysqli_query($connection,"insert into userdata(username, password) values('$un', '$pw')");

        echo ("<script> alert('Registration Successful!')
                window.location.href='../html/login.html';
                </script>"); //js script to alert and redirect to login page
    }
}

function validation(string $un, string $pw, mysqli $connection){
    $result = mysqli_query($connection,"select * from userdata where username = '$un' && password = '$pw'");
    $num = mysqli_num_rows($result); //returns the number of rows that exist with the given username

    if($num > 0){
        echo ("<script> alert('Login Successful!')
                window.location.href='../html/main.html';
                </script>"); //js script to alert and redirect to main page
    }else{
        echo ("<script> alert('Invalid username or password')
        window.location.href='../html/login.html';
        </script>"); //js script to alert and redirect to login page
    }
}

session_start();

$con = mysqli_connect("localhost","root");

mysqli_select_db($con,"userlogin");


if(isset($_POST['username'])){
    $name=$_POST['username'];
}else{
    $name=NULL;
}

if(isset($_POST['password'])){
    $pass=$_POST['password'];
}else{
    $pass=NULL;}


if (isset($_POST["registorButton"])){
    register($name,$pass,$con);
}elseif(isset($_POST["loginButton"])){
    validation($name,$pass,$con);
}

?>