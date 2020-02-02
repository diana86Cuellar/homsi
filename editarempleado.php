<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Editar</title>
    </head>
    <body background="granos2.jpg">
        <h1 text align="center"><b><i><font color="white"> Editar Empleados </font></i></b></h1>
        <br>
        <header id="header" class="">
				<div class="header-top">
		  			<div class="container">
				  		<div class="row justify-content-end">
				  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  								  					
				  			</div>
				  		</div>			  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
                                          <a href="index.php"><img src="acceso.png" alt="" title="" width="80" height="50"></a>
				      </div>
				     		    		
			    	</div>
			    </div>
			  </header>
        
        <form action="">
            <table border="1" width="350" text align="center">
                <tr bgcolor="skyblue">
                    <th>Codigo: </th><th><input type="text" name="codigo" value="<%=resultado.getString(1)%>" readonly="readonly"></th>
                </tr>
                <tr bgcolor="skyblue">
                    <th>Nombre: </th><th><input type="text" value="<%=resultado.getString(2)%>" name="nombre"></th>
                </tr>
                <tr bgcolor="skyblue">
                    <th>Edad: </th><th><input type="text" value="<%=resultado.getString(3)%>" name="edad"></th>
                </tr>
                <tr bgcolor="skyblue">
                    <th>Genero: </th><th><input type="text" value="<%=resultado.getString(4)%>" name="genero" ></th>
                </tr>
                <tr bgcolor="skyblue">
                    <th>Puntos: </th><th><input type="text" value="<%=resultado.getString(5)%>" name="puntos"></th>
                </tr>
                <tr bgcolor="skyblue">
                    <th colspan="2"><input type="submit" name="editar" value="Editar Cliente"> </th>
                </tr>
                
                
            </table>
        </form>

    </body>
</html>