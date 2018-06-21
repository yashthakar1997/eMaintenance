<section class="profile admin_profile">
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
                                        <h6 class="user_name"><?php echo $user_name; ?></h6>                                        
                                        <span class="user-role"><?php echo $role_name; ?></span>
                                    </div>
                                    <div class="col m2 s4 center-align total_complain">
                                        <?php
                                        $user = "SELECT count(*) as total FROM user";
                                        $user_result = $conn->query($user);
                                        $user_data = mysqli_fetch_assoc($user_result);         
                                        ?>
                                        <h6 class="no_complain"><?php echo $user_data['total']; ?></h6>                                        
                                        <span class="complain">Users</span>
                                    </div>
                                    <div class="col m2 s4 center-align my_complain">
                                        <?php
                                        $complain = "SELECT count(*) as total FROM complain";
                                        $complain_result = $conn->query($complain);
                                        $complain_data = mysqli_fetch_assoc($complain_result);         
                                        ?>
                                            <h6 class="no_my_complain"><?php echo $complain_data['total']; ?></h6>                                        
                                            <span class="my_complain">Complaints</span>
                                    </div>
                                    <div class="col m2 s4 center-align unresolved">
                                            <h6 class="no_Unresolved">40+</h6>                                        
                                            <span class="unresolved">solved</span>
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
                                <h5 class="user_name_exapnd"><?php echo $user_name; ?></h5>
                                <ul class="user_expand_details">
                                    <li>
                                        <i class="material-icons">person</i>
                                        <span><?php echo $role_name; ?></span>
                                    </li>
                                    <li>
                                        <i class="material-icons">call</i>
                                        <span>+91 9725171322</span>
                                    </li>
                                    <li>
                                        <i class="material-icons">email</i>
                                        <span>parthchaudhary69@gmail.com</span>
                                    </li>
                                    <li>
                                        <i class="material-icons">cake</i>
                                        <span>29-april-1996</span>
                                    </li>                                    
                                </ul>                                                            
                            </div>
                        </div>                        
                    </div>
                </section>

<section class="compain_list ">
                    <div class="container">
                       <div class="row">                       
                        <div class="col s12">     
                            <div class="card horizontal complain_detail">
                                <div class="card-image complain_img user_profile_img">
                                    <img class="materialboxed" src="images/User-profile-image.jpeg" height="250">
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content complain_desc user_info_area">
                                            <ul class="user_info">
                                                <li>Parth Chaudhary</li>   

                                                <li>
                                                    <div class="input-field">
                                                        <select>
                                                            <option value="" disabled selected>Change Role</option>
                                                            <option value="1">Admin</option>
                                                            <option value="2">Principle</option>
                                                            <option value="3">HOD</option>
                                                        </select>                                                
                                                    </div>
                                                </li>

                                                <li>parthchaudhary69@gmail.com</li> 

                                                <li>
                                                    <div class="input-field">
                                                        <select>
                                                            <option value="" disabled selected>Department</option>
                                                            <option value="1">Mechenical</option>
                                                            <option value="2">Civil</option>
                                                            <option value="3">Electricle</option>
                                                            <option value="4">E&C</option>
                                                            <option value="5">Computer</option>
                                                        </select>                                                
                                                    </div>
                                                </li>

                                                <li>97255171322</li>

                                                <li>
                                                    <div class="input-field">
                                                        <select>
                                                            <option value="" disabled selected>college</option>
                                                            <option value="1">GEC, Patan</option>
                                                            <option value="2">GEC, Palanpur</option>
                                                            <option value="3">GEC, Ghandhinagar</option>
                                                        </select>                                                
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="changes_save_btn">                                                
                                                <div class="switch">
                                                    <label class="">
                                                        Disable
                                                        <input type="checkbox">
                                                        <span class="lever"></span>
                                                        Enable
                                                    </label>
                                                </div>               
                                                <input class="btn orange" type="button" value="Save Changes">                                 
                                            </div>                                                                                                                                                                        
                                    </div>                                
                                </div>                            
                            </div>
                        </div>
                      </div>
                    </div>                      
                </section>