<?php
    session_start();
    include('includes/header.php');
    include('includes/sideNav.php');
    include('includes/dbConfig.php');

    if(isset($_POST['add_commitee'])){
        $add_com = $_POST['add_com'];
        $type_id = $_POST['type_id'];
        $add_com_Desc = $_POST['add_com_Desc'];
        
        $Add_Complain = "INSERT INTO commitee_list VALUES (NULL,'$add_com','$add_com_Desc','$type_id')";
        if ($conn->query($Add_Complain) === TRUE) { 
            echo "complain commitee added succesfully";
        }else{
            echo "<script>console.log('".$conn->error."')</script>";
        }
    }

    if(isset($_POST['Assign_commitee'])){
        $user_name = $_POST['user_name'];
        $commitee_name = $_POST['commitee_name'];
        $Add_Complain = "INSERT INTO commitee_incharge VALUES (NULL,'$user_name','$commitee_name')";
        if ($conn->query($Add_Complain) === TRUE) { 
            echo "Commitee Incharge assigned successfully!";
        }else{
            echo "<script>console.log('".$conn->error."')</script>";
        }
    }

?>              


      
    <section class="add_commitee_page">
        <div class="commitee_name">
        <div class="row">
                <form action="complain commitee.php" method="POST">
            <h5 style="margin-left:10px;">Add Commitee</h5>
            <div class="input-field col m6 s12">
            <input id="add_com" name="add_com" type="text" class="validate">
                    <label for="add_com" data-error="wrong" data-success="">Add Commitee</label>
            </div>
            <div class="input-field col m6 s12">
                <select name="type_id">
                    <option value="2" >Internal</option>                
                    <option value="3" >External</option>                
                </select>
            </div>
            <div class="input-field col m12 s12">
            <input id="add_com_Desc" name="add_com_Desc" type="text" class="validate">
                    <label for="add_com_Desc" data-error="wrong" data-success="">Commitee Description</label>
            </div>    
                
                <!--                 
                <input id="add_com" name="" type="text" class="validate">
                    <label for="add_com" data-error="wrong" data-success="">Type</label>-->
                <input name="add_commitee" style="margin-right:20px;"  class="btn amber right" type="submit" value="ADD"> 
                
                </form>
              </div>              
            </div>
        <div class="assign_commitee row">
            <h5 style="margin-left:10px;">Assign Commitee</h5>
            <form action="complain commitee.php" method="POST">
                <div class="input-field col m6 s12">
                <select name="user_name">
                                            <option value="0">Select User</option>
                                            <?php
                                            $sql = "SELECT uid,user_name FROM user";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['uid'] . "'>".$row['user_name']."</option>";
                                                }
                                            } else {
                                                echo "<script>console.log('Error while retriving commitee data');</script>";
                                            }
                                         
                                             ?>
                </select>
                
                </div>
                <div class="input-field col m6 s12">
                    <select name="commitee_name">
                                            <option value="0">Select commitee</option>
                                            <?php
                                            $sql = "SELECT * FROM commitee_list";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['c_id'] . "'>".$row['c_name']."</option>";
                                                }
                                            } else {
                                                echo "<script>console.log('Error while retriving commitee data');</script>";
                                            }
                                           
                                             ?>              
                    </select>
                </div>
                <input name="Assign_commitee"  style="margin-right:20px;" class=" btn amber right" type="submit" value="ASSIGN">
            </form>
        </div>
    </section>
    <section>

            
            <?php
                                            $sql = "SELECT cl.c_name,u.user_name FROM commitee_incharge as ci Inner join commitee_list as cl on ci.c_id=cl.c_id Inner join user as u on ci.uid=u.uid";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                ?><table class="responsive-table striped bordered highlight centered">
                                                <thead>
                                                <th>User Name</th>
                                                <th>Commitee Name</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = $result->fetch_assoc()) {
                                                    
                                                    echo "<tr><td>" . $row['user_name'] . "</td><td>".$row['c_name']."</td></tr>";
                                                }
                                                ?></tbody></table><?php
                                                
                                            } else {
                                                echo "<script>console.log('Error while retriving commitee data');</script>";
                                            }
                                            $conn->close();
                                            ?>        


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