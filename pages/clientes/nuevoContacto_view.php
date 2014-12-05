<!--este es el formulario utilizado para crear un nuevo contacto-->
       <div id="AgregarContacto" style="display:none">
         <!--indicamos la url hacia donde va-->
        <input id="url_destination" type="hidden" value="guardar.php">
        
        <form id="Contacto" name="Contacto" class="form" >
            <input type="hidden" name="table" value="7">
            <input type="hidden" name="ID" value="idContacto">
           
            <table>
               <tr >
                    <td>Nombre</td>
                    <td><input name='data[Nombres]' id='Nombres' class="required" /></td>
               </tr>
               <tr >
                    <td>Apellido</td>
                    <td><input name='data[Apellidos]' id='Apellidos' class="required" /></td>
               </tr>
                <tr>
                    <td>Telefono</td>
                    <td><input name="data[Telefono]" id="Telefono" class="required" /></td>
                </tr>
                 <tr>
                    <td>Correo electronico</td>
                    <td><input name="data[Email]" id="Email" class="required" /></td>
                </tr>
                <tr>
                    <td>Celular</td>
                    <td><input name="data[Celular]" id="Celular" class="required" /></td>
                </tr>
                 <tr>
                    <td>Cargo</td>
                    <td><input name="data[Cargo]" id="Cargo" class="required" /></td>
                </tr>
                <tr>
                    <td>Cumpleaños</td>
                    <td><input name="data[Cumpleanos]" id="Cumpleanos" class="required datepick" /></td>
                </tr>
                <tr>
            </table>
          </form>
        </div>
     <!--fin del formulario de creacion de contacto-->