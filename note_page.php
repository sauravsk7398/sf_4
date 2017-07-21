


<?php




$name = grab_data('name');
$user_id = grab_data('id');	
$user_username = grab_data('username');
$user_gender = grab_data('gender');
$user_num = grab_data('number');


    if(isset($_POST['home'])) {
	
	    $_SESSION['nb']=0;
	    header('Location: index.php');
	
    }

	if(isset($_POST['account'])) {
		
		$_SESSION['nb']=0;
		$_SESSION['acc']=permit();
		
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




.delete {
	text-align: center;
    color: #444;
    font-size: 18px;
    font-weight: bold;
    height: 42px;
    padding: 2px;
    width: 170px;
    border-radius: 7px;
    transition: all 0.5s;
    border: 3px solid #523030;
    color: #fff;
    text-shadow: 0 1px rgba(0,0,0,0.1);
    background-color: rgb(13, 47, 43);
    margin: 5px;
    box-shadow: 0px 0px 8px 0px rgb(72, 73, 76);
    cursor: pointer;
}

.delete:hover   {background:#fff;
                   color:#fe4d4d;
				   box-shadow:px 1px 7px 10px;
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


<br><br><br>


<table id="bear">
<tr class="results">
<th class="zen">My Notes</th><th style="width: 30%;">EDIT</th>
</tr>
<tr>
<td colspan="2"></td>
</tr>
</table>
<br>
<table id="cola">
<div >
<tr class="core">
   <td>
    <form action="<?php $this_page ?>" method="POST">
    <textarea name="my_text" rows="7" cols="66"  placeholder="WRITE YOUR DAILY NOTES HERE AND KEEP THEM SAFE "></textarea>
	
   </td>
</tr>

<tr class="core">
   <td>
    <input type="submit" value="Save Note" class="btn"></form>
    <form action="<?php $this_page ?>" method="POST"><input type="submit" name="display_my_notes" value="Display My Notes" class="btn">
    </form>
   </td>
</tr>
</div>
</table >


<br>
<hr>
</body>

<?php
 
 
 require 'database.php';

            if(isset($_POST['my_text'])) {
			
				$my_text=$_POST['my_text'];
				
	            if(!empty($user_id) && !empty($my_text)) {
		            
					$query="INSERT INTO `usernote` VALUES('','$user_id','$my_text')";
					if($query_run=mysql_query($query)) {
							
					    echo '<script type="text/javascript">'; 
						echo 'alert("Your Note Has Been Saved. Click on the \'DISPLAY MY NOTES\' button to view your SAVED NOTES anytime.")';
						echo '</script>';
							
					    
					}else {
						//echo 'error while storing data';
					}
					
					
	            }else {
		            echo '<script type="text/javascript">'; 
						echo 'alert("An empty note cannot be saved.Please add some note in the given Text Area.")';
						echo '</script>';
	            }
	
            }else {
				//echo 'not set';
			} 

 ?>
 
 <?php


            if(isset($_POST['display_my_notes'])) {
				
	            if(!empty($user_id)) {
		            
					$query="SELECT `the_note`,`id` FROM `usernote` WHERE `user_id`='$user_id'";
					if($query_run=mysql_query($query)) {
						
						$query_rows=mysql_num_rows($query_run);
						if($query_rows==0) {
							echo '<script type="text/javascript">'; 
						echo 'alert("You have not saved any NOTE yet.")';
						echo '</script>';
							
						}else {
						
						while($query_row = mysql_fetch_assoc($query_run)) {
							$my_text=$query_row['the_note'];
							$id=$query_row['id'];
							
?>
<script type="text/javascript">

function show_index(index) {
	var show=document.getElementById("row"+index).rowIndex;
	return show;
}

function delete_note(button_index) {
	var row_index=show_index(button_index);
	document.getElementsByTagName('table')[0].deleteRow(row_index);
	
	
}
						
								var the_note ='<?php echo $my_text;?>'; 
	                            var table = document.getElementsByTagName('table')[0];
                                var order =table.rows.length;
								var newRow = table.insertRow(table.rows.length).outerHTML="<tr id='row"+order+"' class='results'><td style='padding-left:30px'>"+the_note+"</td><td class='room'><form action='<?php echo $this_page; ?>' method='POST'><br><input id='delete"+order+"' type='button' value='Hide This Note' class='delete' onclick='delete_note("+order+")'>&nbsp;&nbsp;<input id='a_delete"+order+"' type='submit' value='Delete This Note' class='delete'><input type='hidden' name='delete_it' value='<?php echo $id;?>' size='2'></form></td></tr>";

</script>
<?php								
							//echo $my_text.'<br>';
							
						}
				        }
					    
					}else {
						
						//query not runned
					}
					
				
					
	            }else {
		           // echo 'its empty';
	            }
	
            }else {
				//echo 'not set';
			}



?>
<hr>

<?php

if(isset($_POST['delete_it'])) {
	
	$delete_it=$_POST['delete_it'];
	
	if(!empty($delete_it)) {
		
		$query="DELETE FROM `usernote` WHERE `id`='$delete_it'";
		if($query_run=mysql_query($query)){

					    echo '<script type="text/javascript">'; 
						echo 'alert("Your Note Has Been Deleted. Click on the \'DISPLAY MY NOTES\' button to view your SAVED NOTES anytime.")';
						echo '</script>';		
		
		
		}else {
			//echo 'query did not run';
		}
		
		
	}else {
		//echo 'its empty';
	}
}else {
	//echo 'delete button not set';
}


?>

