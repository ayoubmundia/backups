<?php
  $a =  $_POST['nom'];
  session_start();
  $_SESSION['regO'] = $a;
?>
<html>
  <head>
    <title>HOME</title>
    <link
      rel ="stylesheet"
      type = "text/css"
      href = "../css/css.css"
    >
    <link rel="shortcut icon" href="../img/code.ico" />
    <script src="script/javascript.js"></script>
  </head>
  <body>
    <center>
      <form action="contact.php" method="get" id="form_id">
        <div id="div1">
          <input type="hidden" name="name1" value=<?php echo $a; ?>>
          Welcome <span nom="nom2"> <?php echo $a; ?> </span>
          <br/><br/>
          <a onclick="form.submit()" href="contact.php">Contact</a>
      </div>
      </form>
    </center>
  </body>
</html>
