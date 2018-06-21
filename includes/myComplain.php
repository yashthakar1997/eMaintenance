<?php
        $uid = $_SESSION['USER'];
        // echo $uid;
        $sql = "SELECT * from complain_log cl inner join complain c on cl.c_id = c.id inner join user u on u.uid=c.uid where cl.status='5' AND resolver_id='".$uid."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
                    <div class="card horizontal complain_detail">
                        <div class="card-image complain_img">
                            <img class="materialboxed" src="uploads/<?php echo $row['img_url'];?>" height="260">
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
                                        <br/>
                                            <input type="hidden" name="uid" value="<?php echo $row['id'] ?>">
                                            <div class="input-field">
                                                <input id="input_text" name="comments" type="text" data-length="50">
                                                <label for="input_text">Comments</label>
                                            </div>

                                            <input class="btn waves-effect waves-light amber" type="submit" name="Finished" value="SOLVED">
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