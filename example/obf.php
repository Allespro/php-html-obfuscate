<?php
include __DIR__."/../HtmlObf.php";
$obf = new HidedHtml\Obfuscator();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
  <div style="text-align: center; margin-top: 100px;">
    <p><?=$obf->obf('I\'m hidden 🥳.')?></p>
    <p>And I'm not</p>
  </div>
  
</body>
</html>