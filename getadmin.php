<?php
    include ('head.inc');

    if(isset($_POST['accountsbtn'])){
        $sql="select candidateid,fullname, dob from candidatetable where accountaccess='noaccess'";
        $res=mysqli_query($con,$sql);
        echo '<div class="container"><h3>All the Un Activated Accounts List</h3><br />';
        while($info=mysqli_fetch_array($res)){
            $sql="select mailid,cell from mainlogin where userid='{$info['candidateid']}'";
            $subres=mysqli_query($con,$sql);
            $subinfo=mysqli_fetch_array($subres);
                
            
            echo'<div class="row"><div class="col-lg-9"><table class="table" border="1">
            <tr><td>UID: <strong>'.$info['candidateid'].'</strong></td><td colspan="2">Full Name: <strong>'.$info['fullname'].'</strong></td></tr>
            <tr><td>Mail Id: <strong>'.$subinfo['mailid'].'</strong></td><td>Cell: <strong>'.$subinfo['cell'].'</strong></td><td>DOB: <strong>'.$info['dob'].'</strong></td></tr>
            <tr><td><strong>Roles Interested:<br /></strong>';
            $sql="SELECT distinct candidaterolelist FROM `candidaterolelist` where candidateid='{$info['candidateid']}'";
            $subres=mysqli_query($con,$sql);
            while($subinfo=mysqli_fetch_array($subres)){
                echo $subinfo['candidaterolelist'].', ';
            }
            echo '</td><td><strong>Skills Known:<br /></strong>';
            $sql="SELECT distinct skill FROM `candidateskills` where candidateid='{$info['candidateid']}'";
            $subres=mysqli_query($con,$sql);
            while($subinfo=mysqli_fetch_array($subres)){
                echo $subinfo['skill'].', ';
            }
            echo '</td><td><strong>Languages Known:<br /></strong>';
            $sql="SELECT distinct language FROM `candidatelanguages` where candidateid='{$info['candidateid']}'";
            $subres=mysqli_query($con,$sql);
            while($subinfo=mysqli_fetch_array($subres)){
                echo $subinfo['language'].', ';
            }
            echo'</tr>
            <tr><td colspan="3" align="right"><input type="button" value="Accept" class="btn btn-success" id="accept '.$info['candidateid'].'"></td>
            </table></div></div>'; 
        }
        echo '</div>';
    }
    if(isset($_POST['querybtn'])){
        echo "what the query";        
    }
    
    if(isset($_POST['acceptcandidatebtn'])){
        //UPDATE `indriya`.`candidatetable` SET `accountaccess` = 'fullaccess' WHERE `candidatetable`.`candidateid` = '57651a2058bd7';
        
        $trim=trim($_POST['candidateid']);
        $sql="update candidatetable set `accountaccess`='fullaccess' where candidateid='{$trim}'";
        echo $sql."<br />";
        $res=mysqli_query($con,$sql);
        if($res)
            echo "Account has been Accepted Successfully. Go Back & Continue<br />";
        else
            echo "Account has not been Accepted. Go Back & Try Again<br />";
        echo '<div class="row"><div class="col-lg-3"><input type="button" class="btn btn-primary" value="Go Back" id="accounts"></div></div>';
    }
?>