(function() {

   const acordion = document.querySelector('#acordion');
   if(acordion) {

      document.querySelectorAll('.wc_acordion__header').forEach(header => {
         header.addEventListener('click', () => {
            // Encuentra el cuerpo relacionado a este encabezado
            const body = header.nextElementSibling;
            const icono = header.querySelector('.wc_acordion__icono');
     
            // Si el cuerpo ya está abierto, simplemente ciérralo
            if (body.classList.contains('active')) {
               body.classList.remove('active');
               icono.classList.add('fa-plus-circle');
               icono.classList.remove('fa-minus-circle');
            } else {
               // Cierra todos los cuerpos activos del acordeón
               document.querySelectorAll('.wc_acordion__body.active').forEach(activeBody => {
                  activeBody.classList.remove('active');
                  activeBody.previousElementSibling.querySelector('.wc_acordion__icono').classList.add('fa-plus-circle');
                  activeBody.previousElementSibling.querySelector('.wc_acordion__icono').classList.remove('fa-minus-circle');
               });
     
               // Abre el cuerpo actual y cambia el icono
               body.classList.add('active');
               icono.classList.remove('fa-plus-circle');
               icono.classList.add('fa-minus-circle');
            }
         });
      });
     
   }

})();