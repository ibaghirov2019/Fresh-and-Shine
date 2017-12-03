<!DOCTYPE HTML>
<html>
<style>
/*Задний фон*/
body {
  background-image: url(/images/); /* Путь к фоновому изображению */
  
}
</style>
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
  <!-- линк на файлы -->
  <link href="css/reset.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <title>Cleaning Services</title>
</head>

<body>

  <!-- main block body -->
  <div id="block-body">
    <?php
    include("include/block-header.php");
    ?>
          
    <!-- блок что в центре -->
    <?php
    include("include/block-content.php");
    ?>


    <!-- блок футер -->
    <?php
    include("include/block-footer.php");
    ?>
  </div>

</body>
</html>