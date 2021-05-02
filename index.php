<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="scripts/jquery-1.9.1.min.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <script src="scripts/LoginHandling.js"></script>
        <style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #CCCCCC;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: black;
  float: right;
  font-size: 20px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
</style>
    </head>
    <body>
        <?php
        session_start();
        function displayList($row) //add security here later.
        {
            if($row['PROV_PRIV'] == 0) // parent/client
            {
                echo '<nav style="width: 20%; float: left; border-right: 1px solid gray; border-top: 1px solid gray;>"';
                echo '<ul style="display:block;">';
                //buttons
                echo '<form name="LoginForm" action="index.php" method="post" style = "display:block; text-align:center;">';
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Logoff" name="logoff" value="Logoff" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                echo '</form>';
                echo '<li style="display:block; text-align:center; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#Conf" type="submit" id="Settings" name="settings" value="Settings" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                //end of buttons
                echo '</ul>';
                echo '</nav>';
            }
            else if($row['PROV_PRIV'] == 1) //Provider
            {
                echo '<form name="LoginForm" action="index.php" method="post" style = "display:block; text-align:center;">';
                echo '<nav style="width: 20%; float: left; border-right: 1px solid gray; border-top: 1px solid gray;>"';
                echo '<ul style="display:block;">';
                //buttons
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Logoff" name="logoff" value="Logoff" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                echo '</form>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#CKIN" type="submit" id="Checkin" name="checkin" value="Check In" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#CKOU" type="submit" id="Checkout" name="checkout" value="Check Out" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#ADPU" type="submit" id="AddPunch" name="addpunch" value="Add Punch" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#Conf" type="submit" id="Settings" name="settings" value="Settings" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                //end of buttons
                echo '</ul>';
                echo '</nav>';
            }
            else if($row['PROV_PRIV'] == 2)
            {
                echo '<form name="LoginForm" action="index.php" method="post" style = "display:block; text-align:center;">';
                echo '<nav style="width: 20%; float: left; border-right: 1px solid gray; border-top: 1px solid gray;>"';
                echo '<ul style="display:block;">';
                //buttons
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Logoff" name="logoff" value="Logoff" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Menu" name="menu" value="Menu" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VP" name="vp" value="View Providers" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VC" name="vc" value="View Clients" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VCH" name="vch" value="View Punch Changes" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VPC" name="vpc" value="View Punches" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                echo '</form>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#ADPR" type="submit" id="AP" name="AP" value="Add Provider" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#ADCL" type="submit" id="AC" name="AC" value="Add Client" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#MDPU" type="submit" id="AddPunch" name="addpunch" value="Add Punch" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                //end of buttons
                echo '</ul>';
                echo '</nav>';
            }
            else if($row['PROV_PRIV'] ==  3)
            {
                echo '<form name="LoginForm" action="index.php" method="post" style = "display:block; text-align:center;">';
                echo '<nav style="width: 20%; float: left; border-right: 1px solid gray; border-top: 1px solid gray;>"';
                echo '<ul style="display:block;">';
                //buttons
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Logoff" name="logoff" value="Logoff" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Menu" name="menu" value="Menu" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VP" name="vp" value="View Providers" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VC" name="vc" value="View Clients" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VCH" name="vch" value="View Punch Changes" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="VPC" name="vpc" value="View Punches" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '</form>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#CKIN" type="submit" id="Checkin" name="checkin" value="Check In" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#CKOU" type="submit" id="Checkout" name="checkout" value="Check Out" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#ADPU" type="submit" id="AddPunch" name="addpunch" value="Add Punch" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#ADPR" type="submit" id="AP" name="AP" value="Add Provider" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input data-toggle="modal" data-target="#ADCL" type="submit" id="AC" name="AC" value="Add Client" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                //end of buttons
                echo '</ul>';
                echo '</nav>';
            }
            else //locked
            {
                echo '<form name="LoginForm" action="index.php" method="post" style = "display:block; text-align:center;">';
                echo '<nav style="width: 20%; float: left; border-right: 1px solid gray; border-top: 1px solid gray;>"';
                echo '<ul style="display:block;">';
                //buttons
                echo '<li style="display:block; border-color:rgba(0,0,0,1); border-bottom: 1px solid gray;">';
                echo '<p><input type="submit" id="Logoff" name="logoff" value="Logoff" style="font-size:150%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
                echo '</li>';
                //end of buttons
                echo '</ul>';
                echo '</nav>';
            }
        }
        function obtainHours($row, $conn)
        {
            $empID = $row['PROVIDER_ID'];
            if($row['PROV_PRIV'] == 1)
            {
            $totalR = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Provider_PROVIDER_ID = '$empID' AND Service_SERVICE_ID = 3 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $totalH = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Provider_PROVIDER_ID = '$empID' AND Service_SERVICE_ID = 1 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $totalA = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Provider_PROVIDER_ID = '$empID' AND Service_SERVICE_ID = 2 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $quryR = $conn->query($totalR);
            $quryH = $conn->query($totalH);
            $quryA = $conn->query($totalA);
            $RR = mysqli_fetch_assoc($quryR);
            $RH = mysqli_fetch_assoc($quryH);
            $RA = mysqli_fetch_assoc($quryA);
            echo '<p style="text-align:left; font-size:120%;">Your hours:</p>';
            echo '<form name="LoginForm" action="index.php" method="post"> ';
            echo '<p style="text-align:left; font-size:120%;"> Respite: ' . $RR['COALESCE(SUM(PUNCH_HOURS),0)'] . ' | Habilitation: ' . $RH['COALESCE(SUM(PUNCH_HOURS),0)'] . ' |  Attendant Care: ' . $RA['COALESCE(SUM(PUNCH_HOURS),0)'] . '</p>';
            echo '</form>';
            }
            if($row['PROV_PRIV'] == 0)
            {
                $cl = $_SESSION['CLI'];
                if($cl == -1) // All
                {
                    $totalR = "SELECT COALESCE(SUM(CLI_RHOURS),0) FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND Service_SERVICE_ID = 3 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2) ORDER BY PUNCH_DATE DESC";
                    $totalH = "SELECT COALESCE(SUM(CLI_HHOURS),0) FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND Service_SERVICE_ID = 1 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2) ORDER BY PUNCH_DATE DESC";
                    $totalA = "SELECT COALESCE(SUM(CLI_AHOURS),0) FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND Service_SERVICE_ID = 2 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2) ORDER BY PUNCH_DATE DESC";
                    $quryR = $conn->query($totalR);
                    $quryH = $conn->query($totalH);
                    $quryA = $conn->query($totalA);
                    $RR = mysqli_fetch_assoc($quryR);
                    $RH = mysqli_fetch_assoc($quryH);
                    $RA = mysqli_fetch_assoc($quryA);
                    $clients = "SELECT CLI_LAST FROM client WHERE PROV_ID = '$empID'";
                    $qury4 = $conn->query($clients);
                    echo '<p style="text-align:left; font-size:120%;">Your hours:</p>';
                    echo '<form name="LoginForm" action="index.php" method="post"> ';
                    echo '<p style="text-align:left; font-size:120%;"> Respite: ' . $RR['COALESCE(SUM(CLI_RHOURS),0)'] . ' | Habilitation: ' . $RH['COALESCE(SUM(CLI_HHOURS),0)'] . ' |  Attendant Care: ' . $RA['COALESCE(SUM(CLI_AHOURS),0)'] . 
                            '  |   <select name="sel" style="text-align:right; font-size:120%;"><option value="ALL">ALL</option>';
                    while($CL = mysqli_fetch_assoc($qury4))
                    {
                        echo '<option value="' . $CL['CLI_LAST'] . '">' . $CL['CLI_LAST'] . '</option>';
                    }
                    echo '</select> <input type="submit" name="go" value="Go" style="cursor: pointer; border-color:rgba(0,0,0,1); font-size:120%; text-align:right; background-color:rgba(0,0,0,0)" /></p>';
                    echo '</form>';
                }
                else
                {
                    $totalR = "SELECT COALESCE(SUM(CLI_RHOURS),0) FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND CLI_ID = '$cl' AND Service_SERVICE_ID = 3 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2) ORDER BY PUNCH_DATE DESC";
                    $totalH = "SELECT COALESCE(SUM(CLI_HHOURS),0) FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND CLI_ID = '$cl' AND Service_SERVICE_ID = 1 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2) ORDER BY PUNCH_DATE DESC";
                    $totalA = "SELECT COALESCE(SUM(CLI_AHOURS),0) FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND CLI_ID = '$cl' AND Service_SERVICE_ID = 2 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2) ORDER BY PUNCH_DATE DESC";
                    $quryR = $conn->query($totalR);
                    $quryH = $conn->query($totalH);
                    $quryA = $conn->query($totalA);
                    $RR = mysqli_fetch_assoc($quryR);
                    $RH = mysqli_fetch_assoc($quryH);
                    $RA = mysqli_fetch_assoc($quryA);
                    $clients = "SELECT CLI_LAST FROM client WHERE PROV_ID = '$empID'";
                    $qury4 = $conn->query($clients);
                    echo '<p style="text-align:left; font-size:120%;">Your hours:</p>';
                    echo '<form name="LoginForm" action="index.php" method="post"> ';
                    echo '<p style="text-align:left; font-size:120%;"> Respite: ' . $RR['COALESCE(SUM(CLI_RHOURS),0)'] . ' | Habilitation: ' . $RH['COALESCE(SUM(CLI_HHOURS),0)'] . ' |  Attendant Care: ' . $RA['COALESCE(SUM(CLI_AHOURS),0)'] . 
                            '  |   <select name="sel" style="text-align:right; font-size:120%;"><option value="ALL">ALL</option>';
                    while($CL = mysqli_fetch_assoc($qury4))
                    {
                        echo '<option value="' . $CL['CLI_LAST'] . '">' . $CL['CLI_LAST'] . '</option>';
                    }
                    echo '</select> <input type="submit" name="go" value="Go" style="cursor: pointer; border-color:rgba(0,0,0,1); font-size:120%; text-align:right; background-color:rgba(0,0,0,0)" /></p>';
                    echo '</form>';
                }
            }
        }
        function getStatusProv($stat) //Get status for providers
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            $conn->select_db('capstone');
            $Provid = $_SESSION['ID'];
            $get = "SELECT * FROM provider WHERE PROVIDER_ID = '$Provid'";
            $qury = $conn->query($get);
            $row = mysqli_fetch_assoc($qury);
            switch($stat['PStatus_STATUS_ID'])
            {
                case 0: return "Open";
                case 1: return "Pending";
                case 2: return "Approved";
                case 3: return "Rejected";
                case 4:
                    if($row['PROV_PRIV'] == 0 || $row['PROV_PRIV'] == 3) //parent or admin
                    {return '<form name="LoginForm" action="index.php" method="post"> '
                    . 'Verify <input type="hidden" name="postvar" value="' . $stat['PUNCH_ID'] . '" />
                             <input type="submit" class="verify" name="verify" value="✓" style="cursor: pointer; border-color:rgba(0,200,0,1); font-size:80%; background-color:rgba(0,200,0,1)" /> '
                    . '<input type="submit" class="reject" name="reject" value="X" style="cursor: pointer; border-color:rgba(200,0,0,1); font-size:90%; background-color:rgba(200,0,0,1)" /> </form> ';
                    }
                    else if ($row['PROV_PRIV'] == 2) //manager
                    {
                        return '<form name="LoginForm" action="index.php" method="post"> '
                    . 'Verify <input type="hidden" name="postvar" value="' . $stat['PUNCH_ID'] . '" /><input type="submit" class="reject" name="reject" value="X" style="cursor: pointer; border-color:rgba(200,0,0,1); font-size:90%; background-color:rgba(200,0,0,1)" /> </form> ';
                    }
                    else
                    {
                        return "Pending";
                    }
                case 5: return "Processing";
                case 6: return "Batched";
                case 7: return "Paid";
            }
        }
        function formatTime($time)
        {
            if($time == null)
            {
                return "Open";
            }
           $formatted = explode(":",$time);
           if($formatted[0] >= 12) //PM
           {
               if($formatted[0] >= 13)
               {
                   return ($formatted[0] - 12) . ":" . $formatted[1] . " PM";
               }
               else
               {
                   return $formatted[0] . ":" . $formatted[1] . " PM";
               }
           }
           else //AM
           {
               if($formatted[0] == 0)
               {
                   return ($formatted[0] + 12) . ":" . $formatted[1] . " AM";
               }
               else
               {
                   return $formatted[0] . ":" . $formatted[1] . " AM";
               }
           }
        }
        function getClientName($id,$db)
        {
            $getclient = "SELECT * FROM client WHERE CLI_ID = '$id'";
            $qury4 = $db->query($getclient);
            $row2 = mysqli_fetch_assoc($qury4);
            return $row2['CLI_FIRST'] . " " . $row2['CLI_LAST'];
        }
        function getProviderName($id,$conn)
        {
            $getprovider = "SELECT * FROM provider WHERE PROVIDER_ID = '$id'";
            $qury5 = $conn->query($getprovider);
            $row3 = mysqli_fetch_assoc($qury5);
            return '<abbr title="' . $row3['PROV_FIRST'] . ' ' . $row3['PROV_LAST'] . '">' . $id . '</abbr>';
        }
        function getProviderNamew($id,$conn)
        {
            $getprovider = "SELECT * FROM provider WHERE PROVIDER_ID = '$id'";
            $qury5 = $conn->query($getprovider);
            $row3 = mysqli_fetch_assoc($qury5);
            return $row3['PROV_FIRST'] . ' ' . $row3['PROV_LAST'];
        }
        function getService($service)
        {
            if($service == 1)
            {
                return "Habilitation";
            }
            else if ($service == 2)
            {
                return "Attendent Care";
            }
            else if ($service == 3)
            {
                return "Respite";
            }
            else
            {
                return "None";
            }
        }
        function formatDate($date)
        {
            $formatted = explode('-',$date);
            return $formatted[1] . '/' . $formatted[2] . '/' . substr($formatted[0],-2);
        }
        
        function getPunchStatusInfo($lvl)
        {
            switch($lvl)
            {
                case 1: return "Punch Check-in";
                case 2: return "Punch Accepted";
                case 3: return "Punch Rejected";
                case 4: return "Punch Check-out";
                case 5: return "Punch Added";
            }
        }
        function getUserType($type)
        {
            switch($type)
            {
                case 0: return "Parent / Client";
                case 1: return "Provider";
                case 2: return "Manager";
                case 3: return "Website Administrator";
                default: return "locked";
            }
        }
        function displayTable($row,$conn) //ProfileMenu
        {
            $empID = $row['PROVIDER_ID'];
            if($row['PROV_PRIV'] == 0)//Table of provider/company punches
            {
            echo '<table class="scroll" style=" float:right; border-spacing: 0; border: 2px solid black; width: 78%; background-color: #DDDDDD;">';
            echo '<thead style="display: block;">';
            echo '<tr> <th style="height: 30px; line-height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black;"> Date </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black;"> Punch ID </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:129px; min-width:129px; border-right: 1px solid black;"> Service </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black;"> Client </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:100px; min-width:100px; border-right: 1px solid black;"> Provider ID </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkin </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkout </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> Hours </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; text-align:center; border-right: none;"> Status </th> </tr>';
            echo '</thead>';
            //Beginning of body
            echo '<tbody style="display: block; border-top: 2px solid black; height: 500px; overflow-y: auto; overflow-x: hidden;">';
            $clients = ""; //associated provider account
            if($_SESSION['GVT'] == true)
            {
                $clients = "SELECT * FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND punch.PStatus_STATUS_ID = 4 ORDER BY PUNCH_ID DESC";
            }
            else
            {
                if($_SESSION['CLI'] == -1)
                {
                $clients = "SELECT * FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' ORDER BY PUNCH_ID DESC";
                }
                else
                {
                    $c = $_SESSION['CLI'];
                    $clients = "SELECT * FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE PROV_ID = '$empID' AND CLI_ID = '$c' ORDER BY PUNCH_ID DESC";
                }
            }
            $qury4 = $conn->query($clients);
            //mysql_data_seek($result, 0);
            while ($row1 = $qury4->fetch_assoc())
            {
                        echo '<tr>';
                        echo '<td style="height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatDate($row1['PUNCH_DATE']) . '</td>';
                        echo '<td style="height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_ID'] . '</td>';
                        echo '<td style="height: 30px; max-width:129px; min-width:129px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getService($row1['Service_SERVICE_ID']) . '</td>';
                        echo '<td style="height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getClientName($row1['Client_CLI_ID'], $conn) . '</td>';
                        echo '<td style="height: 30px; max-width:100px; min-width:100px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getProviderName($row1['Provider_PROVIDER_ID'], $conn) . '</td>';
                        echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_IN']) . '</td>';
                        echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_OUT']) . '</td>';
                        echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_HOURS'] . '</td>';
                        echo '<td style="height: 30px; max-width:150px; min-width:150px; border-bottom: 1px solid black;">' . getStatusProv($row1) . '</td>';
                        echo '</tr>';
            }
            }
            if($row['PROV_PRIV'] == 1 || $row['PROV_PRIV'] == 3)//Table of provider/company punches
            {
            $records = "";
            if($_SESSION['GVT'] == true)
            {
                $records = "SELECT * FROM punch WHERE Provider_PROVIDER_ID = '$empID' AND PStatus_STATUS_ID = 4 ORDER BY PUNCH_ID DESC";
            }
            else
            {
                $records = "SELECT * FROM punch WHERE Provider_PROVIDER_ID = '$empID' ORDER BY PUNCH_ID DESC";
            }
            $qury3 = $conn->query($records);
            echo '<table class="scroll" style=" border-spacing: 0; border: 2px solid black; width: 78%; background-color: #DDDDDD;">';
            echo '<thead style="display: block;">';
            echo '<tr> <th style="height: 30px; line-height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black;"> Date </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black;"> Punch ID </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black;"> Service </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black;"> Client </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkin </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkout </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Hours </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; text-align:center; border-right: none;"> Status </th> </tr>';
            echo '</thead>';
            //Beginning of body
            echo '<tbody style="display: block; border-top: 2px solid black; height: 500px; overflow-y: auto; overflow-x: hidden;">';
            while($row1 = mysqli_fetch_assoc($qury3))
            {
            echo '<tr>';
            echo '<td style="height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatDate($row1['PUNCH_DATE']) . '</td>';
            echo '<td style="height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_ID'] . '</td>';
            echo '<td style="height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getService($row1['Service_SERVICE_ID']) . '</td>';
            echo '<td style="height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getClientName($row1['Client_CLI_ID'], $conn) . '</td>';
            echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_IN']) . '</td>';
            echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_OUT']) . '</td>';
            echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_HOURS'] . '</td>';
            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-bottom: 1px solid black;">' . getStatusProv($row1) . '</td>';
            echo '</tr>';
            }
            }
            if($row['PROV_PRIV'] == 2) //manager
            {
            $records1 = "";
            if($_SESSION['VPCH'] == true)
            {
                $records1 = "SELECT * FROM pstatusinfo ORDER BY PSTATUSINFO_ID DESC";
                $qury5 = $conn->query($records1);
                echo '<table class="scroll" style=" border-spacing: 0; border: 2px solid black; width: 50%; background-color: #DDDDDD;">';
                echo '<thead style="display: block;">';
                echo '<tr> <th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> Punch Change ID </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> TimeStamp </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> Punch ID </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> Decider ID </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:200px; min-width:200px; text-align:center; border-right: none;"> Status </th> </tr>';
                echo '</thead>';
                //Beginning of body
                echo '<tbody style="display: block; border-top: 2px solid black; height: 530px; overflow-y: auto; overflow-x: hidden;">';
                while($row1 = mysqli_fetch_assoc($qury5))
                {
                            echo '<tr>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PSTATUSINFO_ID'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PSTATUS_DATE'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['Punch_PUNCH_ID'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getProviderName($row1['Provider_PROVIDER_ID'], $conn) . '</td>';
                            echo '<td style="height: 30px; max-width:200px; min-width:200px; border-bottom: 1px solid black;">' . getPunchStatusInfo($row1['PSTATUSINFO_LVL']) . '</td>';
                            echo '</tr>';
                }
            }
            else if($_SESSION['VPU'] == true)
            {
            $records = "SELECT * FROM punch ORDER BY PUNCH_ID DESC";
            $qury3 = $conn->query($records);
            echo '<table class="scroll" style=" float:right; border-spacing: 0; border: 2px solid black; width: 78%; background-color: #DDDDDD;">';
            echo '<thead style="display: block;">';
            echo '<tr> <th style="height: 30px; line-height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black;"> Date </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black;"> Punch ID </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:129px; min-width:129px; border-right: 1px solid black;"> Service </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black;"> Client </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:100px; min-width:100px; border-right: 1px solid black;"> Provider ID </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkin </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkout </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> Hours </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; text-align:center; border-right: none;"> Status </th> </tr>';
            echo '</thead>';
            //Beginning of body
            echo '<tbody style="display: block; border-top: 2px solid black; height: 500px; overflow-y: auto; overflow-x: hidden;">';
            while($row1 = mysqli_fetch_assoc($qury3))
            {
                        echo '<tr>';
                        echo '<td style="height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatDate($row1['PUNCH_DATE']) . '</td>';
                        echo '<td style="height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_ID'] . '</td>';
                        echo '<td style="height: 30px; max-width:129px; min-width:129px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getService($row1['Service_SERVICE_ID']) . '</td>';
                        echo '<td style="height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getClientName($row1['Client_CLI_ID'], $conn) . '</td>';
                        echo '<td style="height: 30px; max-width:100px; min-width:100px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getProviderName($row1['Provider_PROVIDER_ID'], $conn) . '</td>';
                        echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_IN']) . '</td>';
                        echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_OUT']) . '</td>';
                        echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_HOURS'] . '</td>';
                        echo '<td style="height: 30px; max-width:150px; min-width:150px; border-bottom: 1px solid black;">' . getStatusProv($row1) . '</td>';
            }
            }
            else if($_SESSION['VCLI'] == true)
            {
            $records = "SELECT * FROM client ORDER BY CLI_LAST ASC";
            $qury3 = $conn->query($records);
            echo '<table class="scroll" style=" float:left; border-spacing: 0; border: 2px solid black; width: 60%; background-color: #DDDDDD;">';
            echo '<thead style="display: block;">';
            echo '<tr> <th style="height: 30px; line-height: 30px; max-width:120px; min-width:120px; border-right: 1px solid black;"> Client ID </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:200px; min-width:200px; border-right: 1px solid black;"> First name </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:200px; min-width:200px; border-right: 1px solid black;"> Last name </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> Respite Hours</th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> Hab Hours </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> AC Hours </th>';
            echo '<th style="height: 30px; line-height: 30px; max-width:200px; min-width:200px; text-align:center; border-right: none;"> Provider </th> </tr>';
            echo '</thead>';
            //Beginning of body
            echo '<tbody style="display: block; border-top: 2px solid black; height: 500px; overflow-y: auto; overflow-x: hidden;">';
            while($row1 = mysqli_fetch_assoc($qury3))
            {
                        echo '<tr>';
                        echo '<td style="height: 30px; max-width:120px; min-width:120px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['CLI_ID'] . '</td>';
                        echo '<td style="height: 30px; max-width:200px; min-width:200px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['CLI_FIRST'] . '</td>';
                        echo '<td style="height: 30px; max-width:200px; min-width:200px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['CLI_LAST'] . '</td>';
                        echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['CLI_RHOURS'] . '</td>';
                        echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['CLI_HHOURS'] . '</td>';
                        echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['CLI_AHOURS'] . '</td>';
                        echo '<td style="height: 30px; max-width:200px; min-width:200px; border-bottom: 1px solid black;">' . getProviderNamew($row1['PROV_ID'], $conn) . '</td>';
            }
            }
            else if($_SESSION['VPR'] == true)
            {
            $records = "SELECT * FROM provider ORDER BY PROV_LAST ASC";
            $qury5 = $conn->query($records);
                echo '<table class="scroll" style=" border-spacing: 0; border: 2px solid black; width: 50%; background-color: #DDDDDD;">';
                echo '<thead style="display: block;">';
                echo '<tr> <th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> Provider ID </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> First Name </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> Last Name </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black;"> Phone Number </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> Hours</th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:200px; min-width:200px; text-align:center; border-right: none;"> Privilege </th> </tr>';
                echo '</thead>';
                //Beginning of body
                echo '<tbody style="display: block; border-top: 2px solid black; height: 530px; overflow-y: auto; overflow-x: hidden;">';
                while($row1 = mysqli_fetch_assoc($qury5))
                {
                            echo '<tr>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PROVIDER_ID'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PROV_FIRST'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PROV_LAST'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PROV_PN'] . '</td>';
                            echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PROV_HOURS'] . '</td>';
                            echo '<td style="height: 30px; max-width:200px; min-width:200px; border-bottom: 1px solid black;">' . getUserType($row1['PROV_PRIV']) . '</td>';
                            echo '</tr>';
                }
            }
            else
                {
                $records1 = "SELECT * FROM client LEFT JOIN punch ON punch.Client_CLI_ID = CLI_ID WHERE punch.PStatus_STATUS_ID = 4 ORDER BY PUNCH_ID DESC";
                $qury5 = $conn->query($records1);
                echo '<table class="scroll" style=" border-spacing: 0; border: 2px solid black; width: 78%; background-color: #DDDDDD;">';
                echo '<thead style="display: block;">';
                echo '<tr> <th style="height: 30px; line-height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black;"> Date </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black;"> Punch ID </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:129px; min-width:129px; border-right: 1px solid black;"> Service </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black;"> Client </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:100px; min-width:100px; border-right: 1px solid black;"> Provider ID </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkin </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black;"> Checkout </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black;"> Hours </th>';
                echo '<th style="height: 30px; line-height: 30px; max-width:150px; min-width:150px; text-align:center; border-right: none;"> Status </th> </tr>';
                echo '</thead>';
                //Beginning of body
                echo '<tbody style="display: block; border-top: 2px solid black; height: 500px; overflow-y: auto; overflow-x: hidden;">';
                while($row1 = mysqli_fetch_assoc($qury5))
                {
                            echo '<tr>';
                            echo '<td style="height: 30px; max-width:76px; min-width:76px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatDate($row1['PUNCH_DATE']) . '</td>';
                            echo '<td style="height: 30px; max-width:118px; min-width:118px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_ID'] . '</td>';
                            echo '<td style="height: 30px; max-width:129px; min-width:129px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getService($row1['Service_SERVICE_ID']) . '</td>';
                            echo '<td style="height: 30px; max-width:199px; min-width:199px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getClientName($row1['Client_CLI_ID'], $conn) . '</td>';
                            echo '<td style="height: 30px; max-width:100px; min-width:100px; border-right: 1px solid black; border-bottom: 1px solid black;">' . getProviderName($row1['Provider_PROVIDER_ID'], $conn) . '</td>';
                            echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_IN']) . '</td>';
                            echo '<td style="height: 30px; max-width:89px; min-width:89px; border-right: 1px solid black; border-bottom: 1px solid black;">' . formatTime($row1['PUNCH_OUT']) . '</td>';
                            echo '<td style="height: 30px; max-width:59px; min-width:59px; border-right: 1px solid black; border-bottom: 1px solid black;">' . $row1['PUNCH_HOURS'] . '</td>';
                            echo '<td style="height: 30px; max-width:150px; min-width:150px; border-bottom: 1px solid black;">' . getStatusProv($row1) . '</td>';
                            echo '</tr>';
                }
               }
            }
            echo '</tbody>';
            //End of body
            echo '</table>';
        }
        function displayProfileMenu()
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if(!$conn ) { //connection failed?
            header('Location: LoginConnectionFailed.html');
            die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            $Provid = $_SESSION['ID'];
            $get = "SELECT * FROM provider WHERE PROVIDER_ID = '$Provid'";
            $qury = $conn->query($get);
            $row = mysqli_fetch_assoc($qury);
            include('Profile.html');
            displayList($row);
            //Display that the user has logged on.
            echo '<p id="Intro" style="text-align:right; font-size:120%;">Welcome, ' . $row['PROV_FIRST'] . '</p>';
            //Get user hours.
            if($row['PROV_PRIV'] != 2) //Not a manager.
            {
            obtainHours($row, $conn);
            }
            else
            {
                if($_SESSION['VPCH'] == true)
                {
                echo '<p style="text-align:left; font-size:120%;">Punch Changes:</p>';
                }
                else if($_SESSION['VCLI'] == true)
                {
                echo '<p style="text-align:left; font-size:120%;">Clients:</p>';
                }
                else if($_SESSION['VPU'] == true)
                {
                    echo '<p style="text-align:left; font-size:120%;">Punches:</p>';
                }
                else if($_SESSION['VPR'] == true)
                {
                    echo '<p style="text-align:left; font-size:120%;">Providers:</p>';
                }
                else
                {
                echo '<p style="text-align:left; font-size:120%;">Currently pending punches:</p>';
                }
            }
            //sort buttons
            echo '<hr/>';
            if($row['PROV_PRIV'] != 2)
            {
            echo '<form name="SortForm" action="Index.php" method="post">';
            if($_SESSION['GVT'] == false)
            {
            echo '<p style="text-align:right; font-size:120%;"><input type="submit" id="GetVerify" name="GV" value="Display punches that need verification" style="font-size:130%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
            }
            else
            {
            echo '<p style="text-align:right; font-size:120%;"><input type="submit" id="GetAllPunches" name="BACK" value="Display all punches" style="font-size:130%; cursor: pointer; border-color:rgba(0,0,0,1);" /></p>';
            }
            echo '</form>';
            }
            else if($_SESSION['VPU'] == true && $row['PROV_PRIV'] == 2) // add functionality
            {
            echo '<p>Set all punches to: <select name="Stat" style="text-align:right; font-size:120%;"><option value="5">Processing</option><option value="6">Batched</option><option value="7">Paid</option> <input type="submit" name="gos" value="Go" style="cursor: pointer; border-color:rgba(0,0,0,1); font-size:120%; text-align:right; background-color:rgba(0,0,0,0)" /></p>';
            }
            displayTable($row,$conn);
            mysqli_close($conn);
        }
        if(isset($_POST['Login']))
        {
            $Provid = $_POST['Emp'];
            $PWD = $_POST['PW'];
            if(empty($Provid) || empty($PWD))
            {
                header('Location: Login.html');
                exit;
            }
            $conn = mysqli_connect('localhost:3308', 'root');
            if(!$conn ) { //connection failed?
            header('Location: LoginConnectionFailed.html');
            die('Could not connect: ' . mysqli_connect_error());
            }
            else {
                $conn->select_db('capstone');
                $get = "SELECT * FROM provider WHERE PROVIDER_ID = '$Provid'";
                $qury = $conn->query($get);
                $row = mysqli_fetch_assoc($qury);
                if($row['PPWH'] == null) //first time users
                {
                    $hash = password_hash($row['PPW'], PASSWORD_DEFAULT);
                    $setHash = "UPDATE provider SET PPWH = '$hash', PPW = '$hash' WHERE provider.PROVIDER_ID = '$Provid'";
                    $qury1 = $conn->query($setHash);
                    if(!$qury1)
                    {
                        die('Could not hash: ' . mysqli_connect_error());
                    }
                    else
                    {
                        $_SESSION['ID'] = $Provid;
                        $_SESSION['GVT'] = false;
                        $_SESSION['CLI'] = -1;
                        if($row['PROV_PRIV'] == 2)
                        {
                        $_SESSION['VPR'] = false;
                        $_SESSION['VCLI'] = false;
                        $_SESSION['VPU'] = false;
                        $_SESSION['VPCH'] = false;
                        }
                        mysqli_close($conn);
                        displayProfileMenu();
                        exit;
                    }
                }
                else //more than one time users
                {
                    if(password_verify($PWD, $row['PPW'])) //successful login
                    {
                        $_SESSION['ID'] = $Provid;
                        $_SESSION['GVT'] = false;
                        $_SESSION['CLI'] = -1;
                        if($row['PROV_PRIV'] == 2)
                        {
                        $_SESSION['VPR'] = false;
                        $_SESSION['VCLI'] = false;
                        $_SESSION['VPU'] = false;
                        $_SESSION['VPCH'] = false;
                        }
                        mysqli_close($conn);
                        displayProfileMenu();
                        exit;
                    }
                    else
                    {
                        include('LoginPasswordIncorrect.html');
                        exit;
                    }
                }
            }
        }
        if(isset($_POST['verify']))
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if(!$conn ) { //connection failed?
            header('Location: LoginConnectionFailed.html');
            die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            $PV = $_POST['postvar'];
            $PI = $_SESSION['ID'];
            $update = "UPDATE punch SET PStatus_STATUS_ID = 2 WHERE PUNCH_ID = '$PV' ";
            $timestam = date('y-m-d H-i-s');
            $change = "INSERT INTO pstatusinfo (PSTATUSINFO_ID, PSTATUS_DATE, Punch_PUNCH_ID, Provider_PROVIDER_ID, PSTATUSINFO_LVL) VALUES (NULL, '$timestam', '$PV', '$PI', 2)";
            $qury2 = $conn->query($update);
            $qury3 = $conn->query($change);
            //get client ID
            $clientrow = "SELECT Client_CLI_ID FROM punch WHERE PUNCH_ID = '$PV'";
            $qury4 = $conn->query($clientrow);
            $cli = mysqli_fetch_assoc($qury4);
            $id = $cli['Client_CLI_ID'];
            $totalR = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Client_CLI_ID = '$id' AND Service_SERVICE_ID = 3 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $totalH = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Client_CLI_ID = '$id' AND Service_SERVICE_ID = 1 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $totalA = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Client_CLI_ID = '$id' AND Service_SERVICE_ID = 2 AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $quryR = $conn->query($totalR);
            $quryH = $conn->query($totalH);
            $quryA = $conn->query($totalA);
            $RR1 = mysqli_fetch_assoc($quryR);
            $RA1 = mysqli_fetch_assoc($quryA);
            $RH1 = mysqli_fetch_assoc($quryH);
            $RR = $RR1['COALESCE(SUM(PUNCH_HOURS),0)'];
            $RA = $RA1['COALESCE(SUM(PUNCH_HOURS),0)'];
            $RH = $RH1['COALESCE(SUM(PUNCH_HOURS),0)'];
            $CR = "UPDATE client SET CLI_RHOURS = '$RR' WHERE CLI_ID = '$id'";
            $CA = "UPDATE client SET CLI_AHOURS = '$RA' WHERE CLI_ID = '$id'";
            $CH = "UPDATE client SET CLI_HHOURS = '$RH' WHERE CLI_ID = '$id'";
            $qury5 = $conn->query($CR);
            $qury6 = $conn->query($CA);
            $qury7 = $conn->query($CH);
            //update provider hours
            $PID = "SELECT Provider_PROVIDER_ID FROM punch WHERE Client_CLI_ID = '$id'";
            $qury8 = $conn->query($PID);
            $P1 = mysqli_fetch_assoc($qury8);
            $P = $P1['Provider_PROVIDER_ID'];
            $upd = "SELECT COALESCE(SUM(PUNCH_HOURS),0) FROM punch WHERE Provider_PROVIDER_ID = '$P' AND (PStatus_STATUS_ID = 1 OR PStatus_STATUS_ID = 2)";
            $qury9 = $conn->query($upd);
            $up = mysqli_fetch_assoc($qury9);
            $u = $up['COALESCE(SUM(PUNCH_HOURS),0)'];
            $PC = "UPDATE provider SET PROV_HOURS = '$u' WHERE PROVIDER_ID = '$P'";
            $qury10 = $conn->query($PC);
            //echo 'Accepted!' . $_POST['postvar'];
            mysqli_close($conn);
            displayProfileMenu();
            exit;
        }
        if(isset($_POST['reject']))
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if(!$conn ) { //connection failed?
            header('Location: LoginConnectionFailed.html');
            die('Could not connect: ' . mysqli_connect_error());
            }
            $conn->select_db('capstone');
            $PV = $_POST['postvar'];
            $PI = $_SESSION['ID'];
            $update = "UPDATE punch SET PStatus_STATUS_ID = 3 WHERE PUNCH_ID = '$PV' ";
            $timestam = date('y-m-d H-i-s');
            $change = "INSERT INTO pstatusinfo (PSTATUSINFO_ID, PSTATUS_DATE, Punch_PUNCH_ID, Provider_PROVIDER_ID, PSTATUSINFO_LVL) VALUES (NULL, '$timestam', '$PV', '$PI', 3)";
            $qury2 = $conn->query($update);
            $qury3 = $conn->query($change);
            //echo 'Accepted!' . $_POST['postvar'];
            mysqli_close($conn);
            displayProfileMenu();
            exit;
        }
        if(isset($_POST['menu']))
        {
            $_SESSION['VPR'] = false;
            $_SESSION['VCLI'] = false;
            $_SESSION['VPU'] = false;
            $_SESSION['VPCH'] = false;
            displayProfileMenu();
            exit;
        }
        if(isset($_POST['GV'])) //Get verification punches
        {
            $_SESSION['GVT'] = true;
            displayProfileMenu();
            exit;
        }
        if(isset($_POST['BACK']))
        {
            $_SESSION['GVT'] = false;
            displayProfileMenu();
            exit;
        }
        if(isset($_POST['go']))
        {
            $name = $_POST['sel'];
            if(strcmp($name, "ALL") == 0) //If ALL is selected
            {
                $_SESSION['CLI'] = -1;
                displayProfileMenu();
                exit;
            }
            else //A specific client.
            {
                $conn = mysqli_connect('localhost:3308', 'root');
                if(!$conn ) { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
                }
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                $conn->select_db('capstone');
                $ge = "SELECT CLI_ID FROM client WHERE CLI_LAST = '$name'";
                $qury = $conn->query($ge);
                $l = mysqli_fetch_assoc($qury);
                if($l['CLI_ID'] == null) //Invalid name
                {
                    $conn->close();
                    displayProfileMenu();
                    exit;
                }
                $_SESSION['CLI'] = $l['CLI_ID'];
                $conn->close();
                $_SESSION['GVT'] = false;
                displayProfileMenu();
                exit;
            }
            exit;
        }
        if (isset($_POST['CIS'])) 
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if (!$conn) 
            { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            $pr = $_SESSION['ID'];
            $np1 = "SELECT PUNCH_ID FROM punch WHERE Provider_PROVIDER_ID = '$pr' AND PStatus_STATUS_ID = 0";
            $qurya = $conn->query($np1);
            $a = mysqli_fetch_assoc($qurya);
            if($a['PUNCH_ID'] != null)
            {
                $conn->close();
                displayProfileMenu();
                ?>
                <script type="text/javascript">
                window.alert("You are already checked in!");
                </script> <?php
                exit;
            }
            $pw = $_POST['passi'];
            $ser = $_POST['Ser'];
            $las = $_POST['last'];
            $las = ucfirst($las);
            
            $prov = "SELECT PPW FROM provider WHERE PROVIDER_ID = '$pr'";
            $qury1 = $conn->query($prov);
            $row = mysqli_fetch_assoc($qury1);
            if(!password_verify($pw, $row['PPW']))
            {
                $conn->close();
                displayProfileMenu();
                ?>
                <script type="text/javascript">
                window.alert("Incorrect password. Please try again.");
                </script> <?php
                exit;
            }
            
            $ge = "SELECT CLI_ID FROM client WHERE CLI_LAST = '$las'";
            $qury2 = $conn->query($ge);
            $row2 = mysqli_fetch_assoc($qury2);
            
            if ($row2['CLI_ID'] == null) 
            {
                $conn->close();
                displayProfileMenu();
                ?>
                <script type="text/javascript">
        window.alert("Client not found. Please try again.");
        </script> <?php
                exit;
            }
            $clid = $row2['CLI_ID'];
            $dat = date("Y-m-d");
            $start = date("H:i");
            $new = "INSERT INTO punch (PUNCH_ID, PUNCH_IN, PUNCH_OUT, PUNCH_HOURS, PUNCH_DATE, Client_CLI_ID, Provider_PROVIDER_ID, Service_SERVICE_ID, PStatus_STATUS_ID)
                    VALUES (NULL, '$start', NULL, '0.00', '$dat', '$clid', '$pr', '$ser', '0')";
            $qury3 = $conn->query($new);
            $np = "SELECT PUNCH_ID FROM punch WHERE Provider_PROVIDER_ID = '$pr' AND PStatus_STATUS_ID = 0";
            $qury4 = $conn->query($np);
            $PI1 = mysqli_fetch_assoc($qury4);
            $PI = $PI1['PUNCH_ID'];
            $timestam = date('y-m-d H-i-s');
            $change = "INSERT INTO pstatusinfo (PSTATUSINFO_ID, PSTATUS_DATE, Punch_PUNCH_ID, Provider_PROVIDER_ID, PSTATUSINFO_LVL) VALUES (NULL, '$timestam', '$PI', '$pr', 1)";
            $qury5 = $conn->query($change);
            $conn->close();
            displayProfileMenu();
            ?>
                <script type="text/javascript">
        window.alert("Check-in successful!");
        </script> <?php
            exit;
        }
        if (isset($_POST['COS']))
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if (!$conn) 
            { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            $pr = $_SESSION['ID'];
            $np1 = "SELECT PUNCH_ID, PUNCH_IN FROM punch WHERE Provider_PROVIDER_ID = '$pr' AND PStatus_STATUS_ID = 0";
            $qurya = $conn->query($np1);
            $a = mysqli_fetch_assoc($qurya);
            if($a['PUNCH_ID'] == null)
            {
                $conn->close();
                displayProfileMenu();
                ?>
                <script type="text/javascript">
                window.alert("There is no open punches!");
                </script> <?php
                exit;
            }
            $PI = $a['PUNCH_ID'];
            $start = new DateTime($a['PUNCH_IN']);
            $finish = new DateTime(date("H:i")); //now
            $tim = $finish->format("H:i");
            $dif = $start->diff($finish);
            $hours = $dif->h;
            //echo $dif->format("%H:%i");
            $min = floor(($dif->i / 60) * 100);
            //echo $hours . "." . $min;
            $th = $hours + ($min / 100);
            //echo $th;
            $np = "UPDATE punch SET PUNCH_OUT = '$tim', PUNCH_HOURS = '$th', PStatus_STATUS_ID = 4 WHERE PUNCH_ID = '$PI' AND Provider_PROVIDER_ID = '$pr'";
            $qury1 = $conn->query($np);
            $timestam = date('y-m-d H-i-s');
            $change = "INSERT INTO pstatusinfo (PSTATUSINFO_ID, PSTATUS_DATE, Punch_PUNCH_ID, Provider_PROVIDER_ID, PSTATUSINFO_LVL) VALUES (NULL, '$timestam', '$PI', '$pr', 4)";
            $qury5 = $conn->query($change);
            $conn->close();
            displayProfileMenu();
            ?>
            <script type="text/javascript">
            window.alert("Successfully checked out!");
            </script> <?php
            exit;
        }
        function toTime($time)
        {
            $f1 = explode(":",$time);
            return $f1[0] . ":" . $f1[1] . ":00";
        }
        function toDate($date)
        {
            $f1 = explode("-", $date);
            return $f1[0] . "-" . $f1[1] . "-" . $f1[2];
        }
        if (isset($_POST['adpusub']))
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if (!$conn) 
            { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            $pr = "";
            $pr1 = $_SESSION['ID'];
            $get = "SELECT PROV_PRIV FROM provider WHERE PROVIDER_ID = '$pr1'";
            $qury = $conn->query($get);
            $row = mysqli_fetch_assoc($qury);
            if($row['PROV_PRIV'] == 1)
            {
                $pr = $pr1;
            }
            else if($row['PROV_PRIV'] == 2)
            {
                $pr = $_POST['provi'];
            }
            if($_SESSION['ID'])
            $CI = $_POST['chin'];
            $CO = $_POST['chou'];
            $DA = $_POST['adate'];
            $SER = $_POST['SerA'];
            $CL = $_POST['clie'];
            if(empty($CI) || empty($CO) || empty($DA) || empty($CL) || empty($SER))
            {
                $conn->close();
                displayProfileMenu();
                ?>
                <script type="text/javascript">
                window.alert("One or more boxes are empty. Please try again.");
                </script> <?php
                exit;
            }
            $start = toTime($CI);
            $finish = toTime($CO);
            $dat = toDate($DA);
            $st = new DateTime($start);
            $fi = new DateTime($finish);
            $dif = $st->diff($fi);
            $hours = $dif->h;
            //echo $dif->format("%H:%i");
            $min = floor(($dif->i / 60) * 100);
            //echo $hours . "." . $min;
            $th = $hours + ($min / 100);
            $ge = "SELECT CLI_ID FROM client WHERE CLI_LAST = '$CL'";
            $qury2 = $conn->query($ge);
            $row2 = mysqli_fetch_assoc($qury2);
            $last = $row2['CLI_ID'];
            $new = "INSERT INTO punch (PUNCH_ID, PUNCH_IN, PUNCH_OUT, PUNCH_HOURS, PUNCH_DATE, Client_CLI_ID, Provider_PROVIDER_ID, Service_SERVICE_ID, PStatus_STATUS_ID)
                    VALUES (NULL, '$start', '$finish', '$th', '$dat', '$last', '$pr', '$SER', '4')";
            $qury3 = $conn->query($new);
            $np = "SELECT PUNCH_ID FROM punch WHERE PUNCH_IN = '$start' AND PUNCH_OUT = '$finish'";
            $qury4 = $conn->query($np);
            $PI1 = mysqli_fetch_assoc($qury4);
            $PI = $PI1['PUNCH_ID'];
            $timestam = date('y-m-d H-i-s');
            $change = "INSERT INTO pstatusinfo (PSTATUSINFO_ID, PSTATUS_DATE, Punch_PUNCH_ID, Provider_PROVIDER_ID, PSTATUSINFO_LVL) VALUES (NULL, '$timestam', '$PI', '$pr', 5)";
            $qury5 = $conn->query($change);
            $conn->close();
            displayProfileMenu();
            ?>
                <script type="text/javascript">
        window.alert("Punch added!");
        </script> <?php
            exit;
        }
        if (isset($_POST['addclient']))
        {
            $CLN = $_POST['cln'];
            $CFN = $_POST['cfn'];
            $PAID = $_POST['paid'];
            if(empty($CLN) || empty($CFN) || empty($PAID))
            {
                displayProfileMenu();
                ?>
                <script type="text/javascript">
                window.alert("One or more boxes are empty. Please try again.");
                </script> <?php
                exit;
            }
            $conn = mysqli_connect('localhost:3308', 'root');
            if (!$conn) 
            { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            $insert = "INSERT INTO client (CLI_ID, CLI_LAST, CLI_FIRST, CLI_RHOURS, CLI_HHOURS, CLI_AHOURS, PROV_ID) VALUES (NULL, '$CLN','$CFN', 0.00, 0.00, 0.00, '$PAID')";
            $qury1 = $conn->query($insert);
            $conn->close();
            displayProfileMenu();
            ?>
                <script type="text/javascript">
        window.alert("Client added!");
        </script> <?php
            exit;
        }
        if(isset($_POST['adprsub']))
        {
            //fix this later for username.
        }
        if(isset($_POST['vch'])) //punch chnages
        {
        $_SESSION['VPR'] = false;
        $_SESSION['VCLI'] = false;
        $_SESSION['VPU'] = false;
        $_SESSION['VPCH'] = true;
        displayProfileMenu();
        exit;
        }
        if(isset($_POST['vpc'])) //punch
        {
        $_SESSION['VPR'] = false;
        $_SESSION['VCLI'] = false;
        $_SESSION['VPU'] = true;
        $_SESSION['VPCH'] = false;
        displayProfileMenu();
        exit;
        }
        if(isset($_POST['vp'])) //provider
        {
        $_SESSION['VPR'] = true;
        $_SESSION['VCLI'] = false;
        $_SESSION['VPU'] = false;
        $_SESSION['VPCH'] = false;
        displayProfileMenu();
        exit;
        }
        if(isset($_POST['vc'])) //client
        {
        $_SESSION['VPR'] = false;
        $_SESSION['VCLI'] = true;
        $_SESSION['VPU'] = false;
        $_SESSION['VPCH'] = false;
        displayProfileMenu();
        exit;
        }
        if(isset($_POST['testP'])) //Generates 3000 punches
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if (!$conn) 
            { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            for($x = 0; $x < 30000; ++$x)
            {
             $new = "INSERT INTO punch (PUNCH_ID, PUNCH_IN, PUNCH_OUT, PUNCH_HOURS, PUNCH_DATE, Client_CLI_ID, Provider_PROVIDER_ID, Service_SERVICE_ID, PStatus_STATUS_ID)
                    VALUES (NULL, '10:00:00', '10:00:00', '0.00', '2019-12-11', '1', '2', '3', '4')";
             $conn->query($new);
            }
            $conn->close();
            displayProfileMenu();
            exit;
        }
        if(isset($_POST['testPU'])) //deletes 3000 punches
        {
            $conn = mysqli_connect('localhost:3308', 'root');
            if (!$conn) 
            { //connection failed?
                header('Location: LoginConnectionFailed.html');
                die('Could not connect: ' . mysqli_connect_error());
            }
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn->select_db('capstone');
            for($x = 0; $x < 30000; ++$x)
            {
             $new = "DELETE FROM punch WHERE PUNCH_DATE = '2019-12-11'";
             $conn->query($new);
            }
            $conn->close();
            displayProfileMenu();
            exit;
        }
        session_destroy();
        header('Location: Login.html');
        ?>
    </body>
    
</html>
