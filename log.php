<?php
    session_start();
    include('includes/header.php');
    include('includes/sideNav.php');
?>              
                <!-- COMPLAIN_LOG_SECTION -->
                <section class="complain_log_section">
                    <div class="container">
                     <div class="complain_log_table">
                        <table class="responsive-table bordered highlight centered">
                            <thead>
                                <tr>
                                    <th>Complain Id</th>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>Complain title</th>
                                    <th>Comments</th>
                                    <th>Level</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $uid = $_SESSION['USER'] ?>
                    <?php
                            $sql = "SELECT cl.c_id,c.uid,u.user_name,c.title,cl.comments,tw.tow_type_name,cl.time,s.status_name
                            from complain_log cl inner join complain c ON cl.c_id=c.id inner join user u on c.uid=u.uid inner join type_of_work tw on cl.level=tw.tow_id inner join status s on cl.status=s.ud  where resolver_id=".$uid." OR u.uid=".$uid;
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                               ?>
                                <tr>
                                    <td><?php echo $row['c_id'] ;?></td>
                                    <td><?php echo $row['uid'] ;?></td>
                                    <td><?php echo $row['user_name'] ;?></td>
                                    <td><?php echo $row['title'] ;?></td>
                                    <td><?php echo $row['comments'] ;?></td>
                                    <td><?php echo $row['tow_type_name'] ;?></td>
                                    <td><?php echo $row['time'] ;?></td>
                                    <td><?php echo $row['status_name'] ;?></td>
                                </tr> 
                    <?php
                            }
                            }
                    ?>                       
                            </tbody>
                        </table>
                     </div>
                    </div>
                </section>

                <br>

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