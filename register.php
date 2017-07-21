<?php

require 'database.php';

	function final_touch($field) {
		$field = trim($field);
		$field = stripslashes($field);
		$field = htmlspecialchars($field);
		
		return $field ;
	}
	
$no_data ='NO DATA';
$error_name = '';
$error_username = '';
$error_password = '';
$error_gender = '';
$error_head = '';


if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password']) && isset($_POST['number'])) {
	$name =$_POST['name'];
	$username =$_POST['username'];
	$password =$_POST['password'];
	$re_password =$_POST['re_password'];
	$encrypted_password =md5($password);
    $number =$_POST['number'];
	
	if(empty($name)) {
		$error_name ='*Name is Required!';
		$error_head = '!There are one or more errors in your form.Correct them and register again.';
	}else {
		$name = final_touch($name);
		
		
	/*	if(!preg_match("/^[a-zA-Z]*$/",$name)) {
			$error_name = '*Your Name Must Contain Only Letters and Spaces!';
			$error_head = '!There are one or more errors in your form.Correct them and register again.';
		}else {
			
		}*/
	}
	
	if(empty($username)) {
		$error_username ='*Username is Required!';
		$error_head = '!There are one or more errors in your form.Correct them and register again.';
	}else {
		$username = final_touch($username);
		
	}
	
	if(empty($password)) {
		$error_password ='*Password is Required!';
		$error_head = '!There are one or more errors in your form.Correct them and register again.';
	}else {
		
	}
	
	
	if(empty($_POST['gender'])) {
		$error_gender ='*Select Your Gender!';
		$error_head = '!There are one or more errors in your form.Correct them and register again.';
		
	}else {
		$gender = $_POST['gender'];
		
	}
	
	if(empty($number)) {
		$number = $no_data;
		
	}else {
		$number = final_touch($number);
	}
	
	if(!empty($name) && !empty($username) && !empty($password) && !empty($re_password) && !empty($_POST['gender'])) {
		
		if($password!=$re_password) {
		//	echo 'NON-IDENTICAL PASSWORDS!! <br>';
		//	echo 'It seems you made some mistake while re-typing your password.<br>Make sure that the passwords you entered are identical.<br><br>';
			$error_password ='*Password did not Match!';
    	}else {
		    $query="SELECT `username` FROM `myuser` WHERE `username`='$username'";
		    if($query_run =mysql_query($query)) {
			    $query_row=mysql_num_rows($query_run);
			    if($query_row==1) {
				    $error_username='Sorry!! This username already Exists.<br>Please try a different Username';
			    }else {
				    $query = "INSERT INTO `myuser` VALUES ('','$name','$username','$encrypted_password','$gender','$number')";
				    if($query_run =mysql_query($query)) {
					    echo 'Registered Successfully';
						header('Location: account_created.php');
						
				    }else {
					    echo 'registration failed';
				    }
				
			    }
		    }
		
		}
				
		
	
	}else {
		
			
	}
	
}

	

	
	
	
	


?>

<style type="text/css">

body {
	background-color:rgba(255, 235, 0, 0.32);; margin:0px;
}


h2 {  
    color: #fff;
    font-size: 56px;
    font-weight: bolder;
    font-family: Monotype Corsiva;
        text-shadow: 4px 1px 10px #000;

}

table {   
    padding: 10px;
    border-radius: 30px;
    font-weight: bolder;
}


td {           text-align: center;
    
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 10px;
	font-family: Comic Sans MS;
	font-size:22px;
	    padding-right: 12px;}
	
input[type=number],input[type=text],input[type=password]
                       {    padding: 10px;
					   padding-bottom:3px;
          width: 380px;
         margin: 10px;
        border: none;
		border-bottom:2px solid #b92323;
       font-size: 20px;
	   font-family: Comic Sans MS;
					   }
						

.btn  {
          width:100%;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
	 font-family:Arial;
    height: 45px;
    border-radius: 2px;
    border: none;
    transition: all 0.2s;
    color: #fff;
    text-shadow: 0 1px rgba(0,0,0,0.1);
        background-color: rgb(179, 25, 25);
    margin: 5px;
    cursor: pointer;
	      margin-bottom: 14px;
    margin-top: 19px;
	}

