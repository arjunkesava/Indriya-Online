<?php
    include('head.inc');

    $ctype=$_COOKIE['type'];
    if(($ctype!="candidate")||($ctype==null)){
        echo "<script type='text/javascript'>window.location.assign('logout.php');</script>";
    }



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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <title>Candidate Dash Board</title>

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
        <style>
            html, body
            {
                width: 100%;
                height: 100%;
            }
            body
            {
                width: 100%;
                height: 100%;
                background-color: white;
            }

            .complete{
                display:none;
            }

            .more,.less{
                color:navy;
                font-size:15px;
                padding:3px;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div class="navbar-default sidebar" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <img src="indriyalogo.png" alt="Main Indriya Logo" height="100%" width="100%">
                        </li>
                        <li id="home">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Home Page</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="profile">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Profile</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="notification">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Notifications</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="query">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Query</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="offer">                               
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Offers</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="apply">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Applied</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="addcertificates">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Add Certificates</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12"><h1 class="page-header">Candidate Board</h1>
                        <div align="right">
                            <a class="btn btn-success" href="logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form id="maincontentform"  enctype="multipart/form-data">
                        <div id="maincontentload">
                            The Page is Loading. Please Wait...!
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#wrapper -->

        <script>
            (function (global) {

                if(typeof (global) === "undefined")
                    {
                    throw new Error("window is undefined");
                }

                var _hash = "!";
                var noBackPlease = function () {
                    global.location.href += "#";

                    // making sure we have the fruit available for juice....
                    // 50 milliseconds for just once do not cost much (^__^)
                    global.setTimeout(function () {
                        global.location.href += "!";
                    }, 50);
                };

                // Earlier we had setInerval here....
                global.onhashchange = function () {
                    if (global.location.hash !== _hash) {
                        global.location.hash = _hash;
                    }
                };

                global.onload = function () {

                    noBackPlease();

                    // disables backspace on page except on input fields and textarea..
                    document.body.onkeydown = function (e) {
                        var elm = e.target.nodeName.toLowerCase();
                        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                            e.preventDefault();
                        }
                        // stopping event bubbling up the DOM tree..
                        e.stopPropagation();
                    };

                };

            })(window);
            
            $(document).ready(function(){
                var data=$("#maincontentform").serializeArray();
                data[data.length]={name: "viewhome", value: true};
                $("#maincontentload").load("getcandidate.php",data);

                $(document).on('click','#home',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "viewhome", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#profile',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "profilebtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $("form#maincontentform").submit(function(event){

                    event.preventDefault();
                    var formData = new FormData($(this)[0]);
                    formData.append('profilesavebtn',true);

                    $.ajax({
                        url: 'getcandidate.php',
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (returndata) {
                            $('#maincontentload').html(returndata);
                        }
                    });

                    /*
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "profilesavebtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                    */
                });

                $(document).on('click','#notification',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "notificationbtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#prefferedjobs',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "prefferedjobsbtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#otherjobs',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "otherjobsbtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#viewjobalerts',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "viewjobalertsbtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                var idname;
                $(document).on('click','input[id^="applyjob"]',function(){
                    idname=this.id.match(/ .*/);
                    //idform="#showsectionform"+this.id.match(/\d+$/);

                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "applyjobbtn", value: true};
                    data[data.length]={name: "jobid", value: idname};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#offer',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "offerbtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#query',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "querybtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#apply',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "applybtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#addcertificates',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "addcertificatesbtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','#addquery',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "addquerybtn", value: true};
                    $("#maincontentload").load("getcandidate.php",data);
                });

                $(document).on('click','span[id^="ml"]',function(){
                    var className = $(this).attr('class');
                    if(className=="more")
                        {
                        $(this).removeClass("more");
                        $(this).addClass("less");
                        $(this).text("less..").siblings(".complete").show();
                    }
                    else{
                        $(this).removeClass("less");
                        $(this).addClass("more");
                        $(this).text("more..").siblings(".complete").hide();
                    }
                    /*
                    $("#ml").removeClass("more");
                    $("#ml").addClass("less");
                    $("#ml").text("less..").siblings(".complete").show();
                    */  
                });
                /*
                $(document).on('click','span[class^="less"]',function(){
                $("#ml").removeClass("less");
                $("#ml").addClass("more");
                $("#ml").text("more..").siblings(".complete").hide();
                */                  
                /*
                if($("#ml").text("more..").siblings(".complete").hide()==true){
                alert("What");
                $("#ml").text("less..").siblings(".complete").show();
                }
                */
                //            });

                /*
                $(document).on('click','#certificatesubmit',function(){
                var data=$("#maincontentform").serializeArray();
                data[data.length]={name: "certificatesubmitbtn", value: true};
                $("#maincontentload").load("getcandidate.php",data);
                });
                */

            });
        </script>

    </body>

</html>
