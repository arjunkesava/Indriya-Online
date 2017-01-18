<?php
    include('head.inc');

    if(isset($_POST['viewhome'])){
        error_reporting(1);
        $sql="SELECT `recruiterid`, `fullname`, `highedu`, `jobroll`, `designation`, `city`, `companyname`, `officialmailaddress`, `residentialmailaddress`, `experiencenumber`, `photopath` from recruitertable WHERE `recruiterid` = '{$_COOKIE['userid']}';";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $info=mysqli_fetch_array($res);
            echo '
            <div class="container">
            <div><h3>All About You</h3></div>
            <div class="row">
            <div class="col-lg-9">
            <table class="table" border="0">
            <tr><td colspan="3"><strong>Full Name: </strong>'.ucfirst($info['fullname']).'</td><td width="40%" rowspan="4"><img src="'.$info['photopath'].'" width="90%"></td></tr>
            <tr><td><strong>Job Rolls: </strong>'.ucfirst($info['jobroll']).'</td><td><strong>Desgination: </strong>'.ucfirst($info['designation']).'</td></tr>
            <tr><td><strong>Years of Experience:</strong> '.$info['experiencenumber'].'</td><td><strong>Highest Education:</strong> '.$info['highedu'].'</td></tr>
            <tr><td colspan="4"><strong>Location of the Company:</strong> '.$info['city'].'</td></tr>
            <tr><td colspan="4"><h3>Experience Details</h3></td></tr>';


            $sql="select `prevcompanyname`, `experiencetime`, `expdesignation` from recruiterexperience where recruiterid='{$_COOKIE['userid']}'";
            $subres=mysqli_query($con,$sql);
            $sno=1;
            echo '<tr><td><strong>Sno</strong></td><td><strong>Previous Comapany Name</strong></td><td><strong>Time</strong></td><td><strong>Desgination</strong></td></tr>';
            while($expinfo=mysqli_fetch_array($subres)){
                echo '<tr><td><strong>'.$sno.' </strong></td><td>'.$expinfo['prevcompanyname'].'</td><td>'.$expinfo['experiencetime'].'</td><td>'.$expinfo['expdesignation'].'</td></tr>';
                $sno++;
            }

            echo'
            </table>
            </div>
            </div>
            </div>
            ';
        }
        else
            echo 'Please fill your <a id="profile">Profile</a> to See it Here';

    }

    if(isset($_POST['profilebtn'])){
        echo '<h2 class="page-head">Complete Your Profile</h2>';
        echo '
        <div class="container">
        <div class="row">
        <div class="col-lg-8">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Full Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Full Name" name="fullname" id="fullname">
        </div>
        <br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Highest Edu. Qualification: </span>
        <input type="text" class="form-control" placeholder="Enter Your Edu. Qualification" name="highedu" id="highedu">
        </div><br />
        </div>
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Profile Photo: </span>
        <input type="file" attach=".jpg,.png,.gif" class="form-control" name="uploadphoto" id="uploadphoto">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Job Rolls: </span>
        <input type="text" class="form-control" placeholder="Enter the Job Rolls" name="jobroll" id="jobroll">
        </div>
        <br/>
        </div>
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Desgination: </span>
        <input type="text" class="form-control" placeholder="Enter the Desgination" name="designation" id="designation">
        </div>
        <br/>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        Location of the Company:<br />
        <select name="city" id="city" class="form-control">
        <option></option>
        <option>Visakhapatnam</option>
        <option>Vijayawada</option>
        <option>Guntur</option>
        <option>Nellore</option>
        <option>Kurnool</option>
        <option>Tirupati</option>
        <option>Kakinada</option>
        <option>Kadapa</option>
        <option>Rajahmundry</option>
        <option>Anantapur</option>
        <option>Vizianagaram</option>
        <option>Eluru</option>
        <option>Ongole</option>
        <option>Nandyal</option>
        <option>Machilipatnam</option>
        <option>Adoni</option>
        <option>Tenali</option>
        <option>Proddatur</option>
        <option>Chittoor</option>
        <option>Hindupur</option>
        <option>Bhimavaram</option>
        <option>Madanapalle</option>
        <option>Guntakal</option>
        <option>Srikakulam</option>
        <option>Dharmavaram</option>
        <option>Gudivada</option>
        <option>Narasaraopet</option>
        <option>Tadipatri</option>
        <option>Tadepalligudem</option>
        <option>Amaravati</option>
        <option>Chilakaluripet</option>
        </select>
        </div>
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Company Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Company Name" name="companyname" id="companyname">
        </div>
        <br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        Official Mailing Address:
        <textarea cols="10" rows="8" class="form-control" name="officalmailaddress" id="officalmailaddress"></textarea>
        </div>
        <div class="col-lg-4">
        Residential Mailing Address:
        <textarea cols="10" rows="8" class="form-control" name="residentialmailaddress" id="residentialmailaddress"></textarea>
        </div>
        </div>
        <div class="row"><br />
        Details of Experience:<br />
        <div class="col-lg-2">
        <select name="experiencenumber" id="experiencenumber" class="form-control">
        <option></option>
        <option>0</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        </select>
        </div>
        </div>
        <div id="expset">
        </div><br />
        <div class="row">
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Click: </span>
        <input type="submit" class="btn btn-success" name="profilesave" id="profilesave" value="Save">
        </div><br />
        </div>
        </div>
        </div>
        ';
    }

    if(isset($_POST['profilesavebtn'])){

        //[experiencenumber] => 3 [prevcompanyname] => Array ( [0] => [1] => [2] => ) [experiencetime] => Array ( [0] => [1] => [2] => ) [expdesignation] => Array ( [0] => [1] => [2] => ) [profilesavebtn] => true )
        if(!empty($_FILES['alertfile']['name'])){

            if($_FILES['alertfile']["type"]=='image/jpeg')
                $type='.jpg';
            elseif($_FILES['alertfile']["type"]=='image/png')
                $type='.png';
            elseif($_FILES['alertfile']["type"]=='image/gif')
                $type='.gif';

            $imgid=uniqid();
            $target ='alerts/'.$imgid.$type;
            if(move_uploaded_file($_FILES['alertfile']['tmp_name'], $target))
            {             
                $uid=uniqid();
                $sql="INSERT INTO `jobalerts`(`alertid`, `title`, `description`, `alertfile`) VALUES ('{$uid}','{$_POST['alerttitle']}','{$_POST['alertdescription']}','{$target}')";
                $res=mysqli_query($con,$sql);
                if($res)
                    echo 'Job Alert has been Created Successfully<br />';
                else
                    echo 'Job Alert has not been Created Successfully<br />';
            }
            else
                echo "<strong>Sorry Something Went Wrong. Please Try Again.<br /></strong>";
            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Go Back" id="createjobalert" name="createjobalert"></div></div>';
        }
        else{

            if(!empty($_FILES['uploadphoto']['name'])){

                if($_FILES['uploadphoto']["type"]=='image/jpeg')
                    $type='.jpg';
                elseif($_FILES['uploadphoto']["type"]=='image/png')
                    $type='.png';
                elseif($_FILES['uploadphoto']["type"]=='image/gif')
                    $type='.gif';

                $imgid=uniqid();
                $target ='recruiters/'.$imgid.$type;
                if(move_uploaded_file($_FILES['uploadphoto']['tmp_name'], $target))
                {             
                    $sql="UPDATE `recruitertable` SET `photopath` = '{$target}' WHERE `recruitertable`.`recruiterid` = '{$_COOKIE['userid']}';";
                    $res=mysqli_query($con,$sql);
                    if($res)
                        echo 'Profile Photo has been successfully updated<br />';
                    else
                        echo 'Profile Photo has not been successfully updated<br />';
                }
                else
                    echo "<strong>Profile Photo hasn`t been uploaded. Please Try Again.<br /></strong>";
            }


            $keys=array();
            $keys=array_keys($_POST);
            for($i=0;$i<9;$i++){
                if($_POST[$keys[$i]]!=null){

                    $sql="UPDATE `recruitertable` SET `{$keys[$i]}` = '{$_POST[$keys[$i]]}' WHERE `recruitertable`.`recruiterid` = '{$_COOKIE['userid']}'";
                    //$sql="UPDATE `recruitertable` SET `` = '' WHERE `recruitertable`.`recruiterid` = '';";
                    $res=mysqli_query($con,$sql);
                    if($res)
                        echo ucfirst($keys[$i]).' has been successfully updated<br />';
                    else
                        echo ucfirst($keys[$i]).' has not been successfully updated<br />';
                }
            }

            for($i=0;$i<$_POST['experiencenumber'];$i++){
                $sql="insert into `recruiterexperience` values ('{$_COOKIE['userid']}','{$_POST['prevcompanyname'][$i]}','{$_POST['experiencetime'][$i]}','{$_POST['expdesignation'][$i]}');";
                $res=mysqli_query($con,$sql);
                if($res)
                    echo 'Your expereince has been successfully Added<br />';
                else
                    echo 'Your expereince on company '.$_POST['prevcompanyname'][$i].' has not been successfully Added. Try Again<br />';
            }
            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Clear" id="profile" name="profile"></div></div>';
        }

    }

    if(isset($_POST['candidatesearchbtn'])){
        echo '<h3>Search for the Candidates:<br /></h3><h5>Click on the Check Box`s inside the buttons:</h5>';
        echo '
        <div class="container">
        <div class="row">
        <div class="col-lg-3" align="center">
        <div class="button-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Highest Educational Qualification<span class="caret"></span></button>
        <ul class="dropdown-menu">                                                    
        ';
        $sql="select distinct highedu from candidatetable";
        $res=mysqli_query($con,$sql);
        $i=0;
        while($info=mysqli_fetch_array($res)){
            echo '<li><label for="f'.$i.'"><input type="checkbox" id="f'.$i.'" value="'.$info['highedu'].'" name="highedu[]"/>'.$info['highedu'].'</label></li>';    
            $i++;
        }
        echo '
        </ul>
        </div>
        </div>
        <div class="col-lg-3" align="center">
        <div class="button-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Location<span class="caret"></span></button>
        <ul class="dropdown-menu">                                                    
        ';
        $sql="select distinct city from candidatetable";
        $res=mysqli_query($con,$sql);
        $i=0;
        while($info=mysqli_fetch_array($res)){
            echo '<li><label for="f'.$i.'"><input type="checkbox" id="f'.$i.'" value="'.$info['city'].'" name="city[]"/>'.$info['city'].'</label></li>';    
            $i++;                   
        }
        echo '
        </ul>
        </div>
        </div>
        <div class="col-lg-3" align="center">
        <div class="button-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Languages Known<span class="caret"></span></button>
        <ul class="dropdown-menu">';
        $sql="select distinct language from candidatelanguages";
        $res=mysqli_query($con,$sql);
        $i=0;
        while($info=mysqli_fetch_array($res)){
            echo '<li><label for="f'.$i.'"><input type="checkbox" id="f'.$i.'" value="'.$info['language'].'" name="language[]"/>'.$info['language'].'</label></li>';    
            $i++;
        }
        echo '                                                    
        </ul>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-3" align="center"><br />
        <div class="button-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Preffered Skills<span class="caret"></span></button>
        <ul class="dropdown-menu">';
        $sql="select distinct skill from candidateskills";
        $res=mysqli_query($con,$sql);
        $i=0;
        while($info=mysqli_fetch_array($res)){
            echo '<li><label for="f'.$i.'"><input type="checkbox" id="f'.$i.'" value="'.$info['skill'].'" name="skill[]"/>'.$info['skill'].'</label></li>';    
            $i++;
        }
        echo'
        </ul>
        </div>
        </div>
        <div class="col-lg-3" align="center"><br />
        <div class="button-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Cut Off Percentage<span class="caret"></span></button>
        <ul class="dropdown-menu">
        <li><strong>10th Class</strong></li>
        <li><label for="f1"><input type="checkbox" id="f1" value="ssc_50% - 59%" name="percentage[]"/>50% - 59%</label></li>
        <li><label for="f2"><input type="checkbox" id="f2" value="ssc_60% - 69%" name="percentage[]"/>60% - 69%</label></li>
        <li><label for="f3"><input type="checkbox" id="f3" value="ssc_above 70%" name="percentage[]"/>above 70%</label></li>
        <li><strong>Intermediate</strong></li>
        <li><label for="f1"><input type="checkbox" id="f1" value="inter_50% - 59%" name="percentage[]"/>50% - 59%</label></li>
        <li><label for="f2"><input type="checkbox" id="f2" value="inter_60% - 69%" name="percentage[]"/>60% - 69%</label></li>
        <li><label for="f3"><input type="checkbox" id="f3" value="inter_above 70%" name="percentage[]"/>above 70%</label></li>
        <li><strong>Under Graduation</strong></li>
        <li><label for="f1"><input type="checkbox" id="f1" value="degree_50% - 59%" name="percentage[]"/>50% - 59%</label></li>
        <li><label for="f2"><input type="checkbox" id="f2" value="degree_60% - 69%" name="percentage[]"/>60% - 69%</label></li>
        <li><label for="f3"><input type="checkbox" id="f3" value="degree_above 70%" name="percentage[]"/>above 70%</label></li>
        <li><strong>Post Graduation</strong></li>
        <li><label for="f1"><input type="checkbox" id="f1" value="master_50% - 59%" name="percentage[]"/>50% - 59%</label></li>
        <li><label for="f2"><input type="checkbox" id="f2" value="master_60% - 69%" name="percentage[]"/>60% - 69%</label></li>
        <li><label for="f3"><input type="checkbox" id="f3" value="master_above 70%" name="percentage[]"/>above 70%</label></li>
        </ul>
        </div>
        </div>
        <div class="col-lg-3" align="center">
        Click:<br />
        <input type="button" value="Search" class="btn btn-success" name="subcandidatesearchbtn" id="subcandidatesearchbtn">
        </div>
        </div>
        ';
    }

    if(isset($_POST['subcandidatesearchbtn'])){
        //Array ( [highedu] => Array ( [0] => B.Tech [1] => B.Sc ) 
        //                [city] => Array ( [0] => Nellore [1] => Guntur ) 
        //                [language] => Array ( [0] => Tamil ) 
        //                [skill] => Array ( [0] => Java Script [1] => C++ Programming ) 
        //                [percentage] => Array ( [0] => ssc_above 70% [1] => inter_above 70% )
        echo '<div class="col-lg-3"><input type="button" class="btn btn-success" value="<- Modify Search" id="candidatesearch" name="candidatesearch"></div><br /><br />';

        $highedu="";
        $city="";
        $percentagesql="";
        $languagesql="";
        $skillsql="";

        if(!empty($_POST['highedu'])) {
            $highedu='where highedu="'.$_POST['highedu'][0].'"';
            for($i=1;$i<sizeof($_POST['highedu']);$i++)
                $highedu.=' or highedu="'.$_POST['highedu'][$i].'"';

        }

        if(!empty($_POST['city'])) {
            if(empty($_POST['highedu']))
                $city='where city="'.$_POST['city'][0].'"';
            else
                $city='and city="'.$_POST['city'][0].'"';
            for($i=1;$i<sizeof($_POST['city']);$i++)
                $city.=' or city="'.$_POST['city'][$i].'"';
        }

        if(!empty($_POST['percentage'])) {

            if($city=="" && $highedu=="")
                $percentagesql='where ';
            // $sql = "select candidateid,sscmarksgained/ssctotalmarks*100 as percentage from candidatetable where (sscmarksgained/ssctotalmarks*100>75 && sscmarksgained/ssctotalmarks*100<100)";

            if($_POST['percentage'][0]=="ssc_50% - 59%")
                $percentagesql.=' (sscmarksgained/ssctotalmarks*100>50 && sscmarksgained/ssctotalmarks*100<60) ';
            if($_POST['percentage'][0]=="ssc_60% - 69%")
                $percentagesql.=' (sscmarksgained/ssctotalmarks*100>60 && sscmarksgained/ssctotalmarks*100<70) ';
            if($_POST['percentage'][0]=="ssc_above 70%")
                $percentagesql.=' (sscmarksgained/ssctotalmarks*100>70) ';

            if($_POST['percentage'][0]=="inter_50% - 59%")
                $percentagesql.=' (intermarksgained/intertotalmarks*100>50 && intermarksgained/intertotalmarks*100<60) ';
            if($_POST['percentage'][0]=="inter_60% - 69%")
                $percentagesql.=' (intermarksgained/intertotalmarks*100>60 && intermarksgained/intertotalmarks*100<70) ';
            if($_POST['percentage'][0]=="inter_above 70%")
                $percentagesql.=' (intermarksgained/intertotalmarks*100>70) ';

            if($_POST['percentage'][0]=="degree_50% - 59%")
                $percentagesql.=' (degreemarksgained/degreetotalmarks*100>50 && degreemarksgained/degreetotalmarks*100<60) ';
            if($_POST['percentage'][0]=="degree_60% - 69%")
                $percentagesql.=' (degreemarksgained/degreetotalmarks*100>60 && degreemarksgained/degreetotalmarks*100<70) ';
            if($_POST['percentage'][0]=="degree_above 70%")
                $percentagesql.=' (degreemarksgained/degreetotalmarks*100>70) ';

            if($_POST['percentage'][0]=="master_50% - 59%")
                $percentagesql.=' (mastermarksgained/mastertotalmarks*100>50 && mastermarksgained/mastertotalmarks*100<60) ';
            if($_POST['percentage'][0]=="master_60% - 69%")
                $percentagesql.=' (mastermarksgained/mastertotalmarks*100>60 && mastermarksgained/mastertotalmarks*100<70) ';
            if($_POST['percentage'][0]=="master_above 70%")
                $percentagesql.=' (mastermarksgained/mastertotalmarks*100>70) ';

            for($i=1;$i<sizeof($_POST['percentage']);$i++){
                if($_POST['percentage'][$i]=="ssc_50% - 59%")
                    $percentagesql.='and (sscmarksgained/ssctotalmarks*100>50 && sscmarksgained/ssctotalmarks*100<60) ';
                if($_POST['percentage'][$i]=="ssc_60% - 69%")
                    $percentagesql.='and (sscmarksgained/ssctotalmarks*100>60 && sscmarksgained/ssctotalmarks*100<70) ';
                if($_POST['percentage'][$i]=="ssc_above 70%")
                    $percentagesql.='and (sscmarksgained/ssctotalmarks*100>70) ';

                if($_POST['percentage'][$i]=="inter_50% - 59%")
                    $percentagesql.='and (intermarksgained/intertotalmarks*100>50 && intermarksgained/intertotalmarks*100<60) ';
                if($_POST['percentage'][$i]=="inter_60% - 69%")
                    $percentagesql.='and (intermarksgained/intertotalmarks*100>60 && intermarksgained/intertotalmarks*100<70) ';
                if($_POST['percentage'][$i]=="inter_above 70%")
                    $percentagesql.='and (intermarksgained/intertotalmarks*100>70) ';

                if($_POST['percentage'][$i]=="degree_50% - 59%")
                    $percentagesql.='and (degreemarksgained/degreetotalmarks*100>50 && degreemarksgained/degreetotalmarks*100<60) ';
                if($_POST['percentage'][$i]=="degree_60% - 69%")
                    $percentagesql.='and (degreemarksgained/degreetotalmarks*100>60 && degreemarksgained/degreetotalmarks*100<70) ';
                if($_POST['percentage'][$i]=="degree_above 70%")
                    $percentagesql.='and (degreemarksgained/degreetotalmarks*100>70) ';

                if($_POST['percentage'][$i]=="master_50% - 59%")
                    $percentagesql.='and (mastermarksgained/mastertotalmarks*100>50 && mastermarksgained/mastertotalmarks*100<60) ';
                if($_POST['percentage'][$i]=="master_60% - 69%")
                    $percentagesql.='and (mastermarksgained/mastertotalmarks*100>60 && mastermarksgained/mastertotalmarks*100<70) ';
                if($_POST['percentage'][$i]=="master_above 70%")
                    $percentagesql.='and (mastermarksgained/mastertotalmarks*100>70) ';
            }

        }

        if(!empty($_POST['language'])) {
            $language='language="'.$_POST['language'][0].'"';
            for($i=1;$i<sizeof($_POST['language']);$i++)
                $language.=' or language="'.$_POST['language'][$i].'"';
            if(($highedu=="")&&($city==""))
                $languagesql="where candidateid IN (select candidateid from candidatelanguages where ".$language.")";
            else
                $languagesql="and candidateid IN (select candidateid from candidatelanguages where ".$language.")";
        }

        if(!empty($_POST['skill'])) {
            $skill='skill="'.$_POST['skill'][0].'"';
            for($i=1;$i<sizeof($_POST['skill']);$i++)
                $skill.=' or skill="'.$_POST['skill'][$i].'"';

            if(($highedu=="")&&($city=="")&&($languagesql==""))
                $skillsql="where candidateid IN (select candidateid from candidateskills where ".$skill.")";
            else
                $skillsql="and candidateid IN (select candidateid from candidateskill   s where ".$skill.")";
        }

        $sql="select candidateid,photopath,fullname,city,highedu from candidatetable ".$highedu." ".$city."  ".$percentagesql." ".$languagesql." ".$skillsql;
        $res=mysqli_query($con,$sql);
        if($res)
            while($info=mysqli_fetch_array($res)){
                echo '
                <div class="row"><div class="col-lg-8"><table class="table" border="0" style="background:#4dc6ff; border: 5px black;">
                <tr><td colspan="2"><strong>Candidate Id: </strong> '.$info['candidateid'].'</td></tr>
                <tr><td width="50%"><strong>Name: </strong> '.$info['fullname'].'</td><td rowspan="3"><div  width="100"><img align="right" src="'.$info['photopath'].'" width="90%" ></div></td></tr>
                <tr><td><strong>City: </strong>'.$info['city'].'</td></tr>
                <tr><td><strong>Educational Qualification: </strong>'.$info['highedu'].'</td></tr>
                </table></div></div>
                ';
        }
        else
            echo "<p class='well'>Sorry! No Results Match your Search Criteria.</p>";

        //print_r($_POST);
    }

    if(isset($_POST['applicationsbtn'])){

        echo "<h3>Recieved Applications</h3>";
        $sql="select fullname,candidateid,photopath from candidatetable where candidateid in (select candidateid from jobstatus where jobid in (select jobid from makeoffer where recruiterid='{$_COOKIE['userid']}'))";
        $res=mysqli_query($con,$sql);
        echo '<div class="row">' ;
        while($info=mysqli_fetch_array($res)){
            $sql="select jobtitle, jobid from makeoffer where jobid IN (select jobid from jobstatus where candidateid='{$info['candidateid']}')";
            $subres=mysqli_query($con,$sql);
            $subinfo=mysqli_fetch_array($subres);

            $sql="select status from jobstatus where jobid ='{$subinfo['jobid']}' and candidateid='{$info['candidateid']}'";
            $statusres=mysqli_query($con,$sql);
            $statusinfo=mysqli_fetch_array($statusres);

            echo '<div class="col-lg-3"><div>
            Applied for: <strong>'.$subinfo['jobtitle'].'</strong><br />
            Name: <strong>'.$info['fullname'].'</strong><br />
            <img class="img-responsive img-thumbnail" src="'.$info['photopath'].'" alt="Candidate Img"><br /><br />
            <div class="col-lg-3"><strong>ID: '.$info['candidateid'].'</strong><br /></div>
            <div align="right">';
            if($statusinfo['status']=='Accepted')
                echo'<input type="button" value="Accepted" class="btn btn-default">';
            else
                echo'<input type="button" value="Accept" class="btn btn-primary" name="accept" id="acceptjob '.$subinfo['jobid'].' '.$info['candidateid'].'">';
                
            echo'</div></div></div>';
        }
        echo '</div></div>';

    }

    if(isset($_POST['querybtn'])){

        $sql="select fullname from recruitertable where recruiterid='{$_COOKIE['userid']}'";
        $res=mysqli_query($con,$sql);
        $result=mysqli_fetch_array($res);

        $sql="select mailid,cell from mainlogin where userid='{$_COOKIE['userid']}'";
        $res=mysqli_query($con,$sql);
        $mresult=mysqli_fetch_array($res);
        echo'
        <div class="container">
        <div><h3>Send your Query or Feedback:</h3><br /></div>
        <div class="row">
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Full Name: </span>
        <input type="text" class="form-control" name="fullname" id="fullname" value="'.$result['fullname'].'">
        </div>
        <br />  
        </div>
        </div>
        <div class="row">
        <div class="col-lg-5">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Mail ID: </span>
        <input type="text" class="form-control" name="mailid" id="mailid" value="'.$mresult['mailid'].'">
        </div>
        <br />  
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Cell: </span>
        <input type="number" class="form-control" name="cell" id="cell" value="'.$mresult['cell'].'">
        </div>
        <br />  
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        Enter Your Query:
        <textarea cols="10" rows="8" class="form-control" name="querytext" id="querytext"></textarea>
        <br />                          
        </div>
        </div>
        <div class="row">
        <div class="col-lg-2">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Click: </span>
        <input type="button" class="btn btn-primary" name="addquery" id="addquery" value="Send">
        </div>
        <br />  
        </div>
        </div>
        </div>
        ';
    }

    if(isset($_POST['acceptjobbtn'])){
        //Array ( [jobid] => 576507ff6d995 57653ebda716c [acceptjobbtn] => true )
        //
        echo "<br /><br />";
        //$keywords = preg_split("/ */", $_POST['jobid']);
        $keywords = explode(" ", $_POST['jobid']);
        //print_r($keywords);

        $sql="update jobstatus set status='Accepted' where jobid='{$keywords[1]}' and candidateid='{$keywords[2]}'";
        //echo $sql."<br />";

        $res=mysqli_query($con,$sql);
        if($res)
            echo 'Thanks for Accepting. We sent the Request to the Candidate.<br />';
        else
            echo 'Sorry Something Went Wrong. Please Try Again.<br />';

        echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Clear" id="applications" name="applications"></div></div>';        
    }

    if(isset($_POST['addquerybtn'])){

        $uid=uniqid();
        $sql="insert into querytable values('".$uid."','".$_COOKIE['userid']."','".$_POST['fullname']."','".$_POST['mailid']."',".$_POST['cell'].",'".$_POST['querytext']."')";
        $res=mysqli_query($con,$sql);

        if($res)
            echo "Your Query has been succesfully submitted. Soon or Later we will respond you back. Thankyou";
        else
            echo "Sorry Something Went Wrong Try Again after sometime. Thankyou";

        echo '<div class="row"><div class="col-lg-2"><div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Click: </span>
        <input type="button" class="btn btn-alert" name="query" id="query" value="Back">
        </div></div></div>';
    }

    if(isset($_POST['notifybtn'])){
        echo '<div class="container">
        <div class="row">
        <div class="col-lg-3">
        <input type="button" value="Create a Job & Notify It" id="createjob" name="createjob" class="btn btn-primary">
        </div>
        <div class="col-lg-1">
        Or
        </div>
        <div class="col-lg-3">
        <input type="button" value="Create a Job Alert" id="createjobalert" name="createjobalert" class="btn btn-primary">
        </div>
        </div>';
    }

    if(isset($_POST['createjobbtn'])){
        echo '<div class="container">
        <div class="row">
        <div class="col-lg-2">
        <input class="btn btn-success" type="button" id="notify" value="<-- Go Back"/>
        </div>
        </div>
        <div><h3>Create a Job and Notify it</h3></div>
        <div class="row">
        <div class="col-lg-8">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Job Title: </span>
        <input type="text" class="form-control" name="jobtitle" id="jobtitle" placeholder="Enter Job Title">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
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
        <div class="col-lg-4">
        Select City:<br />
        <select name="city" id="city" class="form-control">
        <option></option>
        <option>Visakhapatnam</option>
        <option>Vijayawada</option>
        <option>Guntur</option>
        <option>Nellore</option>
        <option>Kurnool</option>
        <option>Tirupati</option>
        <option>Kakinada</option>
        <option>Kadapa</option>
        <option>Rajahmundry</option>
        <option>Anantapur</option>
        <option>Vizianagaram</option>
        <option>Eluru</option>
        <option>Ongole</option>
        <option>Nandyal</option>
        <option>Machilipatnam</option>
        <option>Adoni</option>
        <option>Tenali</option>
        <option>Proddatur</option>
        <option>Chittoor</option>
        <option>Hindupur</option>
        <option>Bhimavaram</option>
        <option>Madanapalle</option>
        <option>Guntakal</option>
        <option>Srikakulam</option>
        <option>Dharmavaram</option>
        <option>Gudivada</option>
        <option>Narasaraopet</option>
        <option>Tadipatri</option>
        <option>Tadepalligudem</option>
        <option>Amaravati</option>
        <option>Chilakaluripet</option>
        </select>
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Job Salary: </span>
        <input type="number" min="0" class="form-control" name="jobsalary" id="jobsalary">
        </div><br />
        </div>
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Mail Address: </span>
        <input type="email" class="form-control" name="mailid" id="mailid">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8">
        <textarea class="form-control" col="40" name="jobdescription" id="jobdescription" placeholder="Enter Job Description"></textarea>
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-3">
        <input type="button" class="btn btn-primary" value="Save" id="notifysave" name="notifysave">
        </div>
        </div>
        </div>

        ';
    }

    if(isset($_POST['createjobalertbtn'])){
        echo '
        <div class="container">
        <div class="row">
        <div class="col-lg-2">
        <input class="btn btn-success" type="button" id="notify" value="<-- Go Back"/>
        </div>
        </div>
        <div><h3>Create an Alert</h3></div>
        <div class="row">
        <div class="col-lg-8">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Alert Title: </span>
        <input type="text" class="form-control" name="alerttitle" id="alerttitle" placeholder="Enter Alert Title">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8">
        Enter the Job Alert Desciption:
        <textarea class="form-control" col="40" name="alertdescription" id="alertdescription" placeholder="Enter Job Alert Description"></textarea>
        </div><br />
        </div>
        <div class="row"><br />
        <div class="col-lg-5">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Attach a File: </span>
        <input type="file" accept=".pdf,.doc,.txt,.jpg,.png" class="form-control" name="alertfile">
        </div><br />
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Click: </span>
        <input type="submit" class="btn btn-primary" value="Save" id="savealert" name="savealert">
        </div><br />
        </div>
        </div>
        </div>
        ';
    }

    if(isset($_POST['notifysavebtn'])){
        //Array ( [jobtitle] => [rolelist] => Array ( [0] => Trainer [1] => Accountant ) [city] => Visakhapatnam [jobsalary] => [mailid] => [jobdescription] => [makeoffersavebtn] => true )
        $uid=uniqid();
        $sql="insert into makeoffer values('$uid','{$_COOKIE['userid']}','{$_POST['jobtitle']}','{$_POST['city']}',{$_POST['jobsalary']},'{$_POST['mailid']}','{$_POST['jobdescription']}')";
        $res=mysqli_query($con,$sql);
        if($res){
            for($i=0;$i<sizeof($_POST['rolelist']);$i++)
                mysqli_query($con,"insert into jobrolelist values('$uid','{$_POST['rolelist'][$i]}');");
            echo 'Congratulations...! A Job has been created by You.<br />';
            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Go Back" id="makeoffer" name="makeoffer"></div></div>';
        }
        else
        {   
            echo 'Sorry Something Went Wrong! Please Try Again in a moment<br />';
            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Go Back" id="notify" name="notify"></div></div>';
        }

    }

    if(isset($_POST['makeofferbtn'])){
        echo'
        <div class="container">
        <div class="row">
        <h3>Make an Offer</h3><br />
        </div>
        <div class="row">
        <div class="col-lg-8"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Candidate UID: </span>
        <input type="text" class="form-control" name="uid" id="uid" placeholder="Enter UID">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Position Offered: </span>
        <input type="text" class="form-control" name="position" id="position" placeholder="Position">
        </div>
        </div>
        <div class="col-lg-4"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Type of Recruitment: </span>
        <input type="text" class="form-control" id="recruitmenttype" name="recruitmenttype" placeholder="Recruitment Type">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Package Offered: </span>
        <input type="text" class="form-control" name="package" id="package" placeholder="Package">
        </div>
        </div>
        <div class="col-lg-4"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Work Location: </span>
        <input type="text" class="form-control" name="worklocation" id="worklocation" placeholder="Work Location">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">If any Bond Exists, Enter the Tenure: </span>
        <input type="text" class="form-control" name="bondtenure" id="bondtenure" placeholder="XX Months">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-2"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Give: </span>
        <input type="button" class="btn btn-primary" name="saveoffer" id="saveoffer" value="Offer">
        </div>
        </div>
        </div>
        </div>
        ';
    }

    if(isset($_POST['saveofferbtn'])){
        //Array ( [uid] => uid [position] => pos [recruitmenttype] => dcfds [package] => wsdcfdsq [work] => qwdcds [bondtenure] => qsdcvcx [saveofferbtn] => true )
        $sql="select candidateid from candidatetable where candidateid='{$_POST['uid']}'";
        $res=mysqli_query($con,$sql);
        $candset=mysqli_fetch_array($res);
        if($candset['candidateid']==$_POST['uid']){
            $uid=uniqid();
            $sql="insert into offers values('{$uid}','{$_COOKIE['userid']}','{$_POST['uid']}','{$_POST['position']}','{$_POST['recruitmenttype']}','{$_POST['package']}','{$_POST['worklocation']}','{$_POST['bondtenure']}','Offered');";
            $res=mysqli_query($con,$sql);
            if($res){
                echo'Offer has been Created and It has been sent to the Candidate<br />';
            }
            else
                echo'Offer has not been Created. Please Try Again<br />';
        }
        else
        {
            echo "Sorry, Invalid Candidate Id. Please Check the UID you Entered.<br />";
        }
        echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Go Back" id="makeoffer" id="makeoffer"></div></div>';
    }
?>
