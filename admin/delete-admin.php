<?php

    //Include constants.php file here
    include('../admin/partials/constants.php');

    //1. get the ID of admin to be deleted
    $id = $_GET['id'];

    //2. create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //Execute the quary
    $res = mysqli_query($conn, $sql);

    //Check whether the quary executed successfully or not
    if($res==true)
    {
        //QUERY EXECUTED SUCCESSFULLY AND ADMIN deleted
        //echo "Admin Deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted successfully.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to Deleted Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Please try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    
    //3. redirect to manage admin page with message (success/error)

?>