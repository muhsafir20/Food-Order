<?php 
    //Include Constants file
    include ('../admin/partials/constants.php');

    //echo "delete page";
    //check whether the id and image_name value is set or not 
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available
        if($image_name != "")
        {
            //Image is available. so remove it
            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);

            //if failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                //redirect to menage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }

        //Delete the data from the database
        //sql query to delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //execute query
        $res = mysqli_query($conn, $sql);

        //check whether the data is delete from database or not
        if($res==true)
        {
            //set success message and redirect
            $_SESSION['delete'] = "<div class = 'success'>Category Delete Successfully.</div>";
            //redirect to menage category
            header('Location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //set fail message and redirect
            $_SESSION['delete'] = "<div class = 'error'>Failed to Delete Category.</div>";
            //redirect to menage category
            header('Location:'.SITEURL.'admin/manage-category.php');
        }
        
    }
    else
    {
        //redirect to menage category page
        header('Location:'.SITEURL.'admin/manage-category.php');
    }

?>
 

