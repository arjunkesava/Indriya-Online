<?php
    if (isset($_POST['submit'])) {
        $con=mysqli_connect("localhost","indriyaadmin","tiger","indriya");
        // Check connection
        if (mysqli_connect_errno())
            die("Failed to connect to MySQL: " . mysqli_connect_error());

        if ($_POST['usertype'] == "Recruiter") {
            //Array ( [fullname] => sdfvdsw [reccell] => 1123454321 [recemail] => ADFGFDWQ [company] => SDCFDSA [designation] => qwdfdsq
            //[address] => qwsdfdsq [otherdetails] => qwedfgvfdswq [password] => qwsdfdswq [confirmpassword] => qwedfds [usertype] => Recruiter [submit] => Register )
            if ($_POST['password'] == $_POST['confirmpassword']) {
                $uid = uniqid();
                $md5 = md5($_POST['password']);
                $sql = "INSERT INTO `mainlogin` (`userid`, `cell`, `mailid`, `password`, `type`) VALUES ('{$uid}', {$_POST['reccell']}, '{$_POST['recemail']}', '{$md5}', 'recruiter')";
                $res = mysqli_query($con, $sql);
                if ($res) {
                    $sql = "INSERT INTO `recruitertable` VALUES ('{$uid}','{$_POST['fullname']}','{$_POST['company']}','{$_POST['designation']}','{$_POST['address']}','{$_POST['otherdetails']}')";
                    $res = mysqli_query($con, $sql);
                    if ($res) {
                        echo '<script>alert("Congratulations, An Account Has Been Created withe Mail Id: ' . $_POST['recemail'] . '. You can Log In Now.")</script>';
                        echo '<script>window.open("login.php?type=recruiter","_self")</script>';
                    } else {
                        mysqli_query($con,"delete from mainlogin where userid='{$uid}'");
                        echo '<script>alert("Sorry Something Went Wrong. Please Try Again.")</script>';
                    }
                } else {
                    echo '<script>alert("The Details are already entered. Please Check and Try Again.")</script>';
                }
            } else {
                echo '<script>alert("Both Passwords are Unmatched. Please Try Again.")</script>';
            }
        } elseif ($_POST['usertype'] == "Candidate") {

            if ($_POST['password'] == $_POST['confirmpassword']) {
                $muid = uniqid();
                $md5 = md5($_POST['password']);
                //INSERT INTO `indriya`.`mainlogin` (`userid`, `cell`, `mailid`, `password`, `type`) VALUES ('myownone1', '123', 'data@gmail.com', 'pass', 'candidate');

                $sql = "INSERT INTO `mainlogin` (`userid`, `cell`, `mailid`, `password`, `type`) VALUES ('{$muid}', '{$_POST['cell']}', '{$_POST['email']}', '{$md5}', 'candidate')";
                $res = mysqli_query($con, $sql);
                if ($res) {

                    $photoupload = false;
                    $userphoto=$_FILES['photopath'];
                    if($userphoto["type"]=='image/jpeg')
                        $type='.jpg';
                    elseif($userphoto["type"]=='image/png')
                        $type='.png';
                    elseif($userphoto["type"]=='image/gif')
                        $type='.gif';

                    $imgid=uniqid();
                    $target_file ='candidates/'.$imgid.$type;
                    if (move_uploaded_file($userphoto["tmp_name"], $target_file)) {
                        $photoupload=true;
                        $photopath=$target_file;
                    }

                    if ($photoupload == true) {

                        // Array ( [fullname] => sdfvdwq [fathername] => dsq [mothername] => dfvde [cell] => 5 [email] => qwedfdq
                        //  [photopath] => GTY_apple_wwdc_as_160613_12x5_1600.jpg [dob] => 2016-06-01 [currentaddress] => sdccvds [permanentaddress] =>
                        // sdfvfcds [password] => 1234r432 [confirmpassword] => 12321 [usertype] => Candidate [submit] => Register )
                        //candidateid    ,fullname, dob    ,                          fathername    ,            mothername    ,      permanentaddress    ,currentaddress    ,currenteducation     photopath
                        $sql = "INSERT INTO `candidatetable`(`candidateid`, `fullname`, `dob`, `photopath`, `accountaccess`) VALUES ('{$muid}','{$_POST['fullname']}','{$_POST['dob']}','$photopath','noaccess')";
                        echo '<script>alert("Fuck."'.$sql.')</script>';
                        $res = mysqli_query($con, $sql);
                        if ($res) {
                            for($i=0;$i<sizeof($_POST['rolelist']);$i++)
                                mysqli_query($con,"insert into candidaterolelist values('{$uid}','{$_POST['rolelist'][$i]}');");
                            for($i=0;$i<sizeof($_POST['languagelist']);$i++)
                                mysqli_query($con,"insert into candidatelanguages values('{$uid}','{$_POST['languagelist'][$i]}');");
                            for($i=0;$i<sizeof($_POST['skilllist']);$i++)
                                mysqli_query($con,"insert into candidateskills values('{$uid}','{$_POST['skilllist'][$i]}');");

                            echo '<script>alert("Congratulations, An Account Has Been Created withe Mail Id: ' . $_POST['email'] . '. You can Log In Now.")</script>';
                            echo '<script>window.open("login.php?type=candidate","_self")</script>';
                        } else {
                            mysqli_query($con,"delete from mainlogin where userid='{$uid}'");
                            echo '<script>alert("Sorry Something Went Wrong. Please Try Again.")</script>';
                        }
                    } else {
                        mysqli_query($con,"delete from mainlogin where userid='{$uid}'");
                        echo '<script>alert("Sorry Something Went Wrong with the Photo. Please Try Again.")</script>';
                    }
                } else {
                    echo '<script>alert("The Details are already entered. Please Check and Try Again.")</script>';
                }
            } else {
                echo '<script>alert("Both Passwords are Unmatched. Please Try Again.")</script>';
            }

        } else {
            echo 'window.location.assign("index.html")';
        }
        mysqli_close($con);
    }
    else{


    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link rel="stylesheet" href="docs/css/bootstrap-3.3.2.min.css" type="text/css">
            <link rel="stylesheet" href="docs/css/bootstrap-example.css" type="text/css">
            <link rel="stylesheet" href="docs/css/prettify.css" type="text/css">
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="build.css"/>
            <script type="text/javascript" src="docs/js/jquery-2.1.3.min.js"></script>
            <script type="text/javascript" src="docs/js/bootstrap-3.3.2.min.js"></script>
            <script type="text/javascript" src="docs/js/prettify.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
            <!--
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            -->
            <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

            <!-- Optional theme -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <title>Registration Page</title>
            <!-- Bootstrap Core CSS -->
            <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- MetisMenu CSS -->
            <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
            <!-- Timeline CSS -->
            <link href="dist/css/timeline.css" rel="stylesheet">
            <!-- Custom CSS -->
            <link href="dist/css/sb-admin-2.css" rel="stylesheet">
            <!-- Morris Charts CSS -->
            <link href="bower_components/morrisjs/morris.css" rel="stylesheet">
            <!-- Custom Fonts -->
            <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div id="wrapper">
                <div class="container"  style="background-color: white;">
                    <div class="row">
                        <div class="col-lg-3"><img src="indriyalogo.png" alt="" width="100%" height="100%"></div>
                    </div>
                    <?php
                        if(isset($_GET['type'])){
                            if($_GET['type']=='recruiter')
                                $type="Recruiter";
                            elseif($_GET['type']=='candidate')
                                $type="Candidate";
                        }
                        else {
                            echo '<script>window.location.assign("index.html");</script>';
                        }
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><?php echo $type; ?> Registration Form</h1>
                        </div>
                    </div>
                    <form class="form" method="post" enctype="multipart/form-data">
                    <div class="row container">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-xs-8">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Full Name: </span>
                                    <input type="text" class="form-control" placeholder="Enter your Full Name" id="fullname" name="fullname" required="required" value="<?php  if(isset($_POST['fullname'])) echo htmlspecialchars($_POST['fullname']);?>">
                                </div>
                            </div>
                        </div>
                        <br />
                        <?php if ($type=="Candidate"){?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Cell: </span>
                                        <input type="number" class="form-control" id="cell" name="cell"  required="required" value="<?php  if(isset($_POST['cell'])) echo htmlspecialchars($_POST['cell']);?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Email: </span>
                                        <input type="text" class="form-control" id="email" name="email" required="required" value="<?php  if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Upload Photo: </span>
                                        <input type="file" class="form-control" id="photopath" name="photopath" required="required" value="<?php  if(isset($_POST['photopath'])) echo htmlspecialchars($_POST['photopath']);?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Date of Birth: </span>
                                        <input type="date" class="form-control" id="dob" name="dob"  required="required" value="<?php  if(isset($_POST['dob'])) echo htmlspecialchars($_POST['dob']);?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    Click on the Check Box inside the button:
                                    <div class="button-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Languages Known<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><label for="f1"><input type="checkbox" id="f1" value="English" name="languagelist[]"/> English</label></li>
                                            <li><label for="f2"><input type="checkbox" id="f2" value="Hindi" name="languagelist[]"/>Hindi</label></li>
                                            <li><label for="f3"><input type="checkbox" id="f3" value="Bengali" name="languagelist[]"/> Bengali</label></li>
                                            <li><label for="f4"><input type="checkbox" id="f4" value="Telugu" name="languagelist[]"/> Telugu</label></li>
                                            <li><label for="f5"><input type="checkbox" id="f5" value="Marathi" name="languagelist[]"/> Marathi</label></li>
                                            <li><label for="f6"><input type="checkbox" id="f6" value="Tamil" name="languagelist[]"/> Tamil</label></li>
                                            <li><label for="f7"><input type="checkbox" id="f7" value="Urdu" name="languagelist[]"/> Urdu</label></li>
                                            <li><label for="f8"><input type="checkbox" id="f8" value="Gujarati" name="languagelist[]"/> Gujarati</label></li>
                                            <li><label for="f9"><input type="checkbox" id="f9" value="Kannada" name="languagelist[]"/> Kannada</label></li>
                                            <li><label for="f10"><input type="checkbox" id="f10" value="Malayalam" name="languagelist[]"/> Malayalam</label></li>
                                            <li><label for="f11"><input type="checkbox" id="f11" value="Odia" name="languagelist[]"/> Odia</label></li>
                                            <li><label for="f12"><input type="checkbox" id="f12" value="Punjabi" name="languagelist[]"/> Punjabi</label></li>
                                            <li><label for="f13"><input type="checkbox" id="f13" value="Assamese" name="languagelist[]"/> Assamese</label></li>
                                            <li><label for="f14"><input type="checkbox" id="f14" value="Maithili" name="languagelist[]"/> Maithili</label></li>
                                            <li><label for="f15"><input type="checkbox" id="f15" value="Bhili/Bhilodi" name="languagelist[]"/> Bhili/Bhilodi</label></li>
                                            <li><label for="f16"><input type="checkbox" id="f16" value="Santali" name="languagelist[]"/> Santali</label></li>
                                            <li><label for="f17"><input type="checkbox" id="f17" value="Kashmiri" name="languagelist[]"/> Kashmiri</label></li>
                                            <li><label for="f18"><input type="checkbox" id="f18" value="Nepali" name="languagelist[]"/> Nepali</label></li>
                                            <li><label for="f19"><input type="checkbox" id="f19" value="Gondi" name="languagelist[]"/> Gondi</label></li>
                                            <li><label for="f20"><input type="checkbox" id="f20" value="Sindhi" name="languagelist[]"/> Sindhi</label></li>
                                            <li><label for="f21"><input type="checkbox" id="f21" value="Konkani" name="languagelist[]"/> Konkani</label></li>
                                            <li><label for="f22"><input type="checkbox" id="f22" value="Dogri" name="languagelist[]"/> Dogri</label></li>
                                            <li><label for="f23"><input type="checkbox" id="f23" value="Mundari" name="languagelist[]"/> Mundari</label></li>
                                            <li><label for="f24"><input type="checkbox" id="f24" value="Ho" name="languagelist[]"/> Ho</label></li>
                                            <li><label for="f25"><input type="checkbox" id="f25" value="Khandeshi" name="languagelist[]"/> Khandeshi</label></li>
                                            <li><label for="f26"><input type="checkbox" id="f26" value="Kurukh" name="languagelist[]"/> Kurukh</label></li>
                                            <li><label for="f27"><input type="checkbox" id="f27" value="Tulu" name="languagelist[]"/> Tulu</label></li>
                                            <li><label for="f28"><input type="checkbox" id="f28" value="Meitei/Manipuri" name="languagelist[]"/> Meitei/Manipuri</label></li>
                                            <li><label for="f29"><input type="checkbox" id="f29" value="Khasi" name="languagelist[]"/> Khasi</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    Click on the Check Box inside the button:
                                    <div class="button-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Role<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><label for="f1"><input type="checkbox" id="f1" value="Teacher" name="rolelist[]"/> Teacher</label></li>
                                            <li><label for="f2"><input type="checkbox" id="f2" value="Trainer" name="rolelist[]"/> Trainer</label></li>
                                            <li><label for="f3"><input type="checkbox" id="f3" value="Accountant" name="rolelist[]"/> Accountant</label></li>
                                            <li><label for="f4"><input type="checkbox" id="f4" value="Architect" name="rolelist[]"/> Architect</label></li>
                                            <li><label for="f5"><input type="checkbox" id="f5" value="Beautician" name="rolelist[]"/> Beautician</label></li>
                                            <li><label for="f6"><input type="checkbox" id="f6" value="BPO/ Telecaller" name="rolelist[]"/> BPO/ Telecaller</label></li>
                                            <li><label for="f7"><input type="checkbox" id="f7" value="Cashier" name="rolelist[]"/> Cashier</label></li>
                                            <li><label for="f8"><input type="checkbox" id="f8" value="Construction/Laborer" name="rolelist[]"/> Construction/Laborer</label></li>
                                            <li><label for="f9"><input type="checkbox" id="f9" value="Content Writer" name="rolelist[]"/> Content Writer</label></li>
                                            <li><label for="f10"><input type="checkbox" id="f10" value="Data Entry /Back Office" name="rolelist[]"/> Data Entry /Back Office</label></li>
                                            <li><label for="f11"><input type="checkbox" id="f11" value="Delivery/Collections" name="rolelist[]"/> Delivery/Collections</label></li>
                                            <li><label for="f12"><input type="checkbox" id="f12" value="Doctor" name="rolelist[]"/> Doctor</label></li>
                                            <li><label for="f13"><input type="checkbox" id="f13" value="DTP Operator" name="rolelist[]"/> DTP Operator</label></li>
                                            <li><label for="f14"><input type="checkbox" id="f14" value="Electrician" name="rolelist[]"/> Electrician</label></li>
                                            <li><label for="f15"><input type="checkbox" id="f15" value="Engineer" name="rolelist[]"/> Engineer</label></li>
                                            <li><label for="f16"><input type="checkbox" id="f16" value="Hospitality Executive" name="rolelist[]"/> Hospitality Executive</label></li>
                                            <li><label for="f17"><input type="checkbox" id="f17" value="HR/Admin" name="rolelist[]"/> HR/Admin</label></li>
                                            <li><label for="f18"><input type="checkbox" id="f18" value="IT Hardware & Network Engineer" name="rolelist[]"/> IT Hardware & Network Engineer</label></li>
                                            <li><label for="f19"><input type="checkbox" id="f19" value="IT Software - Developer" name="rolelist[]"/> IT Software - Developer</label></li>
                                            <li><label for="f20"><input type="checkbox" id="f20" value="IT Software - QA/Test Engineer" name="rolelist[]"/> IT Software - QA/Test Engineer</label></li>
                                            <li><label for="f21"><input type="checkbox" id="f21" value="IT Software - Web Designer" name="rolelist[]"/> IT Software - Web Designer</label></li>
                                            <li><label for="f22"><input type="checkbox" id="f22" value="Legal" name="rolelist[]"/> Legal</label></li>
                                            <li><label for="f23"><input type="checkbox" id="f23" value="Marketing" name="rolelist[]"/> Marketing</label></li>
                                            <li><label for="f24"><input type="checkbox" id="f24" value="Nurse" name="rolelist[]"/> Nurse</label></li>
                                            <li><label for="f25"><input type="checkbox" id="f25" value="Office Assistant/Helper" name="rolelist[]"/> Office Assistant/Helper</label></li>
                                            <li><label for="f26"><input type="checkbox" id="f26" value="Photographer" name="rolelist[]"/> Photographer</label></li>
                                            <li><label for="f27"><input type="checkbox" id="f27" value="Receptionist/Front Office" name="rolelist[]"/> Receptionist/Front Office</label></li>
                                            <li><label for="f28"><input type="checkbox" id="f28" value="Sales" name="rolelist[]"/> Sales</label></li>
                                            <li><label for="f29"><input type="checkbox" id="f29" value="Warehouse Executive" name="rolelist[]"/> Warehouse Executive</label></li>
                                            <li><label for="f30"><input type="checkbox" id="f30" value="Others" name="rolelist[]"/> Others</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    Click on the Check Box inside the button:
                                    <div class="button-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Technical Skills<span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><label for="f1"><input type="checkbox" id="f1" value="Php" name="skilllist[]"/> Php</label></li>
                                            <li><label for="f2"><input type="checkbox" id="f2" value="Html" name="skilllist[]"/> Html</label></li>
                                            <li><label for="f3"><input type="checkbox" id="f3" value="Software Architecture" name="skilllist[]"/> Software Architecture</label></li>
                                            <li><label for="f4"><input type="checkbox" id="f4" value="Wordpress" name="skilllist[]"/> Wordpress</label></li>
                                            <li><label for="f5"><input type="checkbox" id="f5" value="Seo" name="skilllist[]"/> Seo</label></li>
                                            <li><label for="f6"><input type="checkbox" id="f6" value="MySql" name="skilllist[]"/> MySql</label></li>
                                            <li><label for="f7"><input type="checkbox" id="f7" value="Java Script" name="skilllist[]"/> Java Script</label></li>
                                            <li><label for="f8"><input type="checkbox" id="f8" value="e-Commerce" name="skilllist[]"/> e-Commerce</label></li>
                                            <li><label for="f9"><input type="checkbox" id="f9" value="Html Link Building" name="skilllist[]"/> Html Link Building</label></li>
                                            <li><label for="f10"><input type="checkbox" id="f10" value="Java" name="skilllist[]"/> Java</label></li>
                                            <li><label for="f11"><input type="checkbox" id="f11" value="User Interface" name="skilllist[]"/> User Interface</label></li>
                                            <li><label for="f12"><input type="checkbox" id="f12" value="C Programming" name="skilllist[]"/> C Programming</label></li>
                                            <li><label for="f13"><input type="checkbox" id="f13" value="jQuery" name="skilllist[]"/> jQuery</label></li>
                                            <li><label for="f14"><input type="checkbox" id="f14" value="Python" name="skilllist[]"/> Python</label></li>
                                            <li><label for="f15"><input type="checkbox" id="f15" value="C++ Programming" name="skilllist[]"/> C++ Programming</label></li>
                                            <li><label for="f16"><input type="checkbox" id="f16" value="Dot Net" name="skilllist[]"/> Dot Net</label></li>
                                            <li><label for="f17"><input type="checkbox" id="f17" value="SQL" name="skilllist[]"/> SQL</label></li>
                                            <li><label for="f18"><input type="checkbox" id="f18" value="SAP" name="skilllist[]"/> SAP</label></li>
                                            <li><label for="f19"><input type="checkbox" id="f19" value="CSS" name="skilllist[]"/> CSS</label></li>
                                            <li><label for="f20"><input type="checkbox" id="f20" value="Photoshop" name="skilllist[]"/> Photoshop</label></li>
                                            <li><label for="f21"><input type="checkbox" id="f21" value="Illustrator" name="skilllist[]"/> Illustrator</label></li>   
                                            <li><label for="f22"><input type="checkbox" id="f22" value="Android" name="skilllist[]"/> Android</label></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } elseif($type=="Recruiter") { ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Cell: </span>
                                        <input type="number" class="form-control" id="reccell" name="reccell"  required="required" value="<?php  if(isset($_POST['reccell'])) echo htmlspecialchars($_POST['reccell']);?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Email: </span>
                                        <input type="text" class="form-control" id="recemail" name="recemail" required="required" value="<?php  if(isset($_POST['recemail'])) echo htmlspecialchars($_POST['recemail']);?>">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Company: </span>
                                        <input type="text" class="form-control" name="company" id="company" required="required" value="<?php  if(isset($_POST['company'])) echo htmlspecialchars($_POST['company']);?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">Designation: </span>
                                        <input type="text" class="form-control" name="designation" id="designation" required="required" value="<?php  if(isset($_POST['designation'])) echo htmlspecialchars($_POST['designation']);?>">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-4">
                                    Enter Your Company Address:
                                    <textarea cols="10" rows="8" class="form-control" name="address" id="address" required="required"></textarea>
                                </div>
                                <div class="col-lg-4">
                                    Enter Any Other Details:
                                    <textarea cols="10" rows="8" class="form-control" name="otherdetails" id="otherdetails"></textarea>
                                </div>
                            </div>
                            <?php } ?>
                        <div class="row">
                            <div class="col-lg-4"><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Password: </span>
                                    <input type="password" class="form-control" name="password" id="password" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4"><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">Confirm Password: </span>
                                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required">
                                </div>
                            </div>
                        </div>
                        <br />
                        <input type="hidden" value="<?php echo htmlspecialchars($type);?>" name="usertype">
                        <div class="row">
                            <div class="col-lg-2"><br /><br />
                                <input type="submit" class="btn btn-success" value="Register" name="submit" required="required">
                            </div>
                            <br />
                        </div>
                    </div>
                    <br />
                </div>
                </form>
            </div>
        </body>
    </html>
    <?php } ?>
