<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP Contact Form Style Demo</title>

<style type="text/css">
body{
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
	margin:0 auto;
	width:600px;
	padding:14px;
}
	/* ----------- basic ----------- */
	#basic{
		border:solid 2px #DEDEDE;
	}








	/* ----------- stylized ----------- */
	#stylized{
		border:solid 4px #b7ddf2;
		background:#ebf4fb;

	}


	#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:160px;
		float:left;
	}
	#stylized .small{
		color:#666666;
		display:block;
		font-size:20px;
		font-weight:normal;
		text-align:right;
		width:160px;
	}
	#stylized input{
		float:center;
		font-size:12px;
		padding:14px 12px;
		border:solid 11px #aacfe4;
		width:220px;
		margin:15px 0 15px 15px;
	}
	#stylized button{
		clear:both;
		margin-left:180px;
		width:125px;
		height:51px;
		background:#444;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:21px;
		font-weight:bold;
	}

</style>
</head>

<body>

<div id="stylized" class="myform">

<form id="form1" id="form1" action="php/mail.php" method="POST">

    <label>Name
        <span class="small">Add your name</span>
    </label>
<input type="text" name="name">
    <label>Email
        <span class="small">Enter a Valid Email</span>
    </label>
<input type="text" name="email">


<br />

    <label>Message
        <span class="small">Type Your Message</span>
    </label>
<textarea name="message" rows="6" cols="25"></textarea><br />

    <button type="submit" value="Send" style="margin-top:15px;">Submit</button>
<div class="spacer"></div>

</form>

</div> <!-- end of form class -->

</body>
</html>
