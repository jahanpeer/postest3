

<?php

if(isset($_POST['name'])){
    
    if(empty(($_POST['name'])) || empty(($_POST['email'])) || empty(($_POST['msg']))|| empty(($_POST['captcha']))){
        echo "All the fields is required";
    }
    
}
?>

