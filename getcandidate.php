<?php
    include ('head.inc');

    if(isset($_POST['viewhome'])){
        error_reporting(1);
        $sql="select `fullname`, `dob`, `fathername`, `mothername`, `permanentaddress`, `currentaddress`, `photopath`, `highedu`, `city`, `sscrollnum`, `ssctotalmarks`, `sscmarksgained`, `sscinstitute`, `sscpassyear`, `sscstudycertificate`, `sscoriginalcertificate`, `ssctransfercertificate`, `interrollnum`, `intertotalmarks`, `intermarksgained`, `interinstitute`, `interpassyear`, `interbranch`, `interstudycertificate`, `interoriginalcertificate`, `intertransfercertificate`, `degreerollnum`, `degreetotalmarks`, `degreemarksgained`, `degreeinstitute`, `degreepassyear`, `degreebranch`, `degreestudycertificate`, `degreeoriginalcertificate`, `degreetransfercertificate`, `masterrollnum`, `mastertotalmarks`, `mastermarksgained`, `masterinstitute`, `masterpassyear`, `masterbranch`, `masterstudycertificate`, `masteroriginalcertificate`, `mastertransfercertificate` from candidatetable WHERE `candidateid` = '{$_COOKIE['userid']}';";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $info=mysqli_fetch_array($res);

            echo '
            <div class="container">
            <div class="row">
            <div class="col-lg-9">
            <table class="table" border="0">
            <tr><td colspan="2"><strong>UID: </strong>'.$_COOKIE['userid'].'</td><td width="40%" rowspan="5"><img src="'.$info['photopath'].'" width="90%"></td></tr>
            <tr><td colspan="2"><strong>Full Name: </strong>'.ucfirst($info['fullname']).'</td></tr>
            <tr><td><strong>Father Name: </strong>'.ucfirst($info['fathername']).'</td><td><strong>Mother Name: </strong>'.ucfirst($info['mothername']).'</td></tr>
            <tr><td><strong>Date of Birth:</strong> '.$info['dob'].'</td><td><strong>Highest Education:</strong> '.$info['highedu'].'</td></tr>
            <tr><td colspan="2"><strong>City:</strong> '.$info['city'].'</td></tr>
            <tr><td><strong>Roles Interested:<br /></strong>';
            $sql="SELECT candidaterolelist FROM `candidaterolelist` where candidateid='{$_COOKIE['userid']}'";
            $subres=mysqli_query($con,$sql);
            while($subinfo=mysqli_fetch_array($subres)){
                echo $subinfo['candidaterolelist'].', ';
            }
            echo '</td><td><strong>Skills Known:<br /></strong>';
            $sql="SELECT skill FROM `candidateskills` where candidateid='{$_COOKIE['userid']}'";
            $subres=mysqli_query($con,$sql);
            while($subinfo=mysqli_fetch_array($subres)){
                echo $subinfo['skill'].', ';
            }
            echo '</td><td><strong>Languages Known:<br /></strong>';
            $sql="SELECT language FROM `candidatelanguages` where candidateid='{$_COOKIE['userid']}'";
            $subres=mysqli_query($con,$sql);
            while($subinfo=mysqli_fetch_array($subres)){
                echo $subinfo['language'].', ';
            }
            echo'
            </tr>
            <tr><td colspan="3"><strong><h4>SSC or Equivalent Details:</h4></strong></td></tr>
            <tr><td><strong>Roll Num: </strong> '.$info['sscrollnum'].'</td><td><strong>Institute Name:</strong> '.$info['sscinstitute'].'</td><td><strong>Pass Year:</strong> '.$info['sscpassyear'].'</td></tr>
            <tr><td><strong>Total Marks: </strong> '.$info['ssctotalmarks'].'</td><td><strong>Marks Scored: </strong> '.$info['sscmarksgained'].'</td><td><strong>Average: </strong> '.$sscavg.'</td></tr>

            <tr><td><strong>SSC Study Certificate: </strong>'.$sscstudycertificate.'</td><td><strong>SSC Original Certificate: </strong>'.$sscoriginalcertificate.'</td><td><strong>SSC Transfer Certificate: </strong> '.$ssctransfercertificate.'</td></tr>
            <tr><td colspan="3"><strong><h4>Intermediate or Equivalent Details:</h4></strong></td></tr>
            <tr><td><strong>Roll Num: </strong> '.$info['interrollnum'].'</td><td><strong>Institute Name:</strong> '.$info['interinstitute'].'</td><td><strong>Pass Year:</strong> '.$info['interpassyear'].'</td></tr>
            <tr><td><strong>Total Marks: </strong> '.$info['intertotalmarks'].'</td><td><strong>Marks Scored: </strong> '.$info['intermarksgained'].'</td><td><strong>Average: </strong> '.$interavg.'</td></tr>
            <tr><td colspan="3"><strong>Branch: </strong> '.$info['interbranch'].'</td></tr>

            <tr><td><strong>Inter Study Certificate: </strong>'.$interstudycertificate.'</td><td><strong>Inter Original Certificate: </strong>'.$interoriginalcertificate.'</td><td><strong>Inter Transfer Certificate: </strong> '.$intertransfercertificate.'</td></tr>
            <tr><td colspan="3"><strong><h4>Degree or Equivalent Details:</h4></strong></td></tr>
            <tr><td><strong>Roll Num: </strong> '.$info['degreerollnum'].'</td><td><strong>Institute Name:</strong> '.$info['degreeinstitute'].'</td><td><strong>Pass Year:</strong> '.$info['degreepassyear'].'</td></tr>
            <tr><td><strong>Total Marks: </strong> '.$info['degreetotalmarks'].'</td><td><strong>Marks Scored: </strong> '.$info['degreemarksgained'].'</td><td><strong>Average: </strong> '.$degreeavg.'</td></tr>
            <tr><td colspan="3"><strong>Branch: </strong> '.$info['degreebranch'].'</td></tr>

            <tr><td><strong>Degree Study Certificate: </strong>'.$degreestudycertificate.'</td><td><strong>Degree Original Certificate: </strong>'.$degreeoriginalcertificate.'</td><td><strong>Degree Transfer Certificate: </strong> '.$degreetransfercertificate.'</td></tr>
            <tr><td colspan="3"><strong><h4>Master or Equivalent Details:</h4></strong></td></tr>
            <tr><td><strong>Roll Num: </strong> '.$info['masterrollnum'].'</td><td><strong>Institute Name:</strong> '.$info['masterinstitute'].'</td><td><strong>Pass Year:</strong> '.$info['masterpassyear'].'</td></tr>
            <tr><td><strong>Total Marks: </strong> '.$info['mastertotalmarks'].'</td><td><strong>Marks Scored: </strong> '.$info['mastermarksgained'].'</td><td><strong>Average: </strong> '.$masteravg.'</td></tr>
            <tr><td colspan="3"><strong>Branch: </strong> '.$info['masterbranch'].'</td></tr>

            <tr><td><strong>Master Study Certificate: </strong>'.$masterstudycertificate.'</td><td><strong>Master Original Certificate: </strong>'.$masteroriginalcertificate.'</td><td><strong>Master Transfer Certificate: </strong> '.$mastertransfercertificate.'</td></tr>
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
        echo '
        <div class="container">
        <h2 class="page-head">Complete Your Profile</h2>
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
        <span class="input-group-addon" id="sizing-addon2">Father Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Father Name" name="fathername" id="fathername">
        </div>
        <br />
        </div>
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Mother Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Mother Name" name="mothername" id="mothername">
        </div>
        <br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Dob: </span>
        <input type="date" class="form-control" name="dob" id="dob">
        </div>
        <br />
        </div>
        <div class="col-lg-4">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Highest Edu. Qualification: </span>
        <input type="text" class="form-control" placeholder="Enter your Highest Edu. Qualification" name="highedu" id="highedu">
        </div>
        <br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        Enter Your Current Address:
        <textarea cols="10" rows="8" class="form-control" name="currentaddress" id="currentaddress"></textarea>
        </div>
        <div class="col-lg-4">
        Enter Your Permanent Address:
        <textarea cols="10" rows="8" class="form-control" name="permanentaddress" id="permanentaddress"></textarea>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-4">
        City interested to Work:<br />
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
        <div class="col-lg-4"><br />
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Choose a Photo: </span>
        <input type="file" attach=".jpg,.png,.gif" class="form-control" name="uploadphoto" id="uploadphoto">
        </div>
        </div><br />
        </div><br />

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
        </div><br />
        <div class="container">
        <strong>SSC or Equivalent:</strong><br />
        <div class="row">
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Roll Number: </span>
        <input type="text" class="form-control" placeholder="Enter your Rollnum" name="sscrollnum" id="sscrollnum">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Total Marks: </span>
        <input type="number" class="form-control" name="ssctotalmarks" id="ssctotalmarks">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Marks Gained: </span>
        <input type="number" class="form-control" name="sscmarksgained" id="sscmarksgained">
        </div>
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Institute Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Institute Name" name="sscinstitute" name="sscinstitute">
        </div><br />
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Passed Year: </span>
        <input type="text" class="form-control" name="sscpassyear" id="sscpassyear">
        </div><br />
        </div>
        </div>
        </div>
        <div class="container">
        <strong>Inter or Equivalent:</strong><br />
        <div class="row">
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Roll Number: </span>
        <input type="text" class="form-control" placeholder="Enter your Rollnum" name="interrollnum" id="interrollnum">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Total Marks: </span>
        <input type="number" class="form-control" name="intertotalmarks" id="intertotalmarks">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Marks Gained: </span>
        <input type="number" class="form-control" name="intermarksgained" id="intermarksgained">
        </div>
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Institute Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Institute Name" name="interinstitute" id="interinstitute">
        </div><br />
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Passed Year: </span>
        <input type="text" class="form-control" name="interpassyear" id="interpassyear">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Stream or Branch: </span>
        <input type="text" class="form-control" placeholder="Enter Branch Name" name="interbranch" id="interbranch">
        </div><br />
        </div>
        </div>
        </div>
        <div class="container">
        <strong>Degree or Equivalent:</strong><br />
        <div class="row">
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Roll Number: </span>
        <input type="text" class="form-control" placeholder="Enter your Rollnum" name="degreerollnum" id="degreerollnum">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Total Marks: </span>
        <input type="number" class="form-control" name="degreetotalmarks" id="degreetotalmarks">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Marks Gained: </span>
        <input type="number" class="form-control" name="degreemarksgained" id="degreemarksgained">
        </div>
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Institute Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Institute Name" name="degreeinstitute" name="degreeinstitute">
        </div><br />
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Passed Year: </span>
        <input type="text" class="form-control" name="degreepassyear" id="degreepassyear">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Stream or Branch: </span>
        <input type="text" class="form-control" placeholder="Enter Branch Name" name="degreebranch" id="degreebranch">
        </div><br />
        </div>
        </div>
        </div>
        <div class="container">
        <strong>Master or Equivalent:</strong><br />
        <div class="row">
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Roll Number: </span>
        <input type="text" class="form-control" placeholder="Enter your Rollnum" name="masterrollnum" id="masterrollnum">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Total Marks: </span>
        <input type="number" class="form-control" name="mastertotalmarks" id="mastertotalmarks">
        </div>
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Marks Gained: </span>
        <input type="number" class="form-control" name="mastermarksgained" id="mastermarksgained">
        </div>
        </div>
        </div>
        <div class="row"><br />
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Institute Name: </span>
        <input type="text" class="form-control" placeholder="Enter your Institute Name" name="masterinstitute" name="masterinstitute">
        </div><br />
        </div>
        <div class="col-lg-3">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Passed Year: </span>
        <input type="text" class="form-control" name="masterpassyear" id="masterpassyear">
        </div><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        <div class="input-group">
        <span class="input-group-addon" id="sizing-addon2">Enter Stream or Branch: </span>
        <input type="text" class="form-control" placeholder="Enter Branch Name" name="masterbranch" id="masterbranch">
        </div><br />
        </div>
        </div>
        </div>
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
        unset($_POST['profilesavebtn']);

        if(!empty($_FILES['certificatepath']['name'])){
            if($_FILES['certificatepath']["type"]=='image/jpeg')
                $type='.jpg';
            elseif($_FILES['certificatepath']["type"]=='image/png')
                $type='.png';
            elseif($_FILES['certificatepath']["type"]=='image/gif')
                $type='.gif';

            $imgid=uniqid();
            $target ='certificates/'.$imgid.$type;
            if(move_uploaded_file($_FILES['certificatepath']['tmp_name'], $target))
            {             
                $sql="UPDATE `candidatetable` SET `{$_POST['degreetype']}{$_POST['certificatetype']}certificate` = '{$target}' WHERE `candidatetable`.`candidateid` = '{$_COOKIE['userid']}';";
                $res=mysqli_query($con,$sql);
                if($res)
                    echo ucfirst($_POST['degreetype']).' '.ucfirst($_POST['certificatetype']).' certificate has been successfully updated<br />';
                else
                    echo ucfirst($_POST['degreetype']).' '.ucfirst($_POST['certificatetype']).' certificate has not been successfully updated<br />';
            }
            else
                echo "The Certificate hasn`t been uploaded. Please Try Again.<br />";

            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Clear" id="addcertificates" name="addcertificates"></div></div>';
        }
        else
        {
            //print_r($_POST);
            if(!empty($_FILES['uploadphoto']['name'])){
                if($_FILES['uploadphoto']["type"]=='image/jpeg')
                    $type='.jpg';
                elseif($_FILES['uploadphoto']["type"]=='image/png')
                    $type='.png';
                elseif($_FILES['uploadphoto']["type"]=='image/gif')
                    $type='.gif';

                /*
                if (!unlink($file))
                echo ("Error deleting $file");
                else
                echo ("Deleted $file");
                */               
                $imgid=uniqid();
                $target ='candidates/'.$imgid.$type;
                if(move_uploaded_file($_FILES['uploadphoto']['tmp_name'], $target))
                {             
                    $sql="UPDATE `candidatetable` SET `photopath` = '{$target}' WHERE `candidatetable`.`candidateid` = '{$_COOKIE['userid']}';";
                    $res=mysqli_query($con,$sql);
                    if($res)
                        echo 'Profile Photo has been successfully updated<br />';
                    else
                        echo 'Profile Photo has not been successfully updated<br />';
                }
                else
                    echo "<strong>Profile Photo hasn`t been uploaded. Please Try Again.<br /></strong>";

            }
            /*
            Array ( [fullname] => [fathername] => [mothername] => [dob] => [highedu] => [currentaddress] => [permanentaddress] => [city] => Array ( [0] => Visakhapatnam ) [sscrollnum] => [ssctotalmarks] => [sscmarksgained] => [sscinstitute] => [sscpassyear] => [interrollnum] => [intertotalmarks] => [intermarksgained] => [interinstitute] => [interpassyear] => [degreerollnum] => [degreetotalmarks] => [degreemarksgained] => [degreeinstitute] => [degreepassyear] => [masterrollnum] => [mastertotalmarks] => [mastermarksgained] => [masterinstitute] => [masterpassyear] => [profilesavebtn] => true )

            $certificatearray=array();
            $x=0;
            if(!empty($_FILES['sscstudycertificate']['name'])){
            if($_FILES['sscstudycertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['sscstudycertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['sscstudycertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $sscstudycertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['sscstudycertificate']['tmp_name'], $sscstudycertificate ))
            {
            $certificatearr[$x]=$sscstudycertificate;
            $x++;
            echo "SSC Study Certificate has been successfully updated<br />";
            }
            else
            echo "SSC Study Certificate has not been successfully updated<br />";
            }

            if(!empty($_FILES['sscoriginalcertificate']['name'])){
            if($_FILES['sscoriginalcertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['sscoriginalcertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['sscoriginalcertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $sscoriginalcertificate='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['sscoriginalcertificate']['tmp_name'], $sscoriginalcertificate))
            {
            $certificatearr[$x]=$sscoriginalcertificate;
            $x++;
            echo "SSC Original Certificate has been successfully updated<br />";
            }
            else
            echo "SSC Original Certificate has not been successfully updated<br />";
            }

            if(!empty($_FILES['ssctransfercertificate']['name'])){
            if($_FILES['ssctransfercertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['ssctransfercertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['ssctransfercertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $ssctransfercertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['ssctransfercertificate']['tmp_name'], $ssctransfercertificate ))
            {
            $certificatearr[$x]=$ssctransfercertificate;
            $x++;
            echo "SSC Transfer Certificate has been successfully updated<br />";
            }
            else
            echo "SSC Transfer Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['interstudycertificate']['name'])){
            if($_FILES['interstudycertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['interstudycertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['interstudycertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $interstudycertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['interstudycertificate']['tmp_name'], $interstudycertificate ))
            {
            $certificatearray[$x]=$interstudycertificate;
            $x++;
            echo "inter Study Certificate has been successfully updated<br/>";
            }
            else
            echo "inter Study Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['interoriginalcertificate']['name'])){
            if($_FILES['interoriginalcertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['interoriginalcertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['interoriginalcertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $interoriginalcertificate='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['interoriginalcertificate']['tmp_name'], $interoriginalcertificate))
            {
            $certificatearray[$x]=$interoriginalcertificate;
            $x++;
            echo "inter Original Certificate has been successfully updated<br/>";
            }
            else
            echo "inter Original Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['intertransfercertificate']['name'])){
            if($_FILES['intertransfercertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['intertransfercertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['intertransfercertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $intertransfercertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['intertransfercertificate']['tmp_name'], $intertransfercertificate ))
            {
            $certificatearray[$x]=$intertransfercertificate;
            $x++;
            echo "inter Transfer Certificate has been successfully updated<br/>";
            }
            else
            echo "inter Transfer Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['degreestudycertificate']['name'])){
            if($_FILES['degreestudycertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['degreestudycertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['degreestudycertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $degreestudycertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['degreestudycertificate']['tmp_name'], $degreestudycertificate))
            {
            $certificatearr[$x]=$degreestudycertificate;
            $x++;
            echo "degree Study Certificate has been successfully updated<br/>";
            }
            else
            echo "degree Study Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['degreeoriginalcertificate']['name'])){
            if($_FILES['degreeoriginalcertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['degreeoriginalcertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['degreeoriginalcertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $degreeoriginalcertificate='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['degreeoriginalcertificate']['tmp_name'], $degreeoriginalcertificate))
            {
            $certificatearray[$x]=$degreeoriginalcertificate;
            $x++;
            echo "degree Original Certificate has been successfully updated<br/>";
            }
            else
            echo "degree Original Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['degreetransfercertificate']['name'])){
            if($_FILES['degreetransfercertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['degreetransfercertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['degreetransfercertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $degreetransfercertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['degreetransfercertificate']['tmp_name'], $degreetransfercertificate))
            {
            $certificatearray[$x]=$degreetransfercertificate;
            $x++;
            echo "degree Transfer Certificate has been successfully updated<br/>";
            }
            else
            echo "degree Transfer Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['masterstudycertificate']['name'])){
            if($_FILES['masterstudycertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['masterstudycertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['masterstudycertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $masterstudycertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['masterstudycertificate']['tmp_name'], $masterstudycertificate))
            {
            $certificatearr[$x]=$masterstudycertificate;
            $x++;
            echo "master Study Certificate has been successfully updated<br/>";
            }
            else
            echo "master Study Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['masteroriginalcertificate']['name'])){
            if($_FILES['masteroriginalcertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['masteroriginalcertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['masteroriginalcertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $masteroriginalcertificate='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['masteroriginalcertificate']['tmp_name'], $masteroriginalcertificate))
            {
            $certificatearray[$x]=$masteroriginalcertificate;
            $x++;
            echo "master Original Certificate has been successfully updated<br/>";
            }
            else
            echo "master Original Certificate has not been successfully updated<br/>";
            }

            if(!empty($_FILES['mastertransfercertificate']['name'])){
            if($_FILES['mastertransfercertificate']["type"]=='image/jpeg')
            $type='.jpg';
            elseif($_FILES['mastertransfercertificate']["type"]=='image/png')
            $type='.png';
            elseif($_FILES['mastertransfercertificate']["type"]=='image/gif')
            $type='.gif';

            $imgid=uniqid();
            $mastertransfercertificate ='certificates/'.$imgid.$type;
            if (move_uploaded_file($_FILES['mastertransfercertificate']['tmp_name'], $mastertransfercertificate))
            {
            $certificatearray[$x]=$mastertransfercertificate;
            $x++;
            echo "master Transfer Certificate has been successfully updated<br/>";
            }
            else
            echo "master Transfer Certificate has not been successfully updated<br/>";
            }
            echo "<br />";
            print_r($certificatearray);
            // sscstudycertificate, sscoriginalcertificate, ssctransfercertificate, interstudycertificate, interoriginalcertificate, intertransfercertificate, degreestudycertificate, degreeoriginalcertificate, degreetransfercertificate, masterstudycertificate, masteroriginalcertificate, mastertransfercertificate
            $certificatekeys=array();
            $certificatekeys=array_keys($certificatearray);

            /*
            for($i=0;$i<sizeof($certificatekeys);$i++){
            if($certificatearray[$certificatekeys[$i]]!=null){
            $sql="UPDATE `candidatetable` SET `{$certificatekeys[$i]}` = '{$certificatearray[$certificatekeys[$i]]}' WHERE `candidatetable`.`candidateid` = '{$_COOKIE['userid']}';";
            $res=mysqli_query($con,$sql);
            if($res)
            echo ucfirst($certificatekeys[$i]).' has been successfully updated bro<br />';
            else
            echo ucfirst($certificatekeys[$i]).' has not been successfully updated bro<br />';
            }
            }

            $sql="UPDATE `candidatetable` SET sscstudycertificate='.{$sscstudycertificate}.', sscoriginalcertificate='.{$sscoriginalcertificate}.', ssctransfercertificate='.{$ssctransfercertificate}.', interstudycertificate='.{$interstudycertificate}.', interoriginalcertificate='.{$interoriginalcertificate}.', intertransfercertificate='.{$intertransfercertificate}.',degreestudycertificate='.{$degreestudycertificate}.', degreeoriginalcertificate='.{$degreeoriginalcertificate}.', degreetransfercertificate='.{$degreetransfercertificate}.', masterstudycertificate='.{$masterstudycertificate}.', masteroriginalcertificate='.{$masteroriginalcertificate}.', mastertransfercertificate='.{$mastertransfercertificate}.',  WHERE `candidatetable`.`candidateid` = '{$_COOKIE['userid']}';";
            $res=mysqli_query($con,$sql);
            if(!$res)
            echo "Sorry Something Went Wrong with Certificates .Please Try Again".
            */

            $keys=array();
            $keys=array_keys($_POST);
            $totcount=sizeof($keys);
            $totcount--;
            for($i=0;$i<$totcount;$i++){
                if($_POST[$keys[$i]]!=null){
                    if($keys[$i]!='languagelist'){
                        if($keys[$i]!='skilllist'){
                            if($keys[$i]!='rolelist'){

                                $sql="UPDATE `candidatetable` SET `{$keys[$i]}` = '{$_POST[$keys[$i]]}' WHERE `candidatetable`.`candidateid` = '{$_COOKIE['userid']}';";
                                $res=mysqli_query($con,$sql);
                                if($res)
                                    echo ucfirst($keys[$i]).' has been successfully updated<br />';
                                else
                                    echo ucfirst($keys[$i]).' has not been successfully updated<br />';

                            }
                        }
                    }
                }
            }
            if(isset($_POST['rolelist']))
                for($i=0;$i<sizeof($_POST['rolelist']);$i++){
                    $res=mysqli_query($con,"insert into candidaterolelist values('{$_COOKIE['userid']}','{$_POST['rolelist'][$i]}');");
                    if($res){
                        echo 'Role '.$_POST['rolelist'][$i].' has been successfully updated<br />';
                    }
                    else
                        echo 'Role '.$_POST['rolelist'][$i].' has not been successfully updated<br />';
            }

            if(isset($_POST['languagelist']))
                for($i=0;$i<sizeof($_POST['languagelist']);$i++){
                    $res=mysqli_query($con,"insert into candidatelanguages values('{$_COOKIE['userid']}','{$_POST['languagelist'][$i]}');");
                    if($res){
                        echo 'Language '.$_POST['languagelist'][$i].' has been successfully updated<br />';
                    }
                    else
                        echo 'Language '.$_POST['languagelist'][$i].' has not been successfully updated<br />';
            }
            if(isset($_POST['skilllist']))
                for($i=0;$i<sizeof($_POST['skilllist']);$i++){
                    $res=mysqli_query($con,"insert into candidateskills values('{$_COOKIE['userid']}','{$_POST['skilllist'][$i]}');");
                    if($res){
                        echo 'Skill '.$_POST['skilllist'][$i].' has been successfully updated<br />';
                    }
                    else
                        echo 'Skill '.$_POST['skilllist'][$i].' has not been successfully updated<br />';
            }

            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Clear" id="profile" name="profile"></div></div>';
        }
    }

    if(isset($_POST['addcertificatesbtn'])){
        echo'
        <div class="container">
        <div class="row">
        <div class="col-lg-4">
        Select the Certificate:<br />
        <input type="file" accept=".jpg,.png,.gif" name="certificatepath" class="form-control"><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-5">
        Select Type of the Certificate:<br />
        <select class="form-control" name="certificatetype">
        <option></option>
        <option value="study">Study Certificate</option>
        <option value="original">Orignal Certificate</option>
        <option value="transfer">Transfer Certificate</option>
        </select><br />
        </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
        Select Type of the Degree:<br />
        <select class="form-control" name="degreetype">
        <option></option>
        <option value="ssc">SSC or Equivalent</option>
        <option value="inter">Intermediate or Equivalent</option>
        <option value="degree">Degree or Equivalent</option>
        <option value="master">Master Degree or Equivalent</option>
        </select><br />
        </div>
        </div>
        <div class="row">
        <br />
        <div class="col-lg-4">
        Click:<br />
        <input type="submit" name="certificatesubmit" id="certificatesubmit" class="btn btn-primary" value="Add Certificate"><br />
        </div>
        </div>
        </div>
        ';
        /* echo '<div class="btn-group btn-group-justified" role="group">
        <div class="btn-group" role="group">
        <input type="button" class="btn btn-default" name="degree[]" value="SSC">
        </div>
        <div class="btn-group" role="group">
        <input type="button" class="btn btn-default" name="degree[]" value="Intermediate">
        </div>
        <div class="btn-group" role="group">
        <input type="button" class="btn btn-default" name="degree[]" value="Degree">
        </div>
        <div class="btn-group" role="group">
        <input type="button" class="btn btn-default" name="degree[]" value="Master">
        </div>
        </div>';
        */
    }

    if(isset($_POST['notificationbtn'])){

        echo '<div class="container">
        <div class="row">
        <div class="col-lg-2">
        <input type="button" value="View Prefered Jobs" id="prefferedjobs" name="prefferedjobs" class="btn btn-primary">
        </div>
        <div class="col-lg-1">
        Or
        </div>
        <div class="col-lg-2">
        <input type="button" value="View Other Jobs" id="otherjobs" name="otherjobs" class="btn btn-primary">
        </div>
        <div class="col-lg-1">
        Or
        </div>
        <div class="col-lg-2">
        <input type="button" value="View Job Alert" id="viewjobalerts" name="viewjobalerts" class="btn btn-primary">
        </div>
        </div>';

    }

    if(isset($_POST['prefferedjobsbtn'])){

        echo '<div class="container">
        <div class="row">
        <div class="col-lg-2">
        <input class="btn btn-success" type="button" id="notification" value="<-- Go Back"/>
        </div>
        </div>
        <h3>Jobs based on your preferences.<br /></h3>';
        $sql="select jobid, recruiterid, jobtitle, city, jobsalary, mailid, jobdescription, date from makeoffer where jobid in(select jobid from jobrolelist where jobrolelist IN (select candidaterolelist from candidaterolelist where candidateid='{$_COOKIE['userid']}')) ORDER BY `date` DESC";
        $res=mysqli_query($con,$sql);
        $i=1;
        while($info=mysqli_fetch_array($res)){

            $sql="select companyname from recruitertable where recruiterid='{$info['recruiterid']}'";
            $subres=mysqli_query($con,$sql);
            $sinfo=mysqli_fetch_array($subres);

            echo '<div class="row"><div class="col-lg-8"><table class="table" border="1">                         
            <tr><td colspan="2"><strong>Job Id: </strong> '.$info['jobid'].'</td></tr>
            <tr><td><strong>Title: </strong> '.$info['jobtitle'].'</td><td><strong>City: </strong>'.$info['city'].'</td></tr>
            <tr><td><strong>Salary: </strong> '.$info['jobsalary'].'</td><td><strong>Company: </strong>'.$sinfo['companyname'].'</td></tr>
            <tr><td colspan="2"><strong>Job Description: </strong><span class="teaser">'.substr($info['jobdescription'],0,10).'</span>
            <span class="complete">'.substr($info['jobdescription'],10,strlen($info['jobdescription'])).'</span><span class="more" id="ml'.$i.'">more...</span></td></tr>
            </table></div></div>';

            $sql="select status from jobstatus where jobid='{$info['jobid']}' and candidateid='{$_COOKIE['userid']}'";
            $subres=mysqli_query($con,$sql);
            $status=mysqli_fetch_array($subres);
            if(strtoupper($status['status'])==strtoupper('Applied'))
                echo '<div class="row"><div class="col-lg-3" align="left">Posted On: <strong>'.$info['date'].'</strong></div><div class="col-lg-3"></div><div class="col-lg-2" align="left"><input type="button" class="btn-default btn" value="Applied" ></div></div><br /><br />';
            else
                echo '<div class="row"><div class="col-lg-3" align="left">Posted On: <strong>'.$info['date'].'</strong></div><div class="col-lg-3"></div><div class="col-lg-2" align="left"><input type="button" class="btn-success btn" value="Apply" id="applyjob '.$info['jobid'].'"></div></div><br /><br />';
            $i++;
        }
    }

    if(isset($_POST['otherjobsbtn'])){

        echo '<div class="container">
        <div class="row">
        <div class="col-lg-2">
        <input class="btn btn-success" type="button" id="notification" value="<-- Go Back"/>
        </div>
        </div>
        <h3>Other Jobs</h3></div>';
        $sql="select jobid, recruiterid, jobtitle, city, jobsalary, mailid, jobdescription, date from makeoffer where jobid not in(select jobid from jobrolelist where jobrolelist IN (select candidaterolelist from candidaterolelist where candidateid='{$_COOKIE['userid']}')) ORDER BY `date` DESC";
        $res=mysqli_query($con,$sql);
        $i=1;
        while($info=mysqli_fetch_array($res)){

            $sql="select companyname from recruitertable where recruiterid='{$info['recruiterid']}'";
            $subres=mysqli_query($con,$sql);
            $sinfo=mysqli_fetch_array($subres);

            echo '<div class="row"><div class="col-lg-8"><table class="table" border="1">                         
            <tr><td colspan="2"><strong>Job Id: </strong> '.$info['jobid'].'</td></tr>
            <tr><td><strong>Title: </strong> '.$info['jobtitle'].'</td><td><strong>City: </strong>'.$info['city'].'</td></tr>
            <tr><td><strong>Salary: </strong> '.$info['jobsalary'].'</td><td><strong>Company: </strong>'.$sinfo['companyname'].'</td></tr>
            <tr><td colspan="2"><strong>Job Description: </strong><span class="teaser">'.substr($info['jobdescription'],0,10).'</span>
            <span class="complete">'.substr($info['jobdescription'],10,strlen($info['jobdescription'])).'</span><span class="more" id="ml'.$i.'">more...</span></td></tr>
            </table></div></div>';

            $sql="select status from jobstatus where jobid='{$info['jobid']}' and candidateid='{$_COOKIE['userid']}'";
            $subres=mysqli_query($con,$sql);
            $status=mysqli_fetch_array($subres);
            if(strtoupper($status['status'])==strtoupper('Applied'))
                echo '<div class="row"><div class="col-lg-3" align="left">Posted On: <strong>'.$info['date'].'</strong></div><div class="col-lg-3"></div><div class="col-lg-2" align="left"><input type="button" class="btn-default btn" value="Applied" ></div></div><br /><br />';
            else
                echo '<div class="row"><div class="col-lg-3" align="left">Posted On: <strong>'.$info['date'].'</strong></div><div class="col-lg-3"></div><div class="col-lg-2" align="left"><input type="button" class="btn-success btn" value="Apply" id="applyjob '.$info['jobid'].'"></div></div><br /><br />';
            $i++;
        }
        echo '</div>';

    }

    if(isset($_POST['viewjobalertsbtn'])){
        echo '<div class="container">
        <div class="row">
        <div class="col-lg-2">
        <input class="btn btn-success" type="button" id="notification" value="<-- Go Back"/>
        </div>
        </div>
        <h3>Job Alerts</h3></div>';
        $sql='SELECT `title`, `description`, `alertfile` FROM `jobalerts`';
        $res=mysqli_query($con,$sql);
        while($info=mysqli_fetch_array($res)){
            echo '<div class="row">
            <div class="col-lg-6">
            <table class="table" border="1">
            <tr><td><strong>Alert Title: </strong>'.$info['title'].'</td></tr>
            <tr><td><strong>Description: </strong>'.$info['description'].'</td></tr>
            <tr><td><strong>File: </strong><a href="'.$info['alertfile'].'" target="_blank">Download</a></td></tr>
            </table>
            </div>
            </div>
            ';
        }
        echo '</div>';
    }
    if(isset($_POST['applyjobbtn'])){
        $uid=uniqid();
        $jobid=ltrim($_POST['jobid']);
        $sql="INSERT INTO `jobstatus` values('{$uid}','{$_COOKIE['userid']}','{$jobid}','Applied','Just Applied');";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $sql="select jobtitle from makeoffer where jobid='{$jobid}'";
            $res=mysqli_query($con,$sql);
            $info=mysqli_fetch_array($res);
            echo "Congratulations. You had applied for the job of Title <strong>'.{$info['jobtitle']}.'</strong>";
            echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Go Back" id="notification" name="notification"></div></div>';
        }
    }

    if(isset($_POST['offerbtn'])){
        echo "<h3>Offers Zone</h3>";
        $sql="SELECT `Offerid`, `recruiterid`, `Userid`, `position`, `recruitmenttype`, `package`, `worklocation`, `bondtenure`, `status` FROM `offers` WHERE Userid='{$_COOKIE['userid']}'";
        $res=mysqli_query($con,$sql);
        if(!$res)
            echo '<h5><strong>Currently, You dont have any Offers to Show.<strong></h5>';
        else{
            while($info=mysqli_fetch_array($res)){
                $sql="select companyname, officialmailaddress from recruitertable where recruiterid='{$info['recruiterid']}'";
                $subres=mysqli_query($con,$sql);
                $company=mysqli_fetch_array($subres);
                echo'
                <div class="row">
                <div class="col-lg-8"><br />
                <table class="table" border="1"><br />
                <tr><td><strong>Company Name: </strong>'.$company['companyname'].'</td><td><strong>Position: </strong>'.$info['position'].'</td></tr>
                <tr><td><strong>Package: </strong>'.$info['package'].'"</td><td><strong>Recruitment Type: </strong>'.$info['recruitmenttype'].'</td></tr>
                <tr><td><strong>Work Location: </strong>'.$info['worklocation'].'</td><td><strong>Offerd By: </strong>'.$company['officialmailaddress'].'</td></tr>';
                if($info['bondtenure']!=null)
                    echo '<tr><td colspan="2"><strong>Bond Tenure Time: </strong>'.$info['bondtenure'].'</td></tr>';
                echo'
                </table>
                </div>
                </div>
                ';
            }
        }
    }

    if(isset($_POST['querybtn'])){
        $sql="select fullname from candidatetable where candidateid='{$_COOKIE['userid']}'";
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

    if(isset($_POST['addquerybtn'])){
        //Array ( [fullname] => Robot [mailid] => cand1@gmail.com [cell] => 1234567810 [querytext] => dergtewqsds [addquerybtn] => true )
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

    if(isset($_POST['applybtn'])){
        echo '<div class="container">
        <h3>Jobs Applied By You<br /></h3>';

        $sql="select jobid, recruiterid, jobtitle, city, jobsalary, mailid, jobdescription, date from makeoffer where jobid in(select jobid from jobstatus where candidateid='{$_COOKIE['userid']}') ORDER BY `date` DESC"; 
        $res=mysqli_query($con,$sql);
        while($info=mysqli_fetch_array($res)){
            //$sql=";
            if($info){

                $sql="select companyname from recruitertable where recruiterid='{$info['recruiterid']}'";
                $subres=mysqli_query($con,$sql);
                $sinfo=mysqli_fetch_array($subres);

                $sql="select status from jobstatus where jobid='{$info['jobid']}'";
                $subjob=mysqli_query($con,$sql);
                $jobinfo=mysqli_fetch_array($subjob);

                if($jobinfo['status']=="Accepted")
                    $status='<button class="btn btn-success">Accepted</button>';
                else
                    $status='<button class="btn btn-default">'.$jobinfo['status'].'</button>';

                echo '<div class="row"><div class="col-lg-8"><table class="table" border="1">
                <tr><td><strong>Job Id: </strong> '.$info['jobid'].'</td><td><strong>Status: </strong> '.$status.'</td></tr>
                <tr><td><strong>Title: </strong> '.$info['jobtitle'].'</td><td><strong>City: </strong>'.$info['city'].'</td></tr>
                <tr><td><strong>Salary: </strong> '.$info['jobsalary'].'</td><td><strong>Company: </strong>'.$sinfo['companyname'].'</td></tr>
                <tr><td colspan="2"><strong>Job Description: </strong> '.$info['jobdescription'].'</td></tr>
                </table></div></div>';
            }
            else{
                echo 'You haven`t applied for any job. Please Apply and Come Back Here';
            }
        }
        echo '<div>';
    }
?>

<!-- `permanentaddress`, `currentaddress`, `photopath`, `highedu`, `city`, `sscrollnum`, `ssctotalmarks`, `sscmarksgained`, `sscinstitute`, `sscpassyear`, `interrollnum`, `intertotalmarks`, `intermarksgained`, `interinstitute`, `interpassyear`, `interbranch`, `degreerollnum`, `degreetotalmarks`, `degreemarksgained`, `degreeinstitute`, `degreepassyear`, `degreebranch`, `masterrollnum`, `mastertotalmarks`, `mastermarksgained`, `masterinstitute`, `masterpassyear`, `masterbranch` FROM `candidatetable` WHERE -->
