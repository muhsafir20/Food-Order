<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Food</h1>

    <br /><br />

            <!--Button to add Admin-->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

            <br /><br /><br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorize']))
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }
            ?>

            <table class="tbl-full">
                <tr>
                    <th width="5%">S.N</th>
                    <th width="10%">Title</th>
                    <th width="15%">Price</th>
                    <th>Image</th>
                    <th width="8%">Featured</th>
                    <th width="8%">Active</th>
                    <th>Action</th>
                </tr>

                <?php
                    //Create a sql query to get all the food
                    $sql = "SELECT * FROM tbl_food";

                    //Execute the query
                    $res = mysqli_query($conn,$sql);

                    //Count rows to check whether we have food or not
                    $count = mysqli_num_rows($res);

                    //Create serial number variable and set default value as 1
                    $sn=1;

                    if($count>0)
                    {
                        // we have food in the database
                        // get the foods from database and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the value from induvidual colums
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $description = $row['description'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>Rp. <?php echo number_format($price); ?></td>
                                        <td>
                                            <?php 
                                                //check whether we have image or not
                                                if($image_name=="")
                                                {
                                                    // we do not have image, display error message
                                                    echo "<div class='error'>Image Not Added.</div>";
                                                }
                                                else
                                                {
                                                    // we have image, display image
                                                    ?>
                                                    <img width="20%" src="<?php echo SITEURL; ?>Images/food/<?php echo $image_name; ?>">
                                                    <?php
                                                }
                                            
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                        </td>
                                    </tr>

                            <?php

                        }
                    }
                    else
                    {
                        // food not added in database
                        echo "<tr> <td colspan='7' class='error'> Food not Added Yet </td></tr>";
                    }
                ?>


            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>