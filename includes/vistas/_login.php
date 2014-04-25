<body> 

<div data-role="page" id="login">

	<div data-role="header">
		<h2>Autenticacion de Usuario</h2>
	</div>
    
	<div data-role="content">	
		<form 
			id="frm_login"
			method="post"
			action="index.php" >
      
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
					value="Login"
					data-inline="true">
      
    		</form>		
	</div>
	 
</div>
 
</body>

</html>
