<?php
require_once('DBHandling.php');

$message = '';

 
$dbconn = DBHandling::getInstance();
$gridFS = $dbconn->database->getGridFS();
    
$list = $gridFS->find();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Upload Images</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <!--<link rel="stylesheet" href="styles.css" media="screen" />-->
    <style>
     input{
        display: block;
        margin-top: 5px;
     }
    </style>
  </head>
  
  <body>
  <div id="pageContainer">
    <div id="pageBody">
    <h1>Upload Images</h1>
    <?php
    while($item = $list->getNext()){
    ?>
    <div>
    <p><?php echo $item->file['caption']; ?></p>
    <img src=""/><?php echo $item->file['filename']; ?>
    <p><?php echo ceil($item->file['length'] / 2014).' KB'; ?></p>
    </div>
    <?php
    }
    ?>
    </div>
  </div>
  </body>
</html>
