<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/news.php");
    if(isset($_SESSION['USER_NAME'])){
        $uname = $_SESSION['USER_NAME'];
        $login = new Login($uname);
        $result = $login->check_login($uname);
        if($result){
            $user = new User();
            $user_data = $user->get_data($uname);
            if(!$user_data){
                header("Location: login.php");
                die;
            }
        }
        else{
            header("Location: login.php");
            die;
        }
    }
    else{
        header("Location: login.php");
            die;
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
       $news = new News();
       $id = $_SESSION['USER_ID'];
       $result = $news->create_post($id,$_POST);
       if($result==""){
           header("Location: publish.php");
           die;
       }
       else{
        echo '<script type="text/javascript">',
        'alert("news cant be empty")',
        '</script>';
       }
    }


    $news = new News();
    $id = $_SESSION['USER_ID'];
    $posts = $news->get_posts($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    
    
    <title>Publish</title>
</head>
<body>
    <nav class="navbar">
        <div class="leftnav">
            <div class="logo">
                <img src="images/1200px-NIT_Surat_Logo.svg.png" alt="logo">
            </div>
            <div></div>
            <div class="name">
                <a href="#">SVNIT NEWS PORTAL</a>
            </div>
        </div>
        <div class="searchbar">
            <input type="text" name="Search" class="search" placeholder="Search">
        </div>
        <div class="rightnav">
        <div class="name">
                <a href="#"><?php echo $user_data['USER_NAME']?> </a>
            </div>
        <div class="logo">
                <img src="images/profilepic.png" alt="logo">
            </div>
            <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="name">
                <a href="logout.php">Log out </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="sidebar HideOnMobile">
            <div class="choice">
                <div class="navi">
                    <ul class="navilist">
                        <li class="navilistitem"><a href="homepage.php">Latest</a></li>
                        <li class="navilistitem"><a href="following.php">Following</a></li>
                        <li class="navilistitem" style="background-color: #faeafa"><a href="">Publish</a></li>
                    </ul>
                </div>
                <div style="margin-left: 10px; margin-right:10px"><hr></div>
            </div>
            <div class="category">
                <div class="navi">
                    <ul class="navilist">
                        <li class="navilistitem">Department</li>
                        <li class="navilistitem">Hostel</li>
                        <li class="navilistitem">Year</li>
                        <li class="navilistitem">Clubs</li>
                        <li class="navilistitem">Events</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="postsection">
            <div class="sidenav HideOnPC">
                <ul class="navlist">
                    <li class="listitem">Latest</li>
                    <li class="listitem">Following</li>
                    <li class="listitem" style="background-color: #faeafa">Publish</li>
                    <li class="listitem">Explore</li>
                </ul>
            </div>
            <?php

                $user = new User();     
                $result=$user->isPublisher($_SESSION['USER_NAME']);
                if($result){
                    echo '<div>
                <form method="POST">
                    <div class="post">
                        <textarea name="news" placeholder="Post news" rows="10" class="textarea"></textarea>
                    </div>
                    <div class="pubarea">
                    <input type="submit" name="" class="publishbtn"   value="Publish">
                    </div>
                </form>
                <div>';
                    
                    if($posts){
                        foreach ($posts as  $row) {
    
                            $user = new User();
                            $user_info = $user->get_user($row['USER_ID']);
                            
                            include("post.php");
                        }
                    }
    
                echo '</div>
                </div>';
                }
                else{
                    echo '<div class="container">
                    <div class="login-content">
                        <form method="POST" action="#">
                            <h2 class="title">Welcome</h2>
                               <div class="input-div one">
                                      <div class="i">
                                          <i class="fas fa-user"></i>
                                      </div>
                                      <div class="div">
                                          <input type="text" name="username" class="input" placeholder="Enter Category" required>
                                      </div>
                               </div>
                               <div class="input-div pass">
                                      <div class="i"> 
                                       <i class="fas fa-lock"></i>
                                      </div>
                                      <div class="div">
                                <input type="password" name="password" class="input" placeholder="Enter Phone Number" required>
                                   </div>
                            </div>
                            <input type="submit" type="submit" class="btn" value="REQUEST">
                        </form>
                    </div>
                </div>';
                }
                
            ?>
            
        </div>
        <div class="corona HideOnMobile">
                
            </div>
    </div>
</body>
</html>