<?php

include('config.php');
$action = $_GET['action'];
switch ($action) {
    case 'updateprofiles':
        updateprofilesUpdate();
        break;
    case'changepassword':
        changePasswordUpdate();
        break;

    default:
        echo 'No action found';
        break;
}

function updateprofilesUpdate() {

    $path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/vizzdeo.com/vizzphpcore/uploads/profileimg/';

    $uniquesavename = time() . uniqid(rand());
    $destFile = $imagePath . $uniquesavename . '.' . $ext;
    $filename = $_FILES['file']['tmp_name'];
//list($width, $height) = getimagesize( $filename );       
    move_uploaded_file($filename, $destFile);

    //$fileToUpload = trim($_POST['fileToUpload']);
    /*

      $target_dir = "uploads/profileimg/";
      $target_file = $target_dir . basename($fileToUpload);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); */


   /* $imagePath = SITE_URL . "uploads/profileimg/";
    $imageFileType = pathinfo($fileToUpload, PATHINFO_EXTENSION);
    $uniquesavename = time() . uniqid(rand());
    $destFile = $imagePath . $uniquesavename . '.' . $imageFileType;
    $filename = $fileToUpload;
//list($width, $height) = getimagesize( $filename );       
    echo move_uploaded_file($filename, $destFile);*/

  $description = trim($_POST['description']);
   $user = trim($_POST['uName']);
    $fName = trim($_POST['fName']);
    $lName = trim($_POST['lName']);
    $email = trim($_POST['email']);
    $mobiles = trim($_POST['mobile']);
    $img_type = $ext;
    $img_name = $uniquesavename;
    $result = mysql_query("UPDATE users SET first_name='$fName',last_name='$lName',description='$description',mobile='$mobiles',img_name='$img_name',img_type='$img_type' WHERE email = '$email'");

    if ($result) {
        $status = 1;
    } else {
        $status = 0;
    }

    echo $status;
}

function changePasswordUpdate() {
    session_start();
    $user = $_SESSION['username'];
    $pass = trim($_POST['pass']);
    $cpass = trim($_POST['cPass']);

    $result = mysql_query("UPDATE users  SET password = MD5('$pass')WHERE email = '$user'");

    if ($result) {
        $status = 1;
    } else {
        $status = 0;
    }

    echo $status;
}

?>