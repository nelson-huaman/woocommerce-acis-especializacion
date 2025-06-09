<?php

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$name = getenv('DB_NAME');

// $db = mysqli_connect($host, $user, $pass, $name);

// if (!$db) {
//    echo "Error: No se pudo conectar a MySQL.";
//    echo "errno de depuración: " . mysqli_connect_errno();
//    echo "error de depuración: " . mysqli_connect_error();
//    exit;
// }

// $usuario = wp_get_current_user();
// $query = "CALL certificados('" . $usuario->user_login . "')";
// $resultado = $db->query($query);
// ?>

<!-- <div class="tutoriales">
   <div class="tutoriales__h2">Mis Cetificados</div>
   <div class="tutoriales__contenido">
      <?php if($resultado->num_rows > 0) { ?>
         <p class="tutoriales__cantidad"><?php echo $resultado->num_rows; ?> Cursos</p>
         <p class="tutoriales__slogan"><span>* SE:</span> No amerita</p>
         <table class="tabla">
            <thead class="tabla__thead">
               <tr>
                  <th scope="col" class="tabla__th">Curso</th>
                  <th scope="col" class="tabla__th">Nota</th>
                  <th scope="col" class="tabla__th">Fecha</th>
                  <th scope="col" class="tabla__th">Link</th>
               </tr>
            </thead>
            <tbody class="tabla__tbody">
               <?php foreach($resultado as $certificado) { ?>
                  <tr class="tabla__tr">
                     <td class="tabla__td">
                        <div class="tabla__td--texto"><?php echo $certificado['Curso']; ?></div>
                     </td>
                     <td class="tabla__td">
                        <?php echo $certificado['Nota']; ?>
                     </td>
                     <td class="tabla__td">
                        <div class="tabla__td--fecha">
                           <?php
                              $date = new DateTime($certificado['Fecha']);
                              echo $date->format('Y-m-d');
                           ?>
                        </div>
                     </td>
                     <td class="tabla__td">
                        <?php if($certificado['Link']) { ?>
                           <a href="<?php echo $certificado['Link']; ?>" download="Brochure <?php echo $certificado['Curso']; ?>.pdf" target="_blank" class="tabla__td--enlace">Descargar</a>
                        <?php } else { ?>
                           <p class="tabla__td--pendiente">Pendiente</p>
                        <?php } ?>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      <?php } else { ?>
         <p class="tutoriales__texto">Aun no a resuelto su Cuestionario o no esta matriculado en ningún Curso</p>
      <?php } ?>
   </div>
</div>  -->