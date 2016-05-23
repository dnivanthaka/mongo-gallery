<?php
require_once('DBHandling.php');

$message = '';

if(isset($_POST['isPosted'])){
    echo 'xxx';
    if($_FILES['image']['error'] !== 0){
        die('Error uploading file, Code = '.$_FILES['image']['error']);
        
    }
     echo 'xxx';
    $dbconn = DBHandling::getInstance();
    $gridFS = $dbconn->database->getGridFS();
    
    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['type'];
    $tempfile  = $_FILES['image']['tmp_name'];
    $caption  = $_POST['caption'];
     echo 'xxx';
    /*$id = $gridFS->storeFile($tempfile, array(
        'filename' => $filename,
        'filetype' => $filetype,
        'caption'  => $caption
    ));*/
    
    $message = 'Image file uploaded with ID = '.$id;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Upload images</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <!--<link rel="stylesheet" href="styles.css" media="screen" />-->
    <style></style>
  </head>
  
  <body>
  <div id="pageContainer">
    <div id="pageBody">
    <h1>Upload Images</h1>
    <?php echo $message;?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" class="dataform" method="post">
      <label for="content">Caption</label>
      <input type="text" name="caption" id="caption"/>
      <label for="image">Image</label>
      <input type="file" name="image"/>
      <input type="hidden" name="isPosted" value="true"/>
      <input type="submit" class="button_normal" name="submit" value="Save"/>
    </form>
    </div>
  </div>
  </body>
</html>