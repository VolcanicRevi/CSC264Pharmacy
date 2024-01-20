<?php
   
    session_start();
    include_once 'connPatient.php';

    function set_message($msg){

        if(!empty($msg))
        {

            [$_SESSION('msg') = $msg];

        }
        else
        {

            $msg = "";
        }
    }

    function display_message()
    {
        if(isset($_SESSION['msg']))
        {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }

    function user_login()
    {
        global $conn;
        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);

    }

?>