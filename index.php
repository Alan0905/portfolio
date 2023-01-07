<?php require_once('config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<?php require_once('inc/header.php') ?>
<link rel="stylesheet" href="button.css" />
    <link rel="stylesheet" href="estilos.css" />
  <body>

   <!-- Header
   ================================================== -->
   <header id="home">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

         <ul id="nav" class="nav" text-align="center">
            <li class="current"><a class="smoothscroll" href="#home">Inicio</a></li>
            <li><a class="smoothscroll" href="#about">Acerca de mí</a></li>
            <li><a class="smoothscroll" href="#resume">Habilidades</a></li>
            <li><a class="smoothscroll" href="#portfolio">Proyectos y certificaciones</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
<?php 
$u_qry = $conn->query("SELECT * FROM users where id = 1");
foreach($u_qry->fetch_array() as $k => $v){
  if(!is_numeric($k)){
    $user[$k] = $v;
  }
}
$c_qry = $conn->query("SELECT * FROM contacts");
while($row = $c_qry->fetch_assoc()){
    $contact[$row['meta_field']] = $row['meta_value'];
}
// var_dump($contact['facebook']);
?>
      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline">Hola! Soy <?php echo isset($user) ? ucwords($user['firstname'].' '.$user['lastname']) : ""; ?>.</h1>
            <h3>Soy un programador BackEnd, con muchísimas ganas de aprender lo nuevo en tecnología y software. Scrollea para conocerme mejor!</h3>
            <hr />
            
            <ul class="social">
               <li><a target="_blank" href="<?php echo $contact['linkin'] ?>"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->


   <!-- About Section
   ================================================== -->
   <section id="about">

      <div class="row">

         <div class="three columns">

            <img class="profile-pic"  src="portfolio.jfif" alt="" />

         </div>

         <div class="nine columns main-col">

            <h2>Acerca de mí</h2>
            <style>
              #about_me *{
                color:#7A7A7A !important;
              }
            </style>
            <div id="about_me"><?php include "about.html"; ?></div>

            <div class="row">

               <div class="columns contact-details">

                  <h2>Datos</h2>
                  <p class="address">
               <span><?php echo $contact['address'] ?></span><br>
               <span><?php echo $contact['mobile'] ?></span><br>
                     <span><?php echo $contact['email'] ?></span>         
                     <br>
                     <a href="CV- Negrette Alan.pdf" target="_blank" class="aportfolio">Ver Curriculum Vitae</a>
             </p>

               </div>

               <div class="columns download">
                  <p>
                     <!-- <a href="#" class="button"><i class="fa fa-download"></i>Download Resume</a> -->
                  </p>
               </div>

            </div> <!-- end row -->

         </div> <!-- end .main-col -->

      </div>

   </section> <!-- About Section End-->


   <!-- Resume Section
   ================================================== -->
<section id="resume">
   <div class="row">

      <h1 class="h1contacto">Habilidades</h1>

      <section class="skills section" id="skills">
         <div class="skills__container h-grid">
            <div data-aos="fade-down">
               <div data-aos="fade-down" class="skills__data">
                  <div class="skills__names" >
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/php.png" alt="php" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/mysql.png" alt="mysql" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/laravel.png" alt="laravel" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/html-5.png" alt="html" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/css-3.png" alt="css" /></a>
                  </div>
                  <br>
                  <div class="skills__names tools">
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/javascript.png" alt="javasript" /></a>       
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/python.png" alt="python" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/firebase.png" alt="firebase" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/sql-server.png" alt="sqlserver" /></a>
                  </div>
                  <br>
                  <br>
                  <div class="skills__names tools">
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/git.png" alt="git" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/icons8-github.png" alt="github" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/icons8-trello.png" alt="trello" /></a>
                     <a href="#" class="skills__name"><img class="imgportfolio" src="./assets/icon/gitlab.png" alt="gitlab" /></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</section>
   
   <!-- Portfolio Section
   ================================================== -->
   <section id="portfolio">

      <div class="row">

         <div class="twelve columns collapsed">

            <h1 class="h1contacto">Proyectos que realice durante mi carrera</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
               <?php 
                  $p_qry = $conn->query("SELECT * FROM project ");
                  while($row = $p_qry->fetch_assoc()):
                  ?>
                 <div class="columns portfolio-item">
                    <div class="item-wrap">

                       <a href="#modal-<?php echo $row['id'] ?>" title="">
                          <img alt="" src="<?php echo validate_image($row['banner']) ?>">
                          <div class="overlay">
                             <div class="portfolio-item-meta">
                            <h5 class="truncate-1"><?php echo $row['name'] ?></h5>
                                <!-- <p>Illustrration</p> -->
                         </div>
                          </div>
                          <div class="link-icon"><i class="icon-plus"></i></div>
                       </a>
                    </div>
                </div> <!-- item end -->

              <?php endwhile; ?>

            </div> <!-- portfolio-wrapper end -->

         </div> <!-- twelve columns end -->


          <?php 
              $p_qry = $conn->query("SELECT * FROM project ");
              while($row = $p_qry->fetch_assoc()):
            ?>

         <!-- Modal Popup
        --------------------------------------------------------------- -->

         <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">

          <img class="scale-with-grid" src="<?php echo validate_image($row['banner']) ?>" alt="" />

          <div class="description-box">
            <h4><?php echo $row['name'] ?></h4>
            <p><?php echo stripslashes(html_entity_decode($row['description'])) ?></p>
               <span class="categories"><i class="fa fa-tag"></i><?php echo $row['client'] ?></span>
          </div>

            <div class="link-box">
               <!-- <a href="http://srikrishnacommunication.com/Giridesigns.html" target="_blank">Details</a> -->
             <a class="popup-modal-dismiss">Close</a>
            </div>

        </div><!-- modal-01 End -->

      <?php endwhile; ?>


      </div> <!-- row End -->
      

<section id="contactame">
   <div class="row">
      <body class="bodycontactoo">
      <h1 class="h1contacto">Contactame</h1>
      <main class="maincontacto">
        <form method="post" action="phpmailer.php" enctype="multipart/form-data" class="formcontactoo">
            <div class="divcontacto">
                <span class="spancontacto">Tu nombre</span>
                <input required class="inputcontactoo" type="text" name="nombre" autocapitalize="words" autocomplete="off" />
            </div>
              </br>
            <div class="divcontacto">
                <span class="spancontacto">Tu apellido</span>
                <input required class="inputcontactoo" type="text" name="apellido" autocapitalize="words" autocomplete="off" />
            </div>
            
            </br>

            <div class="divcontacto">
                <span class="spancontacto">Tu email</span>
                <input  required class="inputcontactoo" type="email" name="email" autocomplete="off" />
            </div>
            <div class='large'>
                <span class="spancontacto">Mensaje</span>
                <textarea required class="textareacontacto" name="mensaje" rows="6" cols="80"></textarea>
            </div>
            <div class='large'>
                <button class='buttoncontacto' type="submit">Enviar mensaje</button>
            </div>
        </form>
    </main>
</body>
</div>

</section>
   



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


   </section> 
      <?php require_once('inc/footer.php') ?>
  </body>
</html>
