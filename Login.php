
<?php

$Con = mysqli_connect("localhost", "root", "", "samadhi");

    session_start();

    if(isset($_POST['submit'])){
        $uname = mysqli_real_escape_string($Con,$_POST['name']);
        $pass = mysqli_real_escape_string($Con,$_POST['password']);
        $get_admin = "select * from staff where username='$uname' AND password='$pass'";
        $run_admin = mysqli_query($Con,$get_admin);
        $count = mysqli_num_rows($run_admin);

        if($count==1){
            $_SESSION['username']=$uname;
            echo "<script>alert('You are Logged in into system ')</script>";
            echo "<script>window.open('main.php?main','_self')</script>";
        }
        else {
            echo "<script>alert('Username or Password is Wrong')</script>";
            echo "<script>window.open('Login.php?main','_self')</script>";
        }
    }

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Login.css">
	<title>Login</title>
</head>
<body  class="bgimage">  

    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" id="loginform">
    <header id="heading">Login</header>   
    <hr></hr>
        <div id="container">
            <label for="name">Name</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="text" id="name" name="name" >
            <br><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <hr></hr>
            <input type="submit" name="submit"  id="submit" value="Login">
           
            
        </div>

    </form>

</body>
</html>