.btn:hover   {
           background: linear-gradient(90deg,#733636 ,#c12f2f 70%);
    color: rgba(255, 239, 239, 0.96);
    border: 1px black solid;
				   }
				   

       

td >  a:link,a:visited {
		          text-decoration: none;
    padding: 10px;
    word-spacing: 5px;
    padding-left: 160px;
    padding-right: 160px;
    
	   }
	   
	   .errors {
	color:red;
	font-family:Arial;
	font-weight:normal;
	
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


.signin {box-shadow: 0px 0px 20px 19px #b92323;
    width:34%;
    padding-bottom: 10px;
    margin: 50px;
    margin-top: 100px;
    background: #fff;}
	
	
.lhead {
	
	padding:10px;
text-align:center;
font-size:40px;
    background-color: #e44343;
	
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
	   color:white;
    
}

li:last-child {
	border-right:none;
}

li > a:hover {
	background-color:gray;
}
	 


label {cursor:pointer}

input[type=radio]
 {padding:10px;margin:10px;background:#fff;}
  input[type=radio] {
  -webkit-appearance: none;
  -moz-appearance: none;
    -o-appearance: none;
  appearance: none;
  width: 10px;
  height: 10px;
  cursor: pointer;
  vertical-align: middle;
  background:#fff;
  border: 1px solid #b92323;
  -webkit-border-radius: 1px;
  -moz-border-radius: 1px;
  border-radius: 1px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position: relative;
  }
  input[type=radio]:active {
  border-color: #c6c6c6;
  background: #ebebeb;
  }
   input[type=radio] {
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
  width: 10px;
  height: 10px;
  }
  input[type=radio]:checked::after {
  content: '';
  display: block;
  position: relative;
  top: -7.7px;
  left: -8px;
  width: 16px;
  height: 16px;
  background:#b92323;
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
  }
  

	

</style>

<head>
<title>
My-Note | Registration
</title>
</head>


<body>

<div class="mnheader">
Note-Book

</div>
<ul>
<li>
<a href="index.php" style="color:white;">&nbsp;Log In</a>
</li>
<li>
<a href="register.php" style="color:white;"> Sign Up</a>
</li>
</ul>

<center>
<div class="signin">
<form action="register.php" method="POST">
<div class="lhead">Sign Up</div>
<table>
<tr><td class="errors"><?php echo $error_head;?></td><tr>
<tr><td><input type="text" name="name" value="<?php if(isset($name)){echo $name;}?>" placeholder="Name" maxlength="50"/><br><span class="errors"><?php echo $error_name; ?></span></td></tr>
<tr><td><input type="text" name="username" value="<?php if(isset($username)){echo $username;}?>" maxlength="50" placeholder="Username"/><br><span class="errors"><?php echo $error_username; ?></span></td></tr>
<tr><td><input type="password" name="password" placeholder="Password"/><br><span class="errors" ><?php echo $error_password; ?></span></td></tr>
<tr><td><input type="password" name="re_password"  placeholder="Confirm your Password"/><br><span class="errors"><?php echo $error_password; ?></span></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;Gender: &nbsp;&nbsp;&nbsp;<input type="radio" name="gender" class="radiom" id="radio" value="Male" />&nbsp;<label for="radio">Male</label> &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" class="radiom" id="radiof" name="gender" value="Female" />&nbsp;<label for="radiof">Female</label>
<br><span class="errors"><?php echo $error_gender; ?></span></td></tr>
<tr><td><input type="number" name="number" value="<?php if(isset($number)){echo $number;}?>" placeholder="Contact Number" /></td></tr>
<tr><td><input type="submit" value="Register" class="btn" /></td></tr>
<tr><td><hr>OR<hr></td></tr>
<div class="signup">
<tr><br><br><td style=" font-family: Comic Sans MS;">Already have an Account ??</td></tr>
<tr><td><a href="login.php" class="btn" >Log In  </a></td></tr>
</div>
</table>
</form>
</div>
</center>
</body>