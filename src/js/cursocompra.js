(function() {
   
   const planes = document.querySelector('#planes');
   if(planes) {

      document.querySelectorAll('.wc_planes__plus').forEach( input => {
         input.addEventListener('click', () => {
            const body = input.nextElementSibling;
            const icono = input.querySelector('.fa');
   
            if(body.classList.contains('activo')) {
               body.classList.remove('activo');
               icono.classList.add('fa-plus');
               icono.classList.remove('fa-times');
            } else {
               document.querySelectorAll('.wc_planes__descripcion.activo').forEach(bodyActivo => {
                  bodyActivo.classList.remove('activo');
                  bodyActivo.previousElementSibling.querySelector('.fa').classList.add('fa-plus');
                  bodyActivo.previousElementSibling.querySelector('.fa').classList.remove('fa-times');
               });
   
               body.classList.add('activo');
               icono.classList.remove('fa-plus');
               icono.classList.add('fa-times');
            }
         });
      });
   }

})();