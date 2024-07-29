<?php
include 'config.php';
include 'header.php';
session_start();
 
?>

<div class="container">
    <div class="row">
        <div class="col-xl-5 col-md-4 m-auto p-5 mt-5 bg-info">
            <form action="" method="POST">
            <p class="text-center">HealthyLife!login your account.</p>
            <div class="mb-3">
                <input type="email" name="email" placeholder="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" placeholder="password" class="form-control" required>
            </div>
           
            <div class="mb-3">
                <input type="submit" name="login_btn"  class="btn btn-primary" value="login">
            </div>
            <?php 
            if(isset($_SESSION['error'])){
                $error=$_SESSION['error'];
                echo $error;
                unset($_SESSION['error']);
            }
            ?>
            </form>
        </div>
    </div>
</div>


<?php 

if(isset($_POST['login_btn']))
{
    $email=mysqli_real_escape_string($config,$_POST['email']);
    $pass=mysqli_real_escape_string($config,sha1($_POST['password']));
     
    $sql="SELECT * FROM user WHERE email='{$email}' AND password='{$pass}'";
    $query=mysqli_query($config,$sql);
    $data=mysqli_num_rows($query);
    if($data){
       $result=mysqli_fetch_assoc($query);
       $user_data=array($result['user_id'],$result['username'],$result['role']);
       $_SESSION['user_data']=$user_data;
       header("location:admin/index.php");
    }
    else{
            $_SESSION['error']="Invalid email/Password";
            header("location:login.php");
    }
    
} 
?>
