<?php
        $sql = "SELECT * from complain_log cl inner join complain c on cl.c_id = c.id inner join user u on u.uid=c.uid where cl.status='5' AND priority_principal='1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
                    <div class="card horizontal complain_detail">
                        <div class="card-image complain_img">
                            <img class="materialboxed" src="images/compain-1.jpg" height="260">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content complain_desc">
                                <h5 class="comp_title"><?php echo $row['title'] ?></h5>
                                <h6 class="complainer_name">
                                    <span>
                                        <b>From:</b>
                                    </span><?php echo $row['user_name'] ?></h6>
                                <p class="comp_desc">
                                    <span>
                                        <b>Description:</b>
                                    </span><?php echo $row['desc'] ?></p>
                            </div>
                            <div class="card-action">
                                <a class="waves-effect waves-light modal-trigger amber btn" href="#comp_detail_modal<?php echo $row['id'] ?>">More Details</a>
                                <div id="comp_detail_modal<?php echo $row['id'] ?>" class="modal">
                                    <div class="modal-content">
                                        <i class="material-icons right modal-close">close</i>
                                        <h5 class="comp_title"><?php echo $row['title'] ?></h5>
                                        <h6 class="complainer_name">
                                            <span>
                                                <b>From:</b>
                                            </span><?php echo $row['user_name'] ?></h6>
                                        <h6 class="complainer_name">
                                            <span>
                                                <b>Date:</b>
                                            </span><?php
                                            // echo $row['gen_date']."/".$row['gen_month']."/".$row['gen_year'];                            
                                                echo $date = date('d-m-Y',strtotime($row['time']));
                                             ?></h6>
                                        <h6 class="complainer_name">
                                            <span>
                                                <b>Time:</b>
                                            </span>
                                            <?php echo $time = date('h:i A',strtotime($row['time'])); ?>
                                            </h6>
                                        <p class="comp_desc">
                                            <span>
                                                <b>Description:</b>
                                            </span><?php echo $row['desc'] ?></p>
                                            

                                        <form action="" method="POST">
                                            <div class="input-field">
                                                <input type="hidden" name="uid" value="<?php echo $row['id'] ?>">
                                                <select name="forward_select">
                                                    <option value="" disabled selected>Forward To</option>
                                                    <?php
                                                        // if($row['level']==2){
                                                        //     // echo  "with principal priority".$row['c_id'];
                                                        //     echo "<option value=".$row['c_id'].">Principle</option>";
                                                        // }else{
                                                            // echo  "Normal".$row['c_id'];
                                                            // echo '<option value="3">complain comitee</option>';
                                                            $commitee = "SELECT DISTINCT  * FROM commitee_incharge ci ,complain_log col,commitee_list cl,complain c,user u
                                                            WHERE col.c_id=c.id AND c.complain_commitee=cl.c_id AND ci.c_id=c.complain_commitee AND ci.uid=u.uid AND c.complain_commitee=".$row['complain_commitee']." LIMIT 1";
                                                            $commitee_result = $conn->query($commitee);
                                                            if ($commitee_result->num_rows > 0) {
                                                                while($com = $commitee_result->fetch_assoc()) {
                                                                    echo "<option value=".$com['uid'].">".$com['user_name']."</option>";
                                                                }
                                                            }
                                                           
                                                        // }
                                                    ?>
                                                    <!-- <option value="1">HOD</option>
                                                    <option value="3">Other</option> -->
                                                </select>
                                            </div>
                                            <div class="input-field">
                                                <input id="input_text" name="comments" type="text" data-length="10">
                                                <label for="input_text">Comments</label>
                                            </div>

                                            <input class="btn waves-effect waves-light amber" type="submit" name="action">
                                            <input class="btn waves-effect waves-light amber" type="submit" value="Reject" name="reject">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
               
            }
        }