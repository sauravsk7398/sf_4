<?php 

$name = grab_data('name');
$user_id = grab_data('id');	
$user_username = grab_data('username');
$user_gender = grab_data('gender');
$user_num = grab_data('number');


if(isset($_POST['home'])) {
	
	$_SESSION['acc']=0;
	header('Location: index.php');
	
}

	if(isset($_POST['notebook'])) {
		
		$_SESSION['acc']=0;
		$_SESSION['nb']=permit();
		
		header('Location: index.php');
		
	}

?>

<style type="text/css">

body {
	background-color:#fcfc87;
}

.mnheader {
	 background: #b92323;
    text-align: center;
    border-bottom-right-radius: 30px;
    border-bottom-left-radius: 30px;
    width: 20%;
    padding-top: 30px;
    height: 90px;
    color: #fff;
    font-size: 56px;
    font-weight: bolder;
    font-family: Monotype Corsiva;
    text-shadow: 4px 1px 10px #000;
    position: fixed;
    top: 0px;
    left: 8px;

}

.mnheader1 {
	 background: #b92323;
    text-align: center;
    width: 12%;
    padding-top: 12px;
    height: 50px;
    color: #fff;
    font-size: 28px;
    font-weight: bold;
    font-family: Century;
    text-shadow: 4px 1px 10px #000;
    position: fixed;
    top: 0px;
    left: 87%;

}

ul {
	list-style-type:none;
	margin:0px;
	padding:0px;
	overflow:hidden;
	background-color:#333;
	    position: fixed;
    left: 33%;
    top: 0px;
	font-size: 24px;
	border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;

}

li > a {
	display:inline-block;
	padding:21px 16px;
	text-align:center;
	text-decoration:none;
	color:white;
}
li {
	    float: left;
       border-right: 1px #bbb solid;
    
}

li:last-child {
	border-right:none;
}

li > a:hover {
	background-color:gray;
}


	   
input[type=submit] {
	
	         background-color: #333333;
    border: none;
    font-size: 22px;
    padding-top: 22px;
    padding-bottom: 22px;
    font-family: Century;
    font-weight: normal;
    color: white;
    padding-left: 16px;
    padding-right: 16px;
}

input[type=submit]:hover {
	background-color:gray;
}

div > a {
	text-decoration:none;
	color:white;
}

#data {
	
      width: 100%;
    font-size: 28px;
    padding-bottom: 22px;
    padding: 5px;
    padding-bottom: 29px;
			
			}
	  
	  
	  .some {
       width: 80%;
    margin-left: 11%;
    font-weight: bold;
    font-size: 28px;
    background-color: #fff;
    box-shadow: 0px 0px 20px 19px #7b0d0d;
    margin-top: 180px;
	}
	
.thing {
	 text-align: center;
    padding-top: 34px;
    text-shadow: 0px 3px 5px #1f0505;
    letter-spacing: 1px;
    word-spacing: 3px;
    background-color: rgb(255, 91, 91);
}

.profile, .profile1 {
	width:50%;
	height:80px;
	    border: 1px rgba(179, 32, 32, 0.89) solid;
	border-radius: 3px;
	    padding-left: 16px;
    color: #776464;
		}
		
	.profile1 {
		    color: #7a75ca;
			font-weight:bold;
		padding-left: 12px;
		
	}

	
#deleteme {
	           margin-top: 13px;
    color: white;
    background-color: #ff3d12;
    padding-top: 17px;
    padding-bottom: 22px;
    width: 409px;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 1px;
    word-spacing: 4px;
    border: none;
    border-radius: 3px;
    box-shadow: 2px 2px 4px 3px black;
}


#deleteme:hover {
	background: linear-gradient(180deg,#aa2727,#4a0f0f 50%);
	
}

</style>


<body>

<div class="mnheader">
Note-Book
</div>
<ul>
<li>
<form style="margin-bottom:0" action="<?php $this_page ?>" method="POST">
<input type="submit" name="home" value="Home">
</form>
</li>
<li>
<form style="margin-bottom:0" action="<?php $this_page ?>" method="POST">
<input type="submit" name="notebook" value="My Notes">
</form>
</li>
<li>
<a href="">Chat Room</a>
</li>
<li>
<form style="margin-bottom:0" action="<?php $this_page ?>" method="POST">
<input type="submit" name="account" value="Account Settings">
</form>
</li>
</ul>
<div class="mnheader1">
<a href="logout.php" > Log Out  </a>
</div>

<div class="some">
<div class="thing">
MY PROFILE<br><br>
</div>
<table id="data">
<tr><td class="profile">Name <td class="profile1"><?php echo $name;?></td></tr>
<tr><td class="profile">User Name<td class="profile1"><?php echo $user_username;?></td></tr>
<tr><td class="profile">Gender</td><td class="profile1"><?php echo $user_gender;?></td></tr>
<tr><td class="profile">Contact Number</td>  <td class="profile1"><?php echo $user_num;?></td></tr>
<tr><td colspan="2" style="text-align:center;"><form style="margin-bottom:0" action="<?php $this_page ?>" method="POST"><input type="submit" name="delete" id="deleteme" value="DELETE THIS ACCOUNT"></form></td></tr>
</table>
</div>



</body>