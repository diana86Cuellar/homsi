<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> HOMSI </title>
    </head>
    
    <p text align="center"> <img src="./img/logo_empresa.jpg"  ><br></p>
    
    <body  style=" background: aqua">
              
        
        <h2 text align="center"><b><i>DATOS DEL EMPLEADO </i></b></h2>
        <br>
        
        <div>
            <form method="post">
                <table border="1" width="350" text align="center">
                <tr bgcolor="skyblue">
                    
                            <th>Identificacion : </th><th><input type="text" name="Identificacion" value=<%=resultado.getString(1)%> ></th>
                            <tr bgcolor="skyblue">
                            <th>Nombre:  </th><th><input type="text" name="Nombre" value=<%=resultado.getString(2)%> ></th>
                            </tr>
                            <tr bgcolor="skyblue">
                            <th>Apellido: </th><th><input type="text" name=" Apellido" value=<%=resultado.getString(3)%> ></th>
                            </tr>
                            <tr bgcolor="skyblue">
                            <th>Telefono:: </th><th><input type="text" name=" Telefono" value=<%=resultado.getString(4)%> ></th>
                            </tr>
                            <tr bgcolor="skyblue">
                            <th>Correo: </th><th><input type="text" name=" Correo" value=<%=resultado.getString(5)%> ></th>
                            
                            </tr>

            </table> 

            </form>
            
            
        </div>
    </body>
</html>
