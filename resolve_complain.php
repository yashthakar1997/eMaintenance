<?php
    session_start();
    include('includes/header.php');
    include('includes/sideNav.php');

    // on HOD update
    if(isset($_POST['action'])){
        $update_db = "UPDATE complain_log SET resolver_id=".$_POST['forward_select'].", comments='".$_POST['comments']."',status='5' WHERE c_id=".$_POST['uid'];
        if ($conn->query($update_db) === TRUE) {
            echo "<script>alert('Record updated successfully')</script>";
            require_once "nexmo/vendor/autoload.php";


            // $basic  = new \Nexmo\Client\Credentials\Basic('dad3af06', '8b76743e8cc63599');
            // $client = new \Nexmo\Client($basic);
            // // $test = "New Complain regestered";

            // $message = $client->message()->send([
            //     'to' => $mobile,
            //     'from' => 'Yash Thakar',
            //     'text' => $text
            // ]);

        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    if(isset($_POST['reject'])){
        $update_db = "UPDATE complain_log SET comments='".$_POST['comments']."',status='3' WHERE c_id=".$_POST['uid'];
        if ($conn->query($update_db) === TRUE) {
            echo "<script>alert('Record updated successfully')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    if(isset($_POST['Finished'])){
        $update_db = "UPDATE complain_log SET comments='".$_POST['comments']."',status='2' WHERE c_id=".$_POST['uid'];
        if ($conn->query($update_db) === TRUE) {
            echo "<script>alert('Record updated successfully')</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // principal remaining 
 
    switch ($role_name) {
    case "principal":
        // echo "Welcome Principal";
       
        ?>
        <!-- for tabs  -->
        <div class="row"><div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6"><a class="active" href="#Forward">Forward Complain</a></li>
                    <li class="tab col s6"><a  href="#MyComplain">Solve Complain</a></li>
                </ul>
        </div>
                <div id="Forward" class="col s12 ">
                <!-- forward Complain -->
                    <section class="resolve_complain container">
                            <?php           
                                require_once('includes/forwad_Complain_Principal.php'); 
                            ?>
                    </section>
                 </div>
                 <!-- Solve Complain -->
                <div id="MyComplain" class="col s12">
                    <div class="container">
                    <?php
                        include('includes/myComplain.php');
                        ?>
                    </div>
                </div>
         </div>
         <?php

    break;
    case "H.O.D":
        // echo "Welcome H.o.D";
        ?>
        <!-- for tabs  -->
        <div class="row"><div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6"><a class="active" href="#Forward">Forward Complain</a></li>
                    <li class="tab col s6"><a  href="#MyComplain">Solve Complain</a></li>
                </ul>
        </div>
                <div id="Forward" class="col s12 ">
                <!-- forward Complain -->
                    <section class="resolve_complain container">
                            <?php           
                                require_once('includes/forwad_Complain_HOD.php'); 
                            ?>
                    </section>
                 </div>
                 <!-- Solve Complain -->
                <div id="MyComplain" class="col s12">
                    <div class="container">
                    <?php
                        include('includes/myComplain.php');
                        ?>
                    </div>
                </div>
         </div>
         <?php
    break;
    case "faculty":
            ?>
            <div id="MyComplain" class="col s12">
                <div class="container">
                <?php
                    include('includes/myComplain.php');
                ?>
                </div>
            </div>
        <?php
    break;
    case "Supporting Staff":
        ?>
            <div id="MyComplain" class="col s12">
                <div class="container">
                <?php
                    include('includes/myComplain.php');
                ?>
                </div>
            </div>
        <?php
        break;
    default:
        echo "Contact Admins As your Role Dosent Set to any Default roles";
    }
    ?>
       
            
            <!-- PAGE_FOOTER_SECTION -->
            <footer class="profile_page_footer">
                <div class="container">
                    <span class="copy_right">Copyright &COPY; 2018 eMaintenance</span>
                </div>
            </footer>
        </div>
    </section>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>