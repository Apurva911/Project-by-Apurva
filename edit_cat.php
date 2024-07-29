<?php
include "header.php";
$id=$_GET['id'];
$sql="SELECT * FROM categories WHERE cat_id='$id'";
$query=mysqli_query($config,$sql);
$row=mysqli_fetch_assoc($query);



?>

<div class="container">
<h5 class="mb-2 text-gray-800">Health Category</h5>
<div class="row">
    <div class="col-xl-6 col-lg-5">
        <div class="card">
            <div class="card-header">
            <h6 class="font-weight-bold text-primary mt-2">Edit category</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                <div class="mb-3">
                <input type="text" name="cat_name" placeholder="category name" class="form_control" required value="<?=$row['cat_name'];?>"> 
                </div> 
           
                <div class="mb-3">
                <input type="submit" name="update_cat"  class="btn btn-primary" value="Update">
                <a href="category.php" class="btn btn-secondary">Back</a>
                </div>
                </form>
            </div>  
        </div>
    </div>
</div>

<?php
include "footer.php";
if(isset($_POST['update_cat'])){
    $cat_name=mysqli_real_escape_string($config,$_POST['cat_name']);
    $sql2="UPDATE categories SET cat_name='$cat_name' WHERE cat_id='{$id}'";
    $update=mysqli_query($config,$sql2);
    if($update){
        $msg=['category has been updated successfully','alert-success'];
        $_SESSION['msg']=$msg;
        header("location:category.php");
    }
    else{
        $msg=['failed.. please try again','alert-danger'];
        $_SESSION['msg']=$msg;
        header("location:category.php");
    }

}

?>