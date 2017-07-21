<?php

require 'database.php';

$error_username = '';
$error_password = '';
$invalid= "";

    function final_touch($field) {
		$field = trim($field);
		$field = stripslashes($field);
		$field = htmlspecialchars($field);
		
		return $field ;
	}
	


if(isset($_POST['username']) && isset($_POST['password'])) {

	$username= $_POST['username'];
	$password= $_POST['password'];
	$encrypted_password= md5($password);
	
	if(empty($username)) {
		$error_username ='*Username is Required!';
		$invalid ='*Invalid Username or Password!!<br><hr>';
	}else {
		$username = final_touch($username);
		
	}
	
	if(empty($password)) {
		$error_password ='*Password is Required!';
	}else {
		
	}
	
	if(!empty($username) && !empty($password)) {
		 
		 $query= "SELECT `id` FROM `myuser` WHERE `username`='$username' AND `password`='$encrypted_password'";
         
		 if($query_run= mysql_query($query)) {
			 
			 $query_rows=mysql_num_rows($query_run);
			    
				if($query_rows==0) {
					
					//echo 'The username and Password did not Match';
					$invalid ='*Invalid Username or Password!!<br><hr>';

                }else if($query_rows==1){
					$user_id = mysql_result($query_run,0,'id');
					$_SESSION['USER_ID']=$user_id;
					$_SESSION['nb']=0;
					$_SESSION['acc']=0;
					header('Location: index.php');
					

                }		 
		 
		 }else {
	        
	     }
		 
	}else {
		
	}
	
}
?>  


<style type="text/css">

body {
	background-color:rgba(255, 235, 0, 0.32); margin:0px;
}





table {   
    padding: 10px;
    border-radius: 30px;
    font-weight: bold;
}


td {           text-align: center;
    
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 10px;
	font-size:25px;
	font-family:Arial;
	}
	
input[type=number],input[type=text],input[type=password]
                       {    padding: 10px;
					   padding-bottom:4px;
          width: 380px;
         margin: 10px;
        border: none;
		border-bottom:2px solid #b92323;
       font-size: 20px;
					   }
						

.btn  {
          width: 125px;
    text-align: center;
    color: #444;
    font-size: 20px;
    font-weight: bold;
    height: 45px;
    border-radius: 2px;
    border: none;
    transition: all 0.2s;
    color: #fff;
    text-shadow: 0 1px rgba(0,0,0,0.1);
        background-color: rgb(179, 25, 25);
    margin: 5px;
    cursor: pointer;
	    margin-bottom: 10px;
    margin-top: 13px;
	}

.btn:hover   {
           background: linear-gradient(90deg,#733636 ,#c12f2f 70%);
    color: rgba(255, 239, 239, 0.96);
    border: 1px black solid;
				   }
				   

       

td > a:link,a:visited {
		        text-decoration: none;
    padding: 10px;
    padding-right: 30px;
    padding-left: 30px;
    letter-spacing: 1px;
    word-spacing: 5px;
	color:white;
    
	   }
	   
	  
	   .errors {
	color:red;
	font-family:Arial;
	
}

	   
	   #last {
		   font-family:Century;font-size:20px
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


	   
ul {
	list-style-type:none;
	margin:0px;
	padding:0px;
	overflow:hidden;
	background-color:#c93737;
	    position: fixed;
    left: 80%;
    top: 0px;
	font-size: 24px;
	border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
	 border: 1px black solid;
	border-top: none;
}

li > a {
	display:block;
	padding:14px 16px;
	text-decoration:none;
}
li {
	    float: left;
       border-right: 1px black solid;
    
}

li:last-child {
	border-right:none;
}

li > a:hover {
	background-color:gray;
}
	  

	  


	.login {
	    box-shadow: 0px 0px 20px 19px #b92323;
    width: 32.4%;
    padding-top: 0px;
	    padding-bottom: 10px;
   margin-top: 120px;
    margin-bottom: 100px;
    background: #fff;
	
	}
	
	
.lhead {padding:10px;
text-align:center;
font-size:40px;
    background-color: #e44343;
}

.uitext {background:url("./loginmail.png");
           background-repeat: no-repeat;
              background-size: 30px 42px;
                 background-position-x: 2px;
           background-position-y: 1px;
		    font-family: Comic Sans MS;
           }
.uipass {
	background:url("./password.png");
           background-repeat: no-repeat;
           background-size: 30px 42px;
    background-position-y: 2px;
    background-position-x: 1px;
	 font-family: Comic Sans MS;
  
	  
}

</style>

<head>
<title>
My-Note
</title>
</head>


<body>
<div class="mnheader">
Note-Book
</div>

<ul>
<li>
<a href="index.php">&nbsp;Log In</a>
</li>
<li>
<a href="register.php"> Sign-up</a>
</li>
</ul>
<center>
<div class="login">
<form action="<?php $this_page ?>" method="POST">
<div class="lhead">Log In</div>
<table style="padding:0px;margin-top:-10px">
<tr><td><span class="errors"><?php echo $invalid; ?></span></td></tr>
<tr><td><br><input type="text" name="username" placeholder="Username"  style="padding-left: 35px;" maxlength="50" class="uitext" value="<?php if(isset($username)){echo $username;}?>" required ><br><span class="errors"><?php echo $error_username; ?></span></td></tr>
<tr><td><br><input type="password" name="password" placeholder="Password" class="uipass" style="padding-left: 35px;" required ><br><span class="errors"><?php echo $error_password; ?></span></td></tr>
<tr><td><input type="submit" value="Log In" class="btn"></td></tr>
<tr><td><hr>OR<hr></td></tr>
<tr><td style=" font-family: Comic Sans MS;">Don't Have An Account ??</td></tr>
<tr><br><br><td><a href="register.php" class="btn" style="background-color:rgb(179, 25, 25);"> CREATE AN ACCOUNT  </a></td></tr>
</table>
</form>
</div>
</center>
</body>
