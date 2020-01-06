<?php
// include "testincld.php"
include("db/db_connect.php");
?>


<link href="/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/default.css">
<script src="https://kit.fontawesome.com/435b17dbc0.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- dd menu -->

<script type="text/javascript">
    var timeout = 500;

    var closetimer = 0;

    var ddmenuitem = 0;



    // open hidden layer

    function mopen(id)

    {

        // cancel close timer

        mcancelclosetime();



        // close old layer

        if (ddmenuitem) ddmenuitem.style.visibility = 'hidden';



        // get new layer and show it

        ddmenuitem = document.getElementById(id);

        ddmenuitem.style.visibility = 'visible';



    }

    // close showed layer

    function mclose()

    {

        if (ddmenuitem) ddmenuitem.style.visibility = 'hidden';

    }



    // go close timer

    function mclosetime()

    {

        closetimer = window.setTimeout(mclose, timeout);

    }



    // cancel close timer

    function mcancelclosetime()

    {

        if (closetimer)

        {

            window.clearTimeout(closetimer);

            closetimer = null;

        }

    }



    // close layer when click-out

    document.onclick = mclose;

    // -->
</script>
<style>
    @import url("https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style-type: none;
        text-decoration: none;
        font-family: "Josefin Sans", sans-serif;
    }

    .sidenav {
        width: 100px;
        float: left;
    }

    .sidebar {
        background: blueviolet;
        width: 200px;
        height: 100%;
        padding: 30px 0;
    }

    .wrapper .sidebar h2 {
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
    }

    .wrapper .sidebar ul li {
        padding: 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.5);
    }

    .wrapper .sidebar ul li ul.submenu {
        padding: 14px;
        text-align: left;
        color: red;
        border-bottom: 1px solid rgba(0, 0, 0, 0.5);
        repeat: once;
    }

    .wrapper .sidebar ul li ul.submenu a {
        color: #bdb8d7;
        display: flex;

    }

    .wrapper .sidebar ul li a {
        color: #bdb8d7;
        display: block;
    }

    .wrapper .sidebar ul li a fa {
        width: 25 px;
    }

    .wrapper .sidebar ul li:hover {
        background: #594f8d;
    }

    .wrapper .sidebar ul li:hover a {
        color: #fff;
    }

    .wrapper .main_content {
        width: 100;
        margin-left: 200px;
    }
