<?php
    session_start();
    include('includes/header.php');
    include('includes/dbConfig.php');



    if(empty($_SESSION['USER'])){
        echo "<script>console.log('invalid User')</script>";
        header('location:index.php');
    } else {
        echo $_SESSION['USER'];
        echo "<script>console.log('user id = ".$_SESSION['USER']."')</script>";
    }

    include 'includes/sidenav.php';
  

    if(isset($_POST['Add_user'])){

        $user_name = $_POST['user_name'];
        $user_password = md5($_POST['user_password']); //md5 password conversion
        $user_email = $_POST['user_email'];
        
        $user = "INSERT INTO user (user_name, user_email, user_password,status)
        VALUES ('$user_name', '$user_email', '$user_password','1')";
        
        if ($conn->query($user) === TRUE) {
          $last_id = $conn->insert_id;
      
          $mobile = $_POST['mobile'];
          $email = $_POST['email'];
          $college = $_POST['college'];
          $dept = $_POST['dept'];
          $role_id = $_POST['role_id'];
      
          $user_details = "INSERT INTO user_details (uid,role_id,mobile,email,college,dept)
          VALUES ('$last_id', '$role_id','$mobile','$email','$college','$dept')";
        
          if ($conn->query($user_details) === TRUE) {
          echo "<script>console.log('user Successfully Created')</script>";
            // echo "<script>alert('Successfully Registered Login To Continue...')</script>";
          } else {
            echo "Error: ". $user_details . "<br>" . $conn->error;
          }
      
        } else {
            echo "Error: " . $user . "<br>" . $conn->error;
        }
      }


    ?>



    <section class="profile admin_manage_user">
        <div class="container">
            <div class="row">
    <?php
    // disable button
    if(isset($_POST['disable'])){
        $sql = "UPDATE user SET status='0' WHERE uid=".$_POST['disable'];
        if($conn->query($sql)){
                echo "<script>console.log('user disabled successfuly')</script>";
        }
    }


    $sql = "SELECT * from user u inner join user_details ud on u.uid = ud.uid inner join role r on ud.role_id=r.role_id INNER JOIN dept d ON ud.dept = d.id INNER JOIN college c where u.status='1' AND ud.dept=d.id AND ud.college=c.id ";    
    $result = $conn->query($sql);

    // user retrive logic
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          
        //   echo "<script>console.log('role = ".$row['role_name']."')</script>";  
  
          $_SESSION['USERNAME'] = $user_name = $row['user_name'];
          $uid = $row['uid'];
          $user_email = $row['user_email'];
          $mobile = $row['mobile'];
          $status = $row['status'];
          $role_name = $row['role_name'];
          $_SESSION['ROLE'] = $row['role_name'];
          $dept_name = $row['dept_name'];
          $college_name = $row['college_name'];
    
        ?>

     <div class="col l4 m4 s12">
                                <div class="card manage_user_details">
                                    <div class="card-image manage_user_img">
                                        <img class="circle responsive-img" src="images/User-profile-image.jpeg" >                                        
                                    </div>
                                    <div class="card-content manage_user_content">
                                        <h5 class="user_name"><?php echo $user_name ?></h5>
                                    </div>
                                    <div class="card-action manage_user_options">
                                    <form action="manage_user.php" method="post">
                                        <button data-target="manage_user_model<?php echo $uid ?>" class="btn modal-trigger amber">Edit</button>
                                        <button class="btn amber" value="<?php echo $uid ?>" name="disable">Disable</button>
                                    </form>
                                        <form action="" id="manage_user_form">                                            
                                            <div id="manage_user_model<?php echo $uid ?>" class="modal">                                                                                                                                    
                                                <a href="#!" class="modal-action modal-close waves-effect waves-green close_btn right" style="position: relative; top:10px;"><i class="material-icons">close</i></a>
                                                <div class="modal-content">                                                    
                                                    <div class="row">
                                                        <div class="col m2 s12">
                                                            <img class="circle" height="100" src="images/User-profile-image.jpeg" alt="">
                                                        </div>
                                                        <div class="col m10 s12">
                                                            <div class="row">
                                                                <div class="input-field col m6 s12">
                                                                    <input value="<?php echo $user_name ?>" id="user_name" type="text" class="validate">
                                                                    <label class="active" for="user_name">Name</label>
                                                                </div>

                                                                <div class="input-field col m6 s12">
                                                                    <select class="reg_select">
                                                                        <option value="" disabled>Role</option>
                                                                        <option value="0"selected><?php echo $role_name ?> </option>
                                                                        <option value="1">Principle</option>
                                                                        <option value="2">HOD</option>
                                                                        <option value="3">Co-Ordinator</option>
                                                                    </select>
                                                                </div>

                                                                <div class="input-field col m6 s12">
                                                                    <input value="<?php echo $user_email ?>" id="user_email" type="email" class="validate">
                                                                    <label class="active" for="user_email">email</label>
                                                                </div>                                                        

                                                                <div class="input-field col m6 s12">
                                                                    <select class="reg_select">
                                                                        <option value="" disabled>College</option>
                                                                        <option value="0" selected><?php echo $college_name ?>
                                                                        <option value="1">GEC, Patan</option>
                                                                        <option value="2" >GEC, Palanpur</option>
                                                                        <option value="3">GEC, Ghandhinagar</option>
                                                                    </select>
                                                                </div>

                                                                <div class="input-field col m6 s12">
                                                                    <input value="<?php echo $mobile ?>" type="tel" class="validate">
                                                                    <label class="active" for="user_mobile">Monile No</label>
                                                                </div>

                                                                <div class="input-field col m6 s12">
                                                                    <select class="reg_select">
                                                                    <option value="" disabled>Department</option>
                                                                    <option value="0" selected><?php echo $dept_name ?></option>
                                                                    <option value="1" >Computer Department</option>
                                                                    <option value="2">Electrical Department</option>
                                                                    <option value="3">Civil Department</option>
                                                                    <option value="3">Mechenicle Department</option>
                                                                    <option value="3">EC Department</option>                      
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>                                                                                                                
                                                    </div>                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn amber">Close</a>
                                                    <input class="modal-action waves-effect waves-green btn amber" type="submit" value="Submit">
                                                </div>                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            
                            <?php
                            }
                            } else {
                                
                                echo "<script>console.log('invalid User')</script>";
                                $msg = "Please contact Admin as Your account is not approved !!!!";
                                header("location:index.php?Message=".$msg);
                            }
                            ?>
                </div>
         
              <!-- ADD_USER_BTN -->
              <div class="fixed-action-btn">
                            <a class="btn-floating btn-large red modal-trigger" href="#register_form">
                                <i class="large material-icons">add</i>
                            </a>                            
                        </div>
                    </div>
                    <div id="register_form" class="registration_modal modal">
                            <div class="modal-content">
                                <div class="row">
                                <form class="col s12" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <h3 class="col s12" >Add New User</h3>
                                    <div class="input-field col s12">
                                    <input id="user_name" type="text" name="user_name" class="validate">
                                    <label for="user_name">User Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                    <input id="email" type="email" name="user_email" class="validate">
                                    <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                    <input id="password" name="user_password" type="password" class="validate">
                                    <label for="password">Password</label>
                                    </div>
                                    <div class="input-field col s12">
                                    <select name="role_id" class="reg_select">
                                    <?php
                                    $sql = "SELECT * FROM role";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['role_id'] . "'>".$row['role_name']."</option>";
                                            }
                                        } else {
                                            echo "<script>console.log('Error while retriving Department data');</script>";
                                        }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="mobile_no" name="mobile" type="tel" class="validate">
                                        <label for="mobile_no">Mobile No</label>
                                    </div>
                                    <div class="input-field col s12">
                                    <input id="other_email" name="email" type="email" class="validate">
                                    <label for="other_email">Other Email</label>
                                    </div>                
                                    <div class="input-field col s12">
                                    <select name="college" class="reg_select">
                                    <option value="" disabled selected>College</option>
                                    <?php
                                            $sql = "SELECT * FROM college";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                                    echo "<option value='" . $row['id'] . "'>".$row['college_name']."</option>";
                                                }
                                            } else {
                                                // echo "0 results";
                                                echo "<script>console.log('Error while retriving college data');</script>";
                                            }    
                                    ?>
                                    </select>
                                    </div>
                                    <div class="input-field col s12">
                                    <select name="dept" class="reg_select">
                                    <?php
                                        $sql = "SELECT * FROM dept";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['id'] . "'>".$row['dept_name']."</option>";
                                            }
                                        } else {
                                            echo "<script>console.log('Error while retriving Department data');</script>";
                                        }
                                    ?>
                                    </select>
                                    </div>                
                                    <div class="modal-footer">
                                    <button id="submit" type="submit" class="btn waves-effect waves-light amber" name="Add_user">Submit</button>
                                    <button id="reg_close_btn" class="btn waves-effect waves-light amber">Close</button>
                                    </div>
                                    <!-- </div> -->
                                <!-- </div> -->
                                </form>
                                </div>                        
                            </div>         
                        </div>
                </section>

                <!-- PAGE_FOOTER -->
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