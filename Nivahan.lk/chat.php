<?php
    require('chatFunction.php');

    session_start();
    if (isset($_SESSION['log_count'])){
        $log_count = $_SESSION['log_count'];
    }

    $senderName = $_SESSION['uname'];



    if(isset($_POST['getAllMsg'])) {
        $_COOKIE['msgReciever'] = $_POST['getAllMsg'];
        setcookie('msgReciever',$_POST['getAllMsg']);
        $reciever = $_COOKIE['msgReciever'];
    }elseif(isset($_COOKIE['msgReciever'])){
        $reciever = $_COOKIE['msgReciever'];
    }


    if(isset($_POST['send'])) {
        $reciever = $_COOKIE['msgReciever'];
        if (send_msg($_SESSION['uname'], $reciever, $_POST['message'])) {
            echo "message sent";
        } else {
            echo "message faild to sent";
        }
    }

//    This is for suggestFriend
    if(isset($_COOKIE["UserNameOfFriend"])){
        echo $sender = $_SESSION['uname'];
        echo $reciever = $_COOKIE["UserNameOfFriend"];
        echo $message = "I recomend ".$_COOKIE["suggestArchitect"]."";

        if(send_msg($sender,$reciever,$message)){
            echo "message sent";
        }else{
            echo "message faild to sent";
        }
        //this to unset cookies
        setcookie ("UserNameOfFriend", "", time() - 3600);
        setcookie ("suggestArchitect", "", time() - 3600);
    }



//    }else{
//        if(isset($_POST['getAllMsg'])){
//            $reciever = $_POST['getAllMsg'];
//        }elseif(isset($_COOKIE['msgReciever'])){
//            $reciever = $_COOKIE['msgReciever'];
//        }else{
//            $reciever = "assa";
//        }
//
//    }



?>
<!DOCTYPE html>
<html>

<head>
    <!--//this is for link icons for site-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!--//this is for link bootstrap to site-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/chat.css">
</head>

<?php require('header.php');?>

    <div class="row">
        <div class="col-md-4">
            <div class="chatList">
                <form action="chat.php" method="post">
                <?php
                    $recievers = get_chat_list($_SESSION['uname']);
                    foreach($recievers as $recieve){
                ?>
                    <input class=" button" type="submit" name="getAllMsg" value="<?php echo $recieve['reciever']?>"><br/>
                <?php
                    }
                ?>
                </form>
            </div>
        </div>


        <div class="col-md-8 rightSide">
            <div class="row msgBox">

                <form action="chat.php" method="post">
<!--                    <input type="text" class="form-control" placeholder="--><?php //echo $_SESSION['uname'];?><!--"><br/>-->
<!--                    <input type="text" class="form-control" placeholder="--><?php //echo $_COOKIE['msgReciever'];?><!--"><br/>-->
                    <textarea class="form-control" rows="3" type="text" name = "message" ></textarea><br/>
                    <button  class="form-control button" type="submit" name="send" value="<?php ?>">send</button><br/>
                </form>
            </div>

            <div class="row">
                <div id="messages">
                <?php
                    if(isset($_POST['getAllMsg'])){
                        $messages = getAllMsgByUser($_SESSION['uname'],$_POST['getAllMsg']);

                        foreach($messages as $message){
                            if($message['sender'] == $_SESSION['uname']) {
                                ?>
                                <div class="container dark">
                                    <?php echo $message['message']; ?>
                                </div>
                            <?php }else{?>
                                <div class="container light">
                                    <?php echo $message['sender'] . " sent " . $message['message']; ?>
                                </div>
                             <?php
                            }}}
                ?>
                </div>
            </div>


        </div>

        
    </div>

<?php require('footer.php')?>