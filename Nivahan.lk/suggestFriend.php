<?php
require('dbcon.php');

session_start();
if (isset($_SESSION['log_count'])){
    $log_count = $_SESSION['log_count'];
}


//this is for suggest friend
if(isset($_POST['detail_id'])){
    $recomendArchitect = $_POST['detail_id'];
    //set cookie by using architect name
    setcookie("suggestArchitect",$recomendArchitect);
    //echo $_COOKIE["suggestArchitect"];
}



?>
<div class="row">
<form action="chat.php" method="post" >
    <br/>
    <input type="text" name="country" id="country" class="form-control" placeholder="Enter friend name" style="width:500px; margin:auto">
    <center><button type="submit" name="search" class="btn btn-default" id="SearchBarButton" >SEARCH</button></center>
    <br/><br/>
</form>
</div>


    <div id="countryList"></div>


<!--get details about normal users-->
<script>
    $(document).ready(function(){
        $('#country').keyup(function(){
            var query = $(this).val();
            if(query!='')
            {
                $.ajax({
                    url:"suggestFriendSearch.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });

        $(function(){
            $('#countryList').on('click','li',function(){
                $('#country').val($(this).text());
                $('#countryList').fadeOut();
            });
        });
    });
</script>
