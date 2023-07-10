<?php include('partials/menu.php'); ?>

    <!--Menu content section starts-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage admin</h1>

            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//Displaying session message
                    unset($_SESSION['add']);//Removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change']);
                }

            ?>
            <br><br><br>
            <!--Button to add Admin-->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <br /><br />

            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <?php
                //query to get all admin
                $sql = "SELECT * FROM tbl_admin";
                //execute the query
                $res = mysqli_query($conn, $sql);

                //check whether the quarry is executed of not
                if($res==TRUE)
                {
                    //count rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res);//function to get all the rows in database

                    $sn=1;//Create a variable and assign the value

                    //check the num of rows
                    if($count>0)
                    {

                        //we have data in database
                        while($rows = mysqli_fetch_assoc($res))
                        {
                            //using while loop to get all the data from the database
                            //and while loop will run as long as we have data in database

                            //get individual data
                            $id =$rows['id'];
                            $full_name =$rows['full_name'];
                            $username=$rows['username'];

                            //display the values in our table
                            ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

                        <?php
                        }
                    }
                }
                else
                {
                    //we do not have any data in database      
                }
                ?>


            </table>
            
        </div>
    </div>
    <!--Menu content end -->

<?php include('partials/footer.php'); ?>