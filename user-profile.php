


<?php
session_start();

include 'includes/dbConfig.php';
include 'includes/header.php'; 

if(empty($_SESSION['USER'])){
    echo "<script>console.log('invalid User')</script>";
    header('location:index.php');
} else {
    // echo $_SESSION['USER'];
    echo "<script>console.log('user id = ".$_SESSION['USER']."')</script>";
}



include 'includes/sidenav.php';

  //admin profile
  if($_SESSION['ROLE']=='admin'){
    include("includes/admin_profile.php");
  }else{
    include("includes/General_profile.php");
    ?>
                <section class="compain_list">
                    <div class="container">
                        <div class="col s12 m7">    
    <?php

    $sql = "SELECT * From complain where uid = '$user' ORDER BY id DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
             $Complain_title = $row['title'];    
             $Complain_desc = $row['desc'];      
             $img_url = $row['img_url'];
    ?>
                            <div class="card horizontal complain_detail">
                                <div class="card-image complain_img">
                                    <img class="materialboxed" src="uploads/<?php echo $img_url; ?>">
                                </div>
                                <div class="card-stacked">
                                <div class="card-content complain_desc">
                                    <h5 class="comp_title"><?php echo $Complain_title; ?></h5>
                                    <p class="comp_desc"><?php echo $Complain_desc;?></p>
                                </div>
                                <div class="card-action">
                                    <a class="waves-effect waves-light modal-trigger" href="#comp_detail_modal">Details</a>                                    
                                    <div id="comp_detail_modal" class="modal">
                                        <div class="modal-content">
                                        <h4>Complain Title</h4>
                                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur minus vero libero mollitia distinctio sapiente corporis nihil numquam odio consequuntur? Deleniti illum dolorem quidem nemo, rem cupiditate voluptate eum placeat?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                                            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Disagree</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                <?php         
                    }
                } 
                ?>

                        </div>
                    </div>                    
                </section>

                <?php } ?>
            </div>
        </section>

      <!--Import jQuery before materialize.js-->          
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>      
    </body>
  </html>