<?php 

session_start();
include 'connection.php';

if(isset($_GET['Name'])){
	$Name=$_GET['Name'];
}

$q="SELECT * From customer WHERE Name='$Name'";
$result=mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
$_SESSION['senderName']=$Name;
?>

<html>
<head>
<title>transact</title>
<link rel = "stylesheet" type = "text/css" href = "buttons.css">
<style>
	table {
	font-family: 'Lato', sans-serif;;
	border-collapse: collapse;
	width: 100%;
	}

	h1{
	font-family: 'Lato', sans-serif;;
	font-size:40px;
	}
	
	td, th {
	border: 1px solid black;
	text-align: center;
	padding: 8px;
	}

	tr:nth-child(odd) {
	background-color:#D0D3D4;	
	}
	tr:nth-child(even) {
	background-color:#FDFEFE;	
	}
	nav{ /*this is the navigation bar*/
            width: 100%;
            background-color:grey;
            overflow:hidden;
        }
        nav ul{
            list-style-type: none; /*this is to remove the bullet pts*/
            float: right;
            margin-top:7px;
        }
        nav ul li{
            display:inline-block; /*elements will be shown in a single line*/

        }
        nav ul li a{ /*styling anchors*/
            text-decoration:none;
            padding: 20px 35px;
            text-align:center ;
            color: 	#000000;
            display:block;
            font-weight: 700;
        }
        .logo{
            float: left;
            padding: 10px;
        }
</style>
</head>

<body style="background-color:#FDFEFE;">
 <nav>
            <div class="logo">
                <img src="logo.png" width="50" height="50">
            </div>
            <ul>
            <li><a href='sparks.php' onMouseOver="this.style.color='#E67E22'"
                    onMouseOut="this.style.color='#FDFEFE'">SPARKS FOUNDATION BANKING SYSTEM</a></li>
			<li><a href="home.php" onMouseOver="this.style.color='#E67E22'"
                    onMouseOut="this.style.color='#FDFEFE'">HOME</a></li>
                <li><a href="display.php" onMouseOver="this.style.color='#E67E22'"
                    onMouseOut="this.style.color='#FDFEFE'">View Customers</a></li>
               
                <li><a href="transfermoney.php" onMouseOver="this.style.color='#E67E22'"
                    onMouseOut="this.style.color='#FDFEFE'">Transfer Money </a></li>
                <li><a href="transactionhistory.php" onMouseOver="this.style.color='#E67E22'"
                    onMouseOut="this.style.color='#FDFEFE'">View Transaction History</a></li>
            </ul>
        </nav>

<br>

<div>
	<h1 style="font-family: 'Lato', sans-serif;;text-align:center;color:FireBrick;">Account Details</h1>
	<table style="background-color:#f5f5dc;">
	   <th>CUSTOMER ID</th>
	   <th>NAME </th>
	   <th>EMAIL</th>
	   <th>CURRENT BALANCE</th>
	   <tr>
	   
		<?php  
			$row=mysqli_fetch_array($result)
		?>
		
		 
		<td><?php echo  $row["id"]; ?></td>
		<td><?php echo  $row["name"]; ?></td>
		<td><?php echo  $row["email"]; ?></td>
		<td><?php echo  $row["balance"]; ?></td>
	   </tr>

	</table>
</div>
	
<?php echo "<form method='post' action='transaction.php?Name=$Name'>"?>
<br><br>
<h3 style="font-family: cursive;color:	FireBrick;">Select the user to whom you want to transfer money from the dropdown list</h3>
<table border="0px" style="background-color:#f5f5dc;">
	<tr>
	<td>Transfer To:</td>
	<td><select name="user">
		<option>--Select--</option>

		<?php  
			$q1="select * from customer";
			$result1=mysqli_query($con,$q1);
			while($row=mysqli_fetch_array($result1)){
		?>

		<option value="<?php echo $row['name']; ?>"> <?php echo $row["name"]; ?></option>

		<?php }
		?>
		
		</select></td></tr> 
		<tr><td>Amount:</td><td><input type="text" name="Amount"></td></tr>
		<tr><td></td><td><input type="submit" name="submit" value="Submit" align=center style="margin-top: 10px; width:6em; height:2em; font-size:15px; background-color:Beige; font-weight: bold;"></td></tr>
</table>

</form>



</body>
</html>