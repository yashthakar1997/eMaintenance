<?php
    // session_start();
    include('includes/dbConfig.php');
    $user = $_SESSION['USER'];
    $user_details = "SELECT * from user u inner join user_details ud on u.uid = ud.uid inner join role r on ud.role_id=r.role_id INNER JOIN dept d ON ud.dept = d.id INNER JOIN college c where u.status='1' AND ud.dept=d.id AND ud.college=c.id AND u.uid = '$user' ";
    $result = $conn->query($user_details);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $user_name = $row['user_name'];
            $role_name = $row['role_name'];
            $mobile =  $row['mobile'];
            $user_email = $row['user_email'];
            $dept_name = $row['dept_name'];
            $college_name = $row['college_name'];
        }
    } else {
        echo "<script>console.log('invalid User')</script>";
        $msg = "Please contact Admin as Your account is not approved !!!!";
        header("location:index.php?Message=".$msg);
    }
    $_SESSION['ROLE'] = $role_name;
?>
<!--MAIN_CONTENT_SECTION-->
<section class="content">
            <div class="main">
                <!--LEFT_SIDEBAR_MENU-->
                <aside class="left_side_navbar">
                    <a href="#" data-activates="left-nav" class="button-collapse left-side-nav hide-on-large-only"><i class="material-icons">menu</i></a>
                    <ul class="side-nav fixed" id="left-nav">                        
                     <li class="side_nav_user_profile">
                         <img class="" src="images/Side-nav-profile-background.png" alt="profilr-background">
                         <div class="side_nav_user_prodfile">
                            <ul class="side-nav-up-data">
                                <li><img src="images/User-profile-image.jpeg" alt="user-image"></li>
                                <li>
                                    <a class="dropdown-button waves-effect waves-light " href='#' data-activates='user-options'>
                                        <i class="material-icons">arrow_drop_down</i>
                                        <span class="User-name"><?php echo $user_name; ?></span>                                      
                                </a>
                                <ul id='user-options' class='dropdown-content user-option-data'>
                                
                                    <li><a href="user-profile.php" class="profile-option"><i class="material-icons">face</i>Profile</a></li>
                                    <li><a href="#" class="profile-setting"><i class="material-icons">settings</i>Settings</a></li>
                                    <li><a href="logout.php" class="log-out"><i class="material-icons">keyboard_tab</i>Logout</a></li>        
                                </ul>
                                <p class="user-role"><?php echo $role_name; ?></p>
                                </li>
                            </ul>
                         </div>
                     </li>
                     
                    <?php
                        $sql = "SELECT * FROM sidenav s,user_details ud where uid = '".$_SESSION['USER']."'AND ud.role_id = s.role_id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // echo "<script>console.log('invalid User')</script>";
                            while($row = $result->fetch_assoc()) {
                                // echo ;
                                echo "<li class='side_nav_link'><a class='waves-effect' href=".$row['link'].".php ><i class='material-icons'>". $row['icon'] ."</i>".$row['name']."</a></li></li>";
                            }
                        } else {
                            echo "<script>console.log('invalid User')</script>";
                        }

                        
                    ?>
                    </ul>
                </aside>          
                    
