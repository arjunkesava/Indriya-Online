<?php
    error_reporting(1);
    if(isset($_POST['submit'])){

        $con=mysqli_connect("localhost","indriyaadmin","tiger","indriya");
        // Check connection
        if (mysqli_connect_errno())
            die("Failed to connect to MySQL: " . mysqli_connect_error());

        $md=md5($_POST['password']);
        $data=$_POST['username'];
        if(preg_match("/^\d{10}$/","$data"))            $utype="num";
        elseif(preg_match("/^\S+@\S+\.\S+$/","$data"))  $utype="mail";
        else                                            $status="fail";

        //if($_POST['rtype']=="parent")

        if($utype=="num")
            $sql="select userid,password,type from mainlogin where cell='{$data}'";
        if($utype=="mail")
            $sql="select userid,password,type from mainlogin where mailid='{$data}'";

        if ($result=mysqli_query($con,$sql))
        {
            // Fetch one and one row
            if ($row=mysqli_fetch_row($result))
            {
                //if(($row[0]==null) and ($row[1]==null) and ($row[2]==null)) echo '<script>alert("Invalid Details. Try Again");</script>';
                if($row[1]==$md)    // checks pass word.
                {
                    $sql="select accountaccess from candidatetable where candidateid='{$row[0]}'";
                    $res=mysqli_query($con,$sql);
                    $info=mysqli_fetch_array($res);
                    if($info['accountaccess']=="noaccess")
                        echo'<script>window.location.assign("pending.html")</script>';
                        
                    setcookie("userid",$row[0],time()+(86400*30),"/");
                    setcookie("password",$row[1],time()+(86400*30),"/");
                    setcookie("type",$row[2],time()+(86400*30),"/");
                    
                    
                    if(strtoupper($row[2])=="CANDIDATE")
                        echo'<script>window.location.assign("candidate.php")</script>';
                    if(strtoupper($row[2])=="RECRUITER")
                        echo'<script>window.location.assign("recruiter.php")</script>';

                }
                else
                    echo '<script>alert("Invalid Password. Try Again");</script>';

            }
            else
                echo '<script>alert("Invalid Mail Address. Try Again");</script>';
            // Free result set
            mysqli_free_result($result);
        }

        mysqli_close($con);
    }
    if($status=="fail")
        echo'<script>alert("Please enter a Valid Phone Number or Mail Address")</script>';
?>

<!--
password = zHa5nEZz3iPT admin="	indriyaadmin"
-->
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Indriya</title>


        <link rel="stylesheet" href="css/normalize.css">


        <style>
            /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

            @import url(http://fonts.googleapis.com/css?family=Open+Sans);
            .btn {
                display: inline-block;
                *display: inline;
                *zoom: 1;
                padding: 4px 10px 4px;
                margin-bottom: 0;
                font-size: 13px;
                line-height: 18px;
                color: #333333;
                text-align: center;
                text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
                vertical-align: middle;
                background-color: #f5f5f5;
                background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
                background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
                background-image: linear-gradient(top, #ffffff, #e6e6e6);
                background-repeat: repeat-x;
                filter: progid: dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0);
                border-color: #e6e6e6 #e6e6e6 #e6e6e6;
                border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
                border: 1px solid #e6e6e6;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
                cursor: pointer;
                *margin-left: .3em;
            }

            .btn:hover,
            .btn:active,
            .btn.active,
            .btn.disabled,
            .btn[disabled] {
                background-color: #e6e6e6;
            }

            .btn-large {
                padding: 9px 14px;
                font-size: 15px;
                line-height: normal;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            }

            .btn:hover {
                color: #333333;
                text-decoration: none;
                background-color: #e6e6e6;
                background-position: 0 -15px;
                -webkit-transition: background-position 0.1s linear;
                -moz-transition: background-position 0.1s linear;
                -ms-transition: background-position 0.1s linear;
                -o-transition: background-position 0.1s linear;
                transition: background-position 0.1s linear;
            }

            .btn-primary,
            .btn-primary:hover {
                text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
                color: #ffffff;
            }

            .btn-primary.active {
                color: rgba(255, 255, 255, 0.75);
            }

            .btn-primary {
                background-color: #4a77d4;
                background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4);
                background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4);
                background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4));
                background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4);
                background-image: -o-linear-gradient(top, #6eb6de, #4a77d4);
                background-image: linear-gradient(top, #6eb6de, #4a77d4);
                background-repeat: repeat-x;
                filter: progid: dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);
                border: 1px solid #3762bc;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
                box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5);
            }

            .btn-primary:hover,
            .btn-primary:active,
            .btn-primary.active,
            .btn-primary.disabled,
            .btn-primary[disabled] {
                filter: none;
                background-color: #4a77d4;
            }

            .btn-block {
                width: 100%;
                display: block;
            }

            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -o-box-sizing: border-box;
                box-sizing: border-box;
            }

            html {
                width: 100%;
                height: 100%;
                overflow: hidden;
            }

            body {
                width: 100%;
                height: 100%;
                font-family: 'Open Sans', sans-serif;
                background: #092756;
                background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -moz-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -moz-linear-gradient(-45deg, #670d10 0%, #092756 100%);
                background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -webkit-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -webkit-linear-gradient(-45deg, #670d10 0%, #092756 100%);
                background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -o-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -o-linear-gradient(-45deg, #670d10 0%, #092756 100%);
                background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), -ms-linear-gradient(top, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), -ms-linear-gradient(-45deg, #670d10 0%, #092756 100%);
                background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104, 128, 138, .4) 10%, rgba(138, 114, 76, 0) 40%), linear-gradient(to bottom, rgba(57, 173, 219, .25) 0%, rgba(42, 60, 87, .4) 100%), linear-gradient(135deg, #670d10 0%, #092756 100%);
                filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756', GradientType=1);
            }

            .login {
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -150px 0 0 -150px;
                width: 300px;
                height: 300px;
            }

            .login h1 {
                color: #fff;
                text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
                letter-spacing: 1px;
                text-align: center;
            }

            input {
                width: 100%;
                margin-bottom: 10px;
                background: rgba(0, 0, 0, 0.3);
                border: none;
                outline: none;
                padding: 10px;
                font-size: 13px;
                color: #fff;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
                border: 1px solid rgba(0, 0, 0, 0.3);
                border-radius: 4px;
                box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
                -webkit-transition: box-shadow .5s ease;
                -moz-transition: box-shadow .5s ease;
                -o-transition: box-shadow .5s ease;
                -ms-transition: box-shadow .5s ease;
                transition: box-shadow .5s ease;
            }

            input:focus {
                box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.4), 0 1px 1px rgba(255, 255, 255, 0.2);
            }

            img.bg {
                /* Set rules to fill background */
                min-height: 100%;
                min-width: 1024px;
                /* Set up proportionate scaling */
                width: 100%;
                height: auto;
                /* Set up positioning */
                position: fixed;
                top: 0;
                left: 0;
            }

            @media screen and (max-width: 1024px) {
            img.bg {
            left: 50%;
            margin-left: -512px;
            }
            }

        </style>


        <script src="js/prefixfree.min.js"></script>


    </head>

    <body>
        <?php
            if(isset($_GET['type'])){
                if($_GET['type']=='recruiter')
                    echo '<img src="img/recruiterlogin.jpg" class="bg">';
                elseif($_GET['type']=='candidate')
                    echo '<img src="img/candidatelogin.jpg" class="bg">';
            }
            else {
                echo '<script>window.location.assign("index.html");</script>';
            }
        ?>

        <div class="login">
            <div align="center">  <img src="indriyalogo.png" width="80%" height="40%"></div>
            <h1>Login</h1>
            <form method="post">
                <input type="text" name="username" placeholder="Cell Num or Mail Address" required="required" />
                <input type="password" name="password" placeholder="Password" required="required" />
                <input type="submit" name="submit" class="btn btn-primary btn-block btn-large" value="Let me in.">
                <br/>
                <input type="submit" onclick="callforgot()" class="btn" value="Forgot Password.">
                <br/><br/>
                <input type="submit" onclick="callthis()" class="btn btn-primary btn-block btn-small" value="Create Account.">
            </form>
        </div>

        <script src="js/index.js"></script>
        <script>
            function getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }

            function callthis(){
                var type = getParameterByName('type');
                var url="register.php?type="+type;
                window.open(url,"_self");
            }
            function callforgot(){
                window.open("forget.php","_self");
            }
        </script>
    </body>
</html>