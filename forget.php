<html>
    <head>
        <title>Forgot Password</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3"><img src="indriyalogo.png" alt="" width="100%" height="25%"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-head">Forgot Password</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="well">Don`t Worry. We are here to Serve you. Tell your mail address to us. We will send password to your mail.</p>
                </div>
            </div>
            <form action="forget.php" method="get">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">Enter Mail Address: </span>
                            <input type="mail" class="form-control" placeholder="Enter your Mail Address" name="mail" id="mail" required="required">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <input type="submit" class="btn btn-success" name="mailcheck" id="mailcheck" value="Check">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12"><p><?php
                            $con=mysqli_connect("localhost","indriyaadmin","tiger","indriya");
                            // Check connection
                            if (mysqli_connect_errno())
                            {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }

                            if(isset($_GET['mailcheck']))
                            {
                                $data=$_GET['mail'];
                                if(preg_match("/^\S+@\S+\.\S+$/","$data"))
                                {
                                    $sql="select cell,mailid from mainlogin where mailid='{$_GET['mail']}'";

                                    if ($result=mysqli_query($con,$sql))
                                    {
                                        // Fetch one and one row
                                        while ($row=mysqli_fetch_row($result))
                                        {
                                            $cellarr=str_split($row[0]);
                                            $s=sizeof($cellarr);
                                            $s--;
                                            for($i=3;$i<$s;$i++){
                                                $cellarr[$i]='*';
                                            }
                                            $newcell=implode("",$cellarr);
                                            echo'
                                            <div class="row"><form><input type="hidden" value="'.$_GET['mail'].'" name="cellmail"><div class="col-lg-6">Enter the cell number which starts with <strong>'.$newcell.'</strong><input class="form-control" type="text" name="cellnum" required placeholder="'.$newcell.'"></div><div class="col-lg-1"><br/><input class="form-control" type="submit" name="cellcheckbtn" value="Go"></div><form></div>';
                                        }
                                        // Free result set
                                        mysqli_free_result($result);
                                    }
                                    else {
                                        echo'<script>alert("The Mail Address you entered was not yet Registered. Go Back to Register.")</script>';
                                    }

                                    mysqli_close($con);
                                }
                                else
                                    echo'<script>alert("Please enter a Valid Mail Address")</script>';
                            }

                            if(isset($_GET['cellcheckbtn']))
                            {
                                //Array ( [cellmail] => cand2@gmail.com [cellnum] => [cellcheckbtn] => Go )
                                $sql="select userid,type,cell,mailid from mainlogin where mailid='{$_GET['cellmail']}' and cell='{$_GET['cellnum']}'";

                                if ($result=mysqli_query($con,$sql))
                                {
                                    // Fetch one and one row
                                    while ($row=mysqli_fetch_row($result))
                                    {
                                        $sql="select fullname from ".$row[1]."table where ".$row[1]."id='{$row[0]}'";
                                        $nameres=mysqli_query($con,$sql);
                                        $nameresult=mysqli_fetch_row($nameres);

                                        $newpass=uniqid(rand(100000,9999999));
                                        $pass=md5($newpass);
                                        $usql="UPDATE `mainlogin` SET `password` = '{$pass}' where mailid = '{$_GET['cellmail']}' and cell='{$_GET['cellnum']}'";

                                        if($upres=mysqli_query($con,$usql))
                                        {
                                            $to = $_GET['cellmail'];
                                            $subject = "Forget Password on Indriya.online";

                                            $message = "
                                            <html>
                                            <head>
                                            <title>Forgot Password</title>
                                            </head>
                                            <body>
                                            <p>Hai '{$nameresult[0]}'.</p>
                                            <div class='container'>
                                            <div class='row'>
                                            <div class='col-lg-8'>
                                            Mail Address: <span style='color: red'> '{$to}' </span>
                                            </div>
                                            </div>
                                            <div class='row'>
                                            <div class='col-lg-8'>
                                            New Password: <span style='color: red'> '{$newpass}' </span>
                                            </div>
                                            </div>

                                            <div class='row'>
                                            <div class='col-lg-8'>
                                            <p>Indriya. All rights reserved</p>
                                            </div>
                                            </div>

                                            </div>
                                            </body>
                                            </html>
                                            ";

                                            // Always set content-type when sending HTML email
                                            $headers = "MIME-Version: 1.0" . "\r\n";
                                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                            // More headers
                                            $headers .= 'From: <admin@indriya.online>' . "\r\n";
                                            $headers .= 'Cc: admin@indriya.online' . "\r\n";

                                            $status=mail($to,$subject,$message,$headers);

                                            if($status)
                                                echo "We had Changed your password <strong>'{$nameresult[0]}'</strong>. Please check your mail: '{$_GET['mail']}'";
                                            else
                                                echo "Fuck";
                                        }
                                        else {
                                            echo'<script>alert("Sorry Something Went Wrong. Please Try Again or Come back Some Time later.")</script>';
                                        }


                                    }
                                }
                            }


                        ?>
                    </p></div>
            </div>
        </div>
    </body>
</html>