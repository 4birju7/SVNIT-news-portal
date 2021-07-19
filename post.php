<div class="post">
    <div class="up">
        <div class="dp">
            <img src="images/profilepic.png">
        </div>
        <div class="uname">
            <h4><?php 
            $tag = new Tags();
            $tag_name = $tag->get_name($row['TAG_ID']);
            if($tag_name){
                echo $tag_name['TAG_NAME'];
            }
            else{
                echo "error";
            }
            
            ?></h4>
            <p><?php echo $row['PUBLISH_DATE']  ?></p> 
        </div>
        <?php
         $news= new News();
        if($news->isTagFollowed($row['TAG_ID'],$_SESSION['USER_ID'])){
            include("unfollow_button.php");
        }
        else{
            include("follow_button.php");
        }
        

        ?>
    </div>
    <div class="down">
        <?php echo $row['CONTENT'] ?>
    </div> 
</div>