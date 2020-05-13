<?php
  session_start();
  $u11 = $_SESSION['regO'] ;
?>
<html>
  <head>
    <title>CONTACT</title>
    <link
      rel ="stylesheet"
      type = "text/css"
      href = "../css/css.css"
    >
    <link rel="shortcut icon" href="../img/code.ico" />
    <script src="script/javascript.js"></script>
  </head>
  <body>
      <form action="home.php" method="get">
        <center>
            <div id="div1">
              <input type="hidden" name="nom3" value= <?php echo $u11; ?>>
               Welcome <span id="span1"><?php echo $u11; ?></span>
          </div>
        </center>
    </form>
  </body>
</html>
