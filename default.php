<html>

<head>
	<style type="text/css">
		div#content-inner-login {
			float: center;
			padding: 0px 0 15px 0;
			margin: 70px 50px 0 50px;
			background-color: #FFF;
		}
	</style>
</head>

<body style="background-image: url('assets/image/uho-1.jpg');background-size: cover;">
	<center>
		<div id="content-inner-login">
			<form action="login.php?op=in" method="POST">
				<table cellpadding="0" cellspacing="5" bgcolor="#B0C4DE">
					<tr height="36" bgcolor="#F8F8FF">
						<th colspan="5">Login Your Authorization:</th>
					</tr>
					<tr>
						<td>
							<table>
								<tr><br />
									<td><img src="assets/image/admin.jpg" width="100" height="100" /></td>
									<td style="vertical-align: top">
										Username &nbsp;: <input type="text" name="user" size="17" /><br />
										Password&nbsp;&nbsp;&nbsp;: <input type="password" name="password" size="17" /><br /><br />
										Hak Akses &nbsp;: <select name="akses">
											<option value="0">-- Hak Akses --</option>
											<option value="perlengkapan">Perlengkapan</options>
											<option value="prodi">Prodi</option>
											<option value="pegawai">Pegawai</option>
										</select><br /><br />
										<input style="float:right" type="submit" value="LOGIN" /><br /></td>
								</tr>
								<tr height="10">
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