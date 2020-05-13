<?php
  $a = $_POST['input1'];
  $my_var = $a;
 ?>
 <html>
   <head>
     <title>page1</title>
     <link rel ="stylesheet" type = "text/css" href = "css/Project2_1_css.css">
 		<script type="text/javascript" src="script/Project2_1_script.js"> </script>
   </head>
   <body>
       <form>
         <span> <?php echo $a; ?>  </span>
         <br/>
         <a href="page2.php?id=<?php echo $my_var ?>">page2</a>
       </form>
   </bode>
 </html>
