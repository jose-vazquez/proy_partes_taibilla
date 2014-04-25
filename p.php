<!DOCTYPE html> 
<html>
<head>
  <meta charset="UTF-8">
  <title>MCT - Validacion de usuarios</title>
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
</head>
<body> 

<div data-role="page" id="inicio">

	<div data-role="header">
		<h2>Autenticacion de Usuario</h2>
	</div>
    
	<div data-role="content">	
		<form 
			id="frm_login"
			method="post"
			action="./includes/check_lg.php" >
      
      			<label> Usuario </label>
      			<input 
					type="text" 
					id="n_usu" 
					name="nom_usuario">
      
      			<label> Password </label>
     			<input 
					type="password" 
					id="pass" 
					name="clave" >

      			<input 
					type="submit" 
					id="bt_login" 
					value="Login">
      
    		</form>		
	</div>
	 
</div>
 
</body>
</html>
