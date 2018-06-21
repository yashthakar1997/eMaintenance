<?php
session_start();
include("includes/header.php");
include('includes/dbConfig.php');
include('includes/sidenav.php');

if(isset($_POST['action'])){

    $uid = $_SESSION['USER'];
    $title = $_POST['title'];
    $gen_time = date("H:i:s");
    $gen_date = date("d");
    $gen_year = date("Y");
    $gen_month = date("m");
    $desc = $_POST['desc'];
    $complain_commitee = $_POST['complain_commitee'];
    $priority_hod = "0";
    $priority_principal = "0";
    
    if($_POST['priority']=="1"){
        $priority_principal = "1";
    }else{
        $priority_principal = "0";
    }

    if($_POST['priority']=="2"){
        $priority_hod = "1";
    }else{
        $priority_hod = "0";
    }

    
    $file = $_FILES['file'];
    // print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg' ,'png' ,'pdf');
    
    $fileNameNew = uniqid('',true).".".$fileActualExt;

    if(in_array($fileActualExt,$allowed)) {
        if($fileError === 0){
            if($fileSize < 5000000) {
                $fileNameNew = uniqid('',true).".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                // echo "uploads success";

            }else{
                echo "File Too Big!!";
            }
        }else{
            echo "There was an error uploading the file";    
        }

    } else {
        echo "cant upload this type of file";
    }

    $complain = "INSERT INTO complain (`uid`, title, gen_time, gen_date, gen_month, gen_year, `desc`, priority_hod, priority_principal, complain_commitee ,img_url) 
                  VALUES ('".$uid."', '".$title."', '".date("Y-m-d H:i:s")."', '".$gen_date."' , '".$gen_month."', '".$gen_year."', '".$desc."', '".$priority_hod."', '".$priority_principal."', '".$complain_commitee."' , '".$fileNameNew."')";
    
    //  $complain = "INSERT INTO complain VALUES (NULL,'1','yash','','','','','sa',2,0,1)";
    
    if ($conn->query($complain) === TRUE) {                 
        // echo "complain Regestered successfully!!!";
        echo "<script>alert('Complain Added successfully')</script>";
        echo "<script>console.log('complain Regestered successfully!!!')</script>";

        require_once "nexmo/vendor/autoload.php";

        $text = $user_name." Added New Complain ".$title;        

        $basic  = new \Nexmo\Client\Credentials\Basic('dad3af06', '8b76743e8cc63599');
        $client = new \Nexmo\Client($basic);
        // $test = "New Complain regestered";

        $message = $client->message()->send([
            'to' => 919099163316,
            'from' => 'Yash Thakar',
            'text' => $text
        ]);
    }else{
        // echo "Error: " . $complain . "<br>" . $conn->error;
        echo "<script>console.log('".$conn->error."')</script>";
    }

}


?>
                <!-- USER_PROFILE_SECTION -->
                <section class="add_complain_section">
                    <div class="container">
                        <div class="add_complain_area">
                            <h4>Add New Complain</h4>
                            <form class="col s12" action="add_complain.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="comp_title" name="title" type="text" required>
                                        <label for="comp_title">Complain Title</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <textarea name="desc" id="comp_desc" class="materialize-textarea"></textarea>
                                        <label for="comp_desc">Complain Description</label>
                                    </div>


                                    <div class="input-field col s12">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>Upload Image</span>
                                                <input type="file" name="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="input-field col s12">
                                        <select name="priority">
                                            <option value="0">Select Priority</option>
                                            <option value="1">Principle</option>
                                            <option value="2">HOD</option>
                                        </select>
                                        <label>Priority</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <select name="complain_commitee">
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
                                            $conn->close();
                                             ?>
                                        </select>
                                        <label>Complin commitee</label>
                                    </div>
                                </div>

                                <div class="add_complain_btn">
                                    <button class="btn waves-effect waves-light amber" type="submit" name="action">Submit
                                        <i class="material-icons right">send</i>
                                    </button>

                                    <button class="btn waves-effect waves-light red" type="submit" name="cancel">Cancel
                                        <i class="material-icons right">close</i>
                                    </button>
                                </div>
                            </form>
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