<?php
    //include constants page
    include('../admin/partials/constants.php'); 

    //echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name']))//either use '&&' or 'AND'
    {
        //proccess to delete
        //echo "Proccess to delete";

        //1. get the id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. remove the image if available
        //check whether the image is available or not and delete only if available
        if($image_name != "")
        {
            //IT has image and need to remove from folder
            //get the image path
            $path = "../images/food/".$image_name;

            //remove the image file from folder
            $remove = unlink($path);

            //check whether the image is remove or not
            if($remove==false)
            {
                //Failed to remove the image
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File</div>";
                //redirect to menage food   
                header('location:'.SITEURL.'admin/manage-food.php');    
                //stop the proccess of deleting food
                die();
            }
        }
        //3. Delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute the quary
        $res = mysqli_query($conn, $sql);

        //check whether the query executed
        //4. Redirect to manage food with session message
        if($res==true)
        {
            //food deleted
            $_SESSION['delete'] = "<div class='success'>Food Delete Successfully.</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food.</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        //redirect to menage food page
        //echo "Redirect";
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.');
    }

?>