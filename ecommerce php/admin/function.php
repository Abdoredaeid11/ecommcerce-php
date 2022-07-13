<?php
function back($bckmassg,$sec,$TrueFalse){
$url=isset($_SERVER['HTTP_REFERER'])&&$_SERVER['HTTP_REFERER']!==''?$_SERVER['HTTP_REFERER']:'index.php';
if($TrueFalse=='true'){

    echo"<div class='alert alert-success' role='alert'>
    <h4>$bckmassg</h4>
    </div>";
    header("refresh:$sec;url:$url");
}
elseif($TrueFalse=='false'){

    echo"<div class='alert alert-danger' role='alert'>
    <h4>$bckmassg</h4>
    </div>";
    header("refresh:$sec;url:$url");
}






}