</style>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2>WiseCare HMS</h2>
            <ul class="" id="sddm">



                <?php



                $curredattim = date("Y-m-d H:i:s");

                // $curuser = $_SESSION['username'];

                function classes($mainmenutext)
                {
                    switch ($mainmenutext) {
                        case 'Home':
                            $class = "fa fa-home";
                            break;
                        case 'System Setup':
                            $class = "fa fa-cogs";
                            break;
                        case 'IP Masters':
                            $class = "fa fa-cog";
                            break;
                        case 'Patients':
                            $class = "fa fa-stethoscope";
                            break;
                        case 'Inpatient':
                            $class = "fa fa-user-md";
                            break;
                        case 'Cashier':
                            $class = "fa fa-money";
                            break;
                        case 'Laboratory':
                            $class = "fa fa-question-circle";
                            break;
                        case 'Radiology':
                            $class = "fa fa-hospital-o";
                            break;
                        case 'Procedures':
                            $class = "fa fa-list-alt";
                            break;
                        case 'Bill Amendments':
                            $class = "fa fa-check";
                            break;
                        case 'Accounts':
                            $class = "fa fa-user";
                            break;
                        case 'Stores':
                            $class = "fa fa-archive";
                            break;
                        case 'Purchases':
                            $class = "fa fa-shopping-cart";
                            break;
                        case 'Pharmacy':
                            $class = "fa fa-medkit";
                            break;
                        case 'eRecords':
                            $class = "fa fa-file";
                            break;
                        case 'Self Request':
                            $class = "fa fa-refresh";
                            break;
                        case 'Static Reports':
                            $class = "fa fa-stack-overflow";
                            break;
                        case 'Reports':
                            $class = "fa fa-files-o";
                            break;
                        case 'IP Reports':
                            $class = "fa fa-file-text-o";
                            break;
                        case 'Settings':
                            $class = "fa fa-cog";
                            break;
                        case 'Fixed Assets':
                            $class = "fa fa-suitcase";
                            break;
                        case 'Payroll':
                            $class = "fa fa-eur";
                            break;
                        case 'Budget':
                            $class = "fa fa-btc";
                            break;
                        default:
                            $class = "";
                            break;
                    }
                    return $class;
                }

                if (isset($_REQUEST['mainmenuid'])) {
                    $mainmenuid = $_REQUEST['mainmenuid'];
                } else {
                    $mainmenuid = "";
                }

                //echo $mainmenuid;

                if (isset($_REQUEST['anum'])) {
                    $anum = $_REQUEST['anum'];
                } else {
                    $anum = "";
                }

                //echo $anum;



                $pagename = $_SERVER['PHP_SELF'];

                $page = substr($pagename, 7);



                $page = basename($pagename, '.php');

                $mmtext = '';



                if ($mainmenuid == '') {

                    $query11 = "SELECT * from master_menusub where submenulink like '%$page%'";

                    $exec11 = mysqli_query($con, $query11) or die("Error in Query11" . mysqli_error($query11));

                    while ($res11 = mysqli_fetch_array($exec11)) {

                        $submenuid = $res11['submenuid'];

                        $mainmenuid = $res11['mainmenuid'];
                    }
                }

                if ($mainmenuid != '') {

                    $query12 = "select * from master_menumain where mainmenuid = '$mainmenuid'";

                    $exec12 = mysqli_query($con, $query12) or die("Error in Query12" . mysqli_error($query12));

                    $res12 = mysqli_fetch_array($exec12);



                    $mmorder = $res12["mainmenuorder"];

                    $mmtext = $res12["mainmenutext"];

                    $mmlink = $res12["mainmenulink"];

                    $mmid = $res12["mainmenuid"];
                }



                $_SESSION['mmbgcolor'] = $mmtext;



                $idletime = 12000000; //after 60 seconds the user gets logged out





                $mmtext = $_SESSION['mmbgcolor'];

                //on session creation

                $_SESSION['timestamp'] = time();



                $randomnumber1 = date("dmYHis");

                $sessionusername = $_SESSION["username"];





                $query1mm = "select * from master_menumain where status <> 'deleted' order by mainmenuorder";

                $exec1mm = mysqli_query($con, $query1mm) or die("Error in Query1mm" . mysqli_error($query1mm));

                while ($res1mm = mysqli_fetch_array($exec1mm)) {

                    $mainmenuorder = $res1mm["mainmenuorder"];

                    $mainmenutext = $res1mm["mainmenutext"];

                    $mainmenulink = $res1mm["mainmenulink"];

                    $mainmenuid = $res1mm["mainmenuid"];

                    $fa = $res1mm["fa_icon"];



                    $query9 = "select * from master_employeerights where username = '$sessionusername' and mainmenuid = '$mainmenuid'";

                    $exec9 = mysqli_query($con, $query9) or die("Error in query9" . mysqli_error($query9));

                    $rowcount9 = mysqli_num_rows($exec9);

                    if ($rowcount9 != 0) {



                ?>

                        <!--	<li> <a href="<?php echo $mainmenulink . '?rand=' . $randomnumber1; ?>" ><?php echo $mainmenutext; ?></a><!--onmouseover="mopen('m<?php echo $mainmenuorder; ?>')" onmouseout="mclosetime()"-->



                        <li>
                            <a href="<?php echo $mainmenulink ?>">
                                <i class="<?php echo classes($mainmenutext); ?>" style="font-size:25px, padding-right=5px"></i>
                                &nbsp;&nbsp;
                                &nbsp;&nbsp;
                                <span class="menubutton" id="menubutton" <?php if ($mainmenutext == $mmtext) { ?> <?php } ?>>
                                    <?php echo $mainmenutext; ?>
                                    <br></span></a>
                            <ul class="submenu">
                                <?php



                                $randomnumber1 = date("dmYHis");

                                $mainmenid = $_REQUEST["mainmenuid"];

                                $sessionusername = $_SESSION["username"];







                                if ($mainmenid == 'MM006') {



                                    $query2sm = "select * from master_menusub where mainmenuid = '$mainmenid' and status <> 'deleted' order by submenutext";

                                    $exec2sm = mysqli_query($con, $query2sm) or die("Error in Query2sm" . mysqli_error($query2sm));

                                    while ($res2sm = mysqli_fetch_array($exec2sm)) {

                                        $submenuorder = $res2sm["submenuorder"];

                                        $submenutext = $res2sm["submenutext"];

                                        $submenulink = $res2sm["submenulink"];

                                        $submenuid1 = $res2sm["submenuid"];



                                        $query10 = "select * from master_employeerights where username = '$sessionusername' and submenuid = '$submenuid1'";

                                        $exec10 = mysqli_query($con, $query10) or die("Error in query10" . mysqli_error($query10));

                                        $rowcount10 = mysqli_num_rows($exec10);

                                        if ($rowcount10 != 0) {



                                ?>

                                            <li><a href="<?php echo $submenulink; ?>">

                                                    <?php echo $submenutext; ?>

                                                </a></li>

                                        <?php



                                        }
                                    }
                                } else {

                                    $query2sm = "select * from master_menusub where mainmenuid = '$mainmenid' and status <> 'deleted' order by submenuorder";

                                    $exec2sm = mysqli_query($con, $query2sm) or die("Error in Query2sm" . mysqli_error($querysm));

                                    while ($res2sm = mysqli_fetch_array($exec2sm)) {

                                        $submenuorder = $res2sm["submenuorder"];

                                        $submenutext = $res2sm["submenutext"];

                                        $submenulink = $res2sm["submenulink"];

                                        $submenuid = $res2sm["submenuid"];





                                        $query10 = "select * from master_employeerights where username = '$sessionusername' and submenuid = '$submenuid'";

                                        $exec10 = mysqli_query($con, $query10) or die("Error in query10" . mysqli_error($query10));

                                        $rowcount10 = mysqli_num_rows($exec10);

                                        if ($rowcount10 != 0) {



                                        ?>

                                            <li><a href="<?php echo $submenulink; ?>">

                                                    <?php echo $submenutext; ?>

                                                </a></li>

                                <?php





                                        }
                                    }
                                }

                                ?>

                            </ul>
                            <!--onmouseover="mopen('m<?php echo $mainmenuorder; ?>')" onmouseout="mclosetime()"-->

                            <!--<?php

                                $query1sm = "select * from master_menusub where mainmenuid = '$mainmenuid' and status <> 'deleted' order by submenuorder";

                                $exec1sm = mysqli_query($con, $query1sm) or die("Error in Query1sm" . mysqli_error($query1sm));

                                $rowcount1sm = mysqli_num_rows($exec1sm);

                                ?>

		<div id="m<?php echo $mainmenuorder; ?>" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">

		<?php

                        $query2sm = "select * from master_menusub where mainmenuid = '$mainmenuid' and status <> 'deleted' order by submenuorder";

                        $exec2sm = mysqli_query($con, $query2sm) or die("Error in Query2sm" . mysqli_error($query2sm));

                        while ($res2sm = mysqli_fetch_array($exec2sm)) {

                            $submenuorder = $res2sm["submenuorder"];

                            $submenutext = $res2sm["submenutext"];

                            $submenulink = $res2sm["submenulink"];

                            $submenuid = $res2sm["submenuid"];



                            $query10 = "select * from master_employeerights where username = '$sessionusername' and submenuid = '$submenuid'";

                            $exec10 = mysqli_query($con, $query10) or die("Error in query10" . mysqli_error($query10));

                            $rowcount10 = mysqli_num_rows($exec10);

                            if ($rowcount10 != 0) {

        ?>
	

		

		<?php

                            }
                        }

        ?>

		</div>-->

                            <?php

                            ?>

                        </li>

                <?php

                    }
                }

                ?>

            </ul>
        </div>

    </div>
</body>