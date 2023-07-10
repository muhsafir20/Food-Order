<?php include('partials/menu.php'); ?>

<div class="main-content">  
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php
                if(isset($_SESSION['add']))//checking whether the session is set of not
                {
                    echo $_SESSION['add'];//Displaying session message if set
                    unset($_SESSION['add']);//Removing session message
                }
            ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Full Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>



<?php include('partials/footer.php'); ?>

<?php
    // Process the value from form and save it in database

    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
    //button clicked
    //echo "Button Clicked";

    //1.get the data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);//Password encryption with MD5

    //2. SQL query to save the data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
        ";

        //3. excuting query and saving data into database
        $res = mysqli_query($conn,$sql) or die (mysql_error());

        //4. check whether the (query is excuted) data is inserted or not and display appropriate message
        if ($res==TRUE)
        {
            //data inserted
            echo "<script>Alert('Data succesfully inserted')</script>";
            //Create a session variable to display message
            $_SESSION['add'] = "Admin added succesfully";
            //redirect page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failed to insert data
            echo "<script>Alert('Failed to insert data')</script>";
            //Create a session variable to display message
            $_SESSION['add'] = "Failed to add admin";
            //redirect page to add admin
            header("location:".SITEURL.'admin/add-admin.php');
            
        }

    } 
?>