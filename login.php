<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script 
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script 
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
<body>
<section id="login">
        <div class="container">
        <h1>Log In</h1>
        <div class="row">
        <div class="col-md-4">
        <form class="contact-form" method="post">
             <div class="form-group">
            <input type="email" class="form-control" placeholder="Email Id" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="password" name="password" required>
            </div>

            <table>
                <tr>
            <td><button type="submit" class="btn btn-primary" name="submit">Sign IN</button> </td>
            <td><a class="nav-link" href="/webProject/#register">New User? Sign up here !</a></td>
                </tr>
            </table>
            </form>
        </div>
        </div>
        </div>
        </div>
    </section>
</body>
</html>
<?php
    if(isset($_POST['submit'])){ 
        $conn=mysqli_connect("localhost","root","","webProject")or die("Database Error"); //creating connection wirh database

        $pass=mysqli_real_escape_string($conn, $_POST['password']); //taking values from form
        $email=mysqli_real_escape_string($conn, $_POST['email']);

        $query="select * from registeredusers where password='$pass' AND email='$email'";
       // $query=mysqli_query($conn,$sql);


        $result = mysqli_query($conn,$query) or die(mysql_error()); //executing query
        $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['email'] = $email;                         // SESsION
            // Redirect user to index.php
         echo "<h4>Username and password matched !You are logged in</h4>";
         }else{
        echo "<div class='form'>
        <h4>Username/password is incorrect.</h4>";
         }
        
        } 
?>
