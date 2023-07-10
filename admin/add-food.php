<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the food">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                                //create php code to display categories from database
                                //1. create sql to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                //Execute query
                                $res = mysqli_query($conn, $sql);

                                //count rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //if count is greater than zero, we have categories else we do not have categories
                                if($count>0)
                                {
                                    //we have categories
                                    while($row =mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    // we do not have categories
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }

                                //2. display on dropdown
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php

                //check whether the button is clicked or not
                if(isset($_POST['submit']))
                {
                    //add the food in database
                    //echo "clicked";

                    //1. Get the data from form
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];

                    //check whether radio button for featured and active are checked or not
                    if(isset($_POST['featured']))
                    {
                        $featured = $_POST['featured'];
                    }
                    else
                    {
                        $featured = "No"; // setting the default value
                    }

                    if(isset($_POST['active']))
                    {
                        $active = $_POST['active'];
                    }
                    else
                    {
                        $active = "No"; // setting the default value
                    }

                    //2. Upload the image if selected
                    //check whether the select image is clicked or not and upload the image only if the image is selected
                    if(isset($_FILES['image']['name']))
                    {
                        // get the details of the selected image
                        $image_name = $_FILES['image']['name'];

                        //check whether the image is selected or not and upload image only if selected
                        if($image_name!="")
                        {
                            // image is selected
                            //A. rename the image
                            //get the extension of selected the image (jpg, png, gif, etc.) "Muh-syafir.jpg" Muh-syafir jpg
                            // $ext = end(explode(',',$image_name));
                            $ext = explode('.', $image_name);
                            $ext = strtolower(end($ext));
                            

                            //Create new name for image
                            $image_name = "Food-Name-".rand(0000,9999).".".$ext;   // New Image name mayy be "Food-Name-657.jpg"

                            //B. Upload the image
                            //Get the src path and Destination path

                            //Source path is the current location of the image
                            $src = $_FILES['image']['tmp_name'];

                            //Destination path for the image to be uploaded
                            $dst = "../images/food/".$image_name;

                            //Finallt uploaded the food image
                            $upload = move_uploaded_file($src, "../images/food/".$image_name);

                            //check whether image uploaded or not
                            if(!$upload)
                            {
                                //Failed to upload the image
                                //redirect to add food page with error message
                                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                                header('location:'.SITEURL.'admin/add-food.php');
                                //stop the procces
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = "";//setting default value as blank
                    }

                    //3. Insert into database
                    
                    //Create a sql query to save or add food
                    //For Numerical we do not need to pass value inside quotes '' but for string value it is compulsory to add quotes '' 
                    $sql2 = "INSERT INTO tbl_food 
                    VALUES(null, 
                    '$title',
                    '$description',
                    $price,
                    '$image_name',
                    $category,
                    '$featured',
                    '$active')";

                        //execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        //check whether data inserted or not
                        //4. redirect with message to menage food page
                        if($res2 == true)
                        {
                            //DATA inserted successfully
                            $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                        }
                        else
                        {
                            //failed to insert data
                            $_SESSION['add'] = "<div class='errpr'>Failed to add food</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                        }
                    
                }
        ?>
    </div>
</div>

<?php include ('partials/footer.php'); ?>