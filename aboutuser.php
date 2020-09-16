<html>
<head>
	<style type="text/css">
		div#content{float:center; padding:0px 0 15px 0; margin:70px 50px 0 50px; background-color:#FFF;}
	</style>
</head>
<body>
<center><div id="content">
	<form action="login.php?op=in" method="POST"> 
		<table cellpadding="0" cellspacing="5" bgcolor="#B0C4DE">
			<tr height="36" bgcolor="#F8F8FF">
				<th colspan="5">Your Login Detail</th>
			</tr>
			<tr>
				<td>
					<table>
						<tr><br />
							<td><img src="../assets/image/user.jpg" width="100" height="100" /></td>
							<td style="vertical-align: top">
							<br>
							Username&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo ucfirst($_SESSION['username']);?><br />
							<br>
							Hak Akses&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo ucfirst($_SESSION['akses']);?><br />
							</td>
						</tr>
						<tr height="5">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</div>
</center>
</body>
</html>