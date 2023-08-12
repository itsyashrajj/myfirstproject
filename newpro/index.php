<?php
if(isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","","students");
    $user=$_POST['user'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $incpass=md5($password);
    $sql="SELECT * FROM studentdata WHERE email= '{$email}'";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row=mysqli_fetch_assoc($res);
        $pass=$row['password'];
        if($pass===$incpass){
            session_start();
            $_SESSION['user']=$row['username'];
            header("location://localhost/register/home.php");
            {
                
            }
            
        }else{
            echo "<div class='alert alert-danger'>Invalid password !!</div>"; 
        }
    }else{
        echo "<div class='alert alert-danger'>Invalid email !!</div>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            background: url("back.jpg");
            background-size:cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
			background-size: 100% 100%;
            color:snow;
        }
        .container{
            margin-top:60px;
            width:80%;
        }
        form{
            padding:15px;
            background:#303952;
            box-shadow: 20px 30px 0px #130f40, -20px 30px 0px #130f40;
        }
        
    </style>
    <script src="https://kit.fontawesome.com/c13aa8743f.js" crossorigin="anonymous"></script>
</head>
<body>
    
          <div>
          <img class="img-fluid" src="https://www.lms.holkar.org/images/holkar_logo.png?id=17" alt="">
          </div>
    
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h1 class="text-center"><i class="fa-solid fa-user fa-sm"></i> Login</h1>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group my-2" >
                        <input type="submit" name="submit" class="form-control btn btn-success" value="login">
                    </div>
                    <div class="form-group my-2" >
                       Not have a Account? <span><a href="register.php">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>