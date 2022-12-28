<link rel="stylesheet" href="css/style.css">

<main>
        
    <body class="bodyform">

      <section class="form-contact">
         <header class="headerform">
            <span class="spanform">
               <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </span>
         </header>

         <form method="post" action="phpmailer.php" enctype="multipart/form-data" class="formulariocontacto">
            <label for="nombres">Nombres</label>
            <input class="inputform" type="text" name="nombre" id="nombre">

            <label for="nombres" class="labelform">Apellido</label>
            <input class="inputform" type="text" name="apellido" id="apellido">

            <label for="correo" class="labelform">Email</label>
            <input class="inputform" type="text" name="email" id="email">

            <label for="mensaje" class="labelform">Mensaje</label>
            <textarea class="textareaform" name="mensaje" id="mensaje" rows="6" cols="80"></textarea>
            <input type="submit" value="Enviar">


         </form>
      </section>

   </body>
        
        
    </main>