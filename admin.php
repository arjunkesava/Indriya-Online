<?php
    include('head.inc');
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

        <title>Admin Dash Board</title>

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
                        <li id="accounts">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Accounts</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--
                        <li id="query">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Querys</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12"><h1 class="page-header">Admin Board</h1>
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
                data[data.length]={name: "accountsbtn", value: true};
                $("#maincontentload").load("getadmin.php",data);

                $(document).on('click','#accounts',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "accountsbtn", value: true};
                    $("#maincontentload").load("getadmin.php",data);
                });
                
                var idname;
                $(document).on('click','input[id^="accept"]',function(){
                    idname=this.id.match(/ .*/);
                    //idform="#showsectionform"+this.id.match(/\d+$/);

                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "acceptcandidatebtn", value: true};
                    data[data.length]={name: "candidateid", value: idname};
                    $("#maincontentload").load("getadmin.php",data);
                });

                
                $(document).on('click','#query',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "querybtn", value: true};
                    $("#maincontentload").load("getadmin.php",data);
                });
            });
        </script>

    </body>

</html>
