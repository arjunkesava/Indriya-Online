<?php
    $con=mysqli_connect("localhost","indriyaadmin","tiger","indriya");
    // Check connection
    if (mysqli_connect_errno())
        die("Failed to connect to MySQL: " . mysqli_connect_error());

    if($con)
        if (isset($_COOKIE['type']))
        {
            $userid=$_COOKIE['userid'];
            $utype=$_COOKIE['type'];
            $pass=$_COOKIE['password'];
            
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


            $check=mysqli_query($con,"SELECT password FROM mainlogin WHERE userid = '$userid' and type= '$utype'") or die(mysql_error());

            while ($info=mysqli_fetch_row($check))
            {
                //if the cookie has the wrong password, they are taken to the login page 
                if ($pass != $info[0])
                {
                    header ("Location: logout.php");
                }

            }

        }
    else
            header ("Location: logout.php");


?>