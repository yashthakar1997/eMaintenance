<?php 
                session_start();
                include('includes/header.php');
                include('includes/dbConfig.php');
                include('includes/sidenav.php');
?>

        <section class="content blocked_user_content">
            <!-- <div class="main"> -->
                <!--LEFT_SIDEBAR_MENU-->
                <section class="blocked_users">
                    <div class="container blocked_user">
                       <div class="row">                       
    <?php
        if(isset($_POST['enable'])){
            $sql = "UPDATE user SET status='1' WHERE uid=".$_POST['enable'];
            if($conn->query($sql)){
                    echo "<script>console.log('user enabled successfuly')</script>";
            }
        }
        $sql = "SELECT * from user u inner join user_details ud on u.uid = ud.uid inner join role r on ud.role_id=r.role_id INNER JOIN dept d ON ud.dept = d.id INNER JOIN college c where u.status='0' AND ud.dept=d.id AND ud.college=c.id";
        $result = $conn->query($sql);
    
        // user retrive logic
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
          echo "<script>console.log('role = ".$row['role_name']."')</script>";  
          $user_name = $row['user_name'];
          $uid = $row['uid'];
          $user_email = $row['user_email'];
          $mobile = $row['mobile'];
          $status = $row['status'];
          $role_name = $row['role_name'];
          $_SESSION['ROLE'] = $row['role_name'];
          $dept_name = $row['dept_name'];
          $college_name = $row['college_name'];
    ?>
                
                        <div class="col s12">
                            <form action="" method="post">
                                <div class="card horizontal blocked_user_detail">
                                    <div class="card-image user_profile_img">
                                        <img class="materialboxed" src="images/User-profile-image.jpeg" height="250">
                                    </div>
                                    <div class="card-stacked">
                                        <div class="card-content user_info_area">
                                                <ul class="user_info">
                                                    <li><?php echo $user_name; ?></li>   

                                                    <li>
                                                        <div class="input-field">
                                                            <select>
                                                                <option value="" disabled selected><?php echo $role_name; ?></option>
                                                              
                                                            </select>                                                
                                                        </div>
                                                    </li>

                                                    <li><?php echo $user_email; ?></li> 

                                                    <li>
                                                        <div class="input-field">
                                                            <select>
                                                                <option value="" disabled selected><?php echo $dept_name; ?></option>
                                                                
                                                            </select>                                                
                                                        </div>
                                                    </li>

                                                    <li><?php echo $mobile; ?></li>

                                                    <li>
                                                        <div class="input-field">
                                                            <select>
                                                                <option value="" disabled selected><?php echo $college_name; ?></option>
                                                               
                                                            </select>                                                
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="enable_blocked_user">                                                                                                               
                                                    <button class="btn orange" type="submit" name="enable" value="<?php echo $uid; ?>">Enable</button>
                                                </div>                                                                                                                                                                        
                                        </div>                                
                                    </div>                            
                                </div>
                            </form>     
                        </div>
        <?php
                 }
            }
        ?>
                      </div>
                    </div>                      
                </section>

                <footer class="profile_page_footer">
                    <div class="container">
                        <span class="copy_right">Copyright &COPY; 2018 eMaintenance</span>
                    </div>
                </footer>
            </div>
        </section>

        <!-- PAGE_FOOTER_SECTION -->
        
        

      <!--Import jQuery before materialize.js-->          
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>      
    </body>
  </html>