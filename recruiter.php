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

        <title>Recruiter Dash Board</title>

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
            .data {
                float: right;
                margin: 0;
            }

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
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div class="navbar-default sidebar" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <img src="indriyalogo.png" alt="Main JobYukta Logo" height="100%" width="100%">
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
                        <li id="candidatesearch">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Candidate Search</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="makeoffer">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Make Offer</div>
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
                        <li id="notify">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Notify</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="applications">
                            <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-9">
                                                <div class="h3">Applications Received</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12"><h1 class="page-header">Recruiter Panel</h1>
                        <div align="right">
                            <a class="btn btn-success" href="logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form id="maincontentform"  enctype="multipart/form-data">
                        <div id="maincontentload">
                            Data to set
                        </div>
                    </form>
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <script>
            $(document).ready(function(){
                var data=$("#maincontentform").serializeArray();
                data[data.length]={name: "viewhome", value: true};
                $("#maincontentload").load("getrecruiter.php",data);

                $(document).on('click','#home',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "viewhome", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#profile',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "profilebtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $("form#maincontentform").submit(function(event){

                    event.preventDefault();
                    var formData = new FormData($(this)[0]);
                    formData.append('profilesavebtn',true);

                    $.ajax({
                        url: 'getrecruiter.php',
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
                });

                
                $(document).on('change','#experiencenumber',function(){
                    var expnum=$('#experiencenumber').val();
                    var i=0;
                    var set='';
                    for(;i<expnum;i++){
                        set+='<div class="row"><div class="col-lg-5"><div class="input-group"><span class="input-group-addon" id="sizing-addon2">Company Name: </span><input type="text" class="form-control" placeholder="Enter your Company Name" name="prevcompanyname[]" id="prevcompanyname[]"></div><br /></div><div class="col-lg-3"><div class="input-group"><span class="input-group-addon" id="sizing-addon2">Experience Time: </span><input type="text" placeholder="Time" class="form-control" name="experiencetime[]" id="experiencetime"></div><br /></div><div class="col-lg-3"><div class="input-group"><span class="input-group-addon" id="sizing-addon2">Designation: </span><input type="text" placeholder="Designation" class="form-control"name="expdesignation[]" id="expdesignation"></div><br /></div></div>';                                                
                    }
                    $('#expset').html(set);
                });

                $(document).on('click','#candidatesearch',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "candidatesearchbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#subcandidatesearchbtn',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "subcandidatesearchbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#makeoffer',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "makeofferbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#query',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "querybtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#addquery',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "addquerybtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#notify',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "notifybtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#createjob',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "createjobbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#createjobalert',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "createjobalertbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#notifysave',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "notifysavebtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#applications',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "applicationsbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','input[id^="acceptjob"]',function(){
                    var idname=this.id.match(/ .*/);
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "jobid", value: idname};
                    data[data.length]={name: "acceptjobbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                $(document).on('click','#saveoffer',function(){
                    var data=$("#maincontentform").serializeArray();
                    data[data.length]={name: "saveofferbtn", value: true};
                    $("#maincontentload").load("getrecruiter.php",data);
                });

                var options = [];

                $( '.dropdown-menu label' ).on( 'click', function( event ) {

                    var $target = $( event.currentTarget ),
                    val = $target.attr( 'data-value' ),
                    $inp = $target.find( 'input' ),
                    idx;

                    if ( ( idx = options.indexOf( val ) ) > -1 ) {
                        options.splice( idx, 1 );
                        setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
                    } else {
                        options.push( val );
                        setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
                    }

                    $( event.target ).blur();


                    return false;
                });

            });
        </script>

    </body>

</html>
