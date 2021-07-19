<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.php");
    include("classes/user.php");
    include("classes/news.php");
    include("classes/tags.php");
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <title>Latest News</title>
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
                        <li class="navilistitem" style="background-color: #faeafa"><a href="homepage.php">Latest</a></li>
                        <li class="navilistitem"><a href="following.php">Following</a></li>
                        <li class="navilistitem"><a href="publish.php">Publish</a></li>
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
                    <li class="listitem" style="background-color: #faeafa">Latest</li>
                    <li class="listitem">Following</li>
                    <li class="listitem">Publish</li>
                    <li class="listitem">Explore</li>
                </ul>
            </div>
            <div>
            <?php
                $query = "SELECT * FROM news ORDER BY PUBLISH_DATE DESC";
                $DB = new DataBase();
                $result=$DB->read($query);
                if($result){
                    foreach ($result as  $row) {

                        $user = new User();
                        $user_info = $user->get_user($row['USER_ID']);
                        
                        include("post.php");
                    }
                }

                ?>
            </div>
        </div>
        <div class="corona HideOnMobile"></div>
    </div>
</body>
</html>