<?php
include "header.php";
?>

<div class="container">
<h5 class="mb-2 text-gray-800">Health Category</h5>
<div class="row">
    <div class="col-xl-12 col-lg-5">
        <div class="card">
            <div class="card-header">
            <h6 class="font-weight-bold text-primary mt-2">Add category</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                <div class="mb-3">
                <input type="text" name="cat_name" placeholder="category name" class="form_control" required> 
                </div> 
           
                <div class="mb-3">
                <input type="submit" name="add_cat"  class="btn btn-primary" value="Add">
                <a href="category.php" class="btn btn-secondary">Back</a>
                </div>
                </form>
            </div>  
        </div>
    </div>
</div>

<?php
include "footer.php";

if(isset($_POST['add_cat'])){
    $cat_name=mysqli_real_escape_string($config,$_POST['cat_name']);
    echo $cat_name;
    $sql="SELECT * FROM categories WHERE cat_name='{$cat_name}'";
    $query=mysqli_query($config,$sql);
    $row=mysqli_num_rows($query);
    if($row){
        $msg=['category name already exist','alert-danger'];
        $_SESSION['msg']=$msg;
        header("location:add_cat.php");


    }
    else{
        $sql2="INSERT INTO categories  (cat_name) VALUES('$cat_name')";
        $query2=mysqli_query($config,$sql2);
        if($query2){
            $msg=['category has been added successfully','alert-success'];
            $_SESSION['msg']=$msg;
            header("location:add_cat.php");
        }
        else{
            $msg=['failed.. please try again','alert-danger'];
            $_SESSION['msg']=$msg;
            header("location:add_cat.php");
        }
    }
}




?>