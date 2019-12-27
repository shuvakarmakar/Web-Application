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
<section id="register">
            <div class="container">
            <h1>Register</h1>
            <div class="row">
            <div class="col-md-4">
            <form class="contact-form" method="post">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                </div>
                 <div class="form-group">
                <input type="number" class="form-control" placeholder="Phone Number" name="phoneNumber" required>
                </div>
                 <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Id" name="email" required>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm password" name="re_password" required>
                </div>
    
    
                <table>
                    <tr>
                <td><button type="submit" class="btn btn-primary" name="submit" >Register</button> </td>
                <td><a class="nav-link" href="login.php">Already a member ?</a></td>
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
        $conn=mysqli_connect("localhost","root","","webProject")or die("Database Error");

        $name=mysqli_real_escape_string($conn, $_POST['name']);
        $pn=mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $pass=mysqli_real_escape_string($conn, $_POST['password']);
        $re_pass=mysqli_real_escape_string($conn, $_POST['re_password']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
 
        if($pass!=$re_pass){
            echo ' Your Password Does Not Match.';
        }
        else{
            echo ' Your Password  Match.';
            echo $name,$pn,$pass,$email;
        

        $sql="INSERT INTO registeredusers(name,pn,email,password) VALUES('$name','$pn','$email','$pass')";
        $query=mysqli_query($conn,$sql);
        
        if($query){
           header('Location: login.php'); 
        }
        
         }
                
                  
        }
?>
