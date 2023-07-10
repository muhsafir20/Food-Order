<?php
    //include constants.php for SITEURL
    include('../admin/partials/constants.php');
    //1. Destroy the session
    session_destroy();

    //2. Redirect to login page
    header('Location:'.SITEURL.'admin/login.php');

?>
