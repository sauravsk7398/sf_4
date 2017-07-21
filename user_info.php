

<style type="text/css">

.some {
	font-size:25px;
	background-color:pink;
	
}

.some .thing{
	visibility:hidden;
	width:400px;
	background-color:black;
	color:#fff;
	text-align:center;
	padding:5px 0;
	position:absolute;
	left:100px;
	top:100px;
	z-index:1;
	
	opacity:0;
	transition: opacity 1s;
	
	
	
}

.some:hover .thing {
	visibility:visible;
	opacity:1;
	
}



</style>
<br>
<br>
<div class="some">MyPersonal Details<br>
<span class="thing">
NAME : <?php echo $name;?><br>
USER_NAME : <?php echo $user_username;?><br>
GENDER : <?php echo $user_gender;?><br>
Contact Number : <?php echo $user_num;?><br>
</span>
</div>

