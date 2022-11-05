<?php
session_start();
include("chatdb.php");
include("links.php");
if(isset($_GET["userId"]))
{
    $_SESSION["userId"] = $_GET["userId"];
    header("location: chatbox.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sociogram-chat</title>
        <link rel="icon" href="img/sicon.png">
    </head>
    <body style="background-image:url(img/Sociogram_bg-blur.jpg)">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="text-center">
                    <h2 style="font-family:Lobster; color:purple">Sociogram</h2>
                </div>
                <div class="modal-header">
                    <h4>Select account</h4>
                </div>
                <div class="modal-body">
                    <ol>
                    <?php 
                        $users = mysqli_query($conn,"SELECT * FROM user")
                        or die("failed to execute".mysqli_error($conn));
                        while($user=mysqli_fetch_assoc($users))
                        {
                            echo '<li>
                                <a href="chatapp.php?userId='.$user["id"].'">'.$user["user"].'</a>
                                </li>
                            ';

                                
                        }
                    ?>
                    </ol>
                    <a href="profilepage.php"><i class="bi bi-arrow-left" style="font-size:28px;float:left"></i></a>
                    <a href="registerUser.php" style="float:right;">Register Here</a>
                </div>
            </div>
        </div>
    </body>
</html>