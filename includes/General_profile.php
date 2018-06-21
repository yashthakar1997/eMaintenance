<section class="profile">
                    <div class="container">
                        <div class="card profile_area">
                            <div class="profile_background card-image waves-effect waves-block waves-light">
                                <img class="profile_background_img activator" src="images/profile-backgound.png">
                            </div>
                            <div class="profile_content card-content">
                                <div class="row">
                                    <div class="col m2 s12 profile_image_area">
                                        <img class="circle z-depth-2 responsive-img activator profile_image" src="images/User-profile-image.jpeg" alt="">
                                    </div>
                                    <div class="col m3 s12 user_name_role">
                                        <h6 class="user_name"><?php echo $user_name ?></h6>                                        
                                        <span class="user-role"><?php echo $role_name ?></span>
                                    </div>
                                    <div class="col m2 s4 center-align total_complain">
                                    <?php
                                        $uid = $_SESSION['USER'];
                                        $complain_sql = "SELECT count(*) as total FROM complain where uid='$uid'";
                                        $complain_result = $conn->query($complain_sql);
                                        $complain_data = mysqli_fetch_assoc($complain_result);    
                                        ?>
                                        <h6 class="no_complain"><?php echo $complain_data['total']; ?></h6>                                        
                                        <span class="complain">Total Complain</span>
                                    </div>
                                    <div class="col m2 s4 center-align my_complain">
                                        <?php
                                        $uid = $_SESSION['USER'];
                                        $complain_log_sql = "SELECT count(*) as total FROM complain_log where uid='$uid'";
                                        $complain_log_result = $conn->query($complain_log_sql);
                                        $complain_log_data = mysqli_fetch_assoc($complain_log_result); 
                                        ?>
                                            <h6 class="no_my_complain"><?php echo $complain_log_data['total'];  ?></h6>                                        
                                            <span class="my_complain">My Complain</span>
                                    </div>
                                    <div class="col m2 s4 center-align unresolved">
                                            <h6 class="no_Unresolved">0</h6>                                        
                                            <span class="unresolved">Unresolved</span>
                                    </div>
                                    <div class="col m1 center-align user_data hide-on-med-and-down">
                                        <a class="btn-floating waves-effect waves-light darken-2 right">
                                            <i class="material-icons activator">perm_identity</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="user-profile-details card-reveal">
                                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                                <h5 class="user_name_exapnd"><?php echo $user_name ?></h5>
                                <ul class="user_expand_details">
                                    <li>
                                        <i class="material-icons">person</i>
                                        <span><?php echo $role_name ?></span>
                                    </li>
                                    <li>
                                        <i class="material-icons">call</i>
                                        <span><?php echo $mobile ?></span>
                                    </li>
                                    <li>
                                        <i class="material-icons">email</i>
                                        <span><?php echo $user_email ?></span>
                                    </li>
                                    <li>
                                        <i class="material-icons">business</i>
                                        <span><?php echo $dept_name ?></span>
                                    </li>   
                                    <li>
                                        <i class="material-icons">location_city</i>
                                        <span><?php echo $college_name ?></span>
                                    </li>                             
                                    
                                </ul>                                                            
                            </div>
                        </div>                        
                    </div>
                </section>