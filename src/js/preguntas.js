(function () {
   const preguntas = document.querySelectorAll('.membresia__pregunta');
   if (preguntas) {
      preguntas.forEach(pregunta => {
         const titulo = pregunta.querySelector('.titulo')
         const texto = pregunta.querySelector('.texto')

         titulo.addEventListener('click', () => {
            // cerrar las demás
            preguntas.forEach(p => {
               if (p !== pregunta) {
                  p.classList.remove('activa')
                  p.querySelector('.texto').style.maxHeight = null
               }
            })

            // toggle actual
            pregunta.classList.toggle('activa')

            if (pregunta.classList.contains('activa')) {
               texto.style.maxHeight = texto.scrollHeight + 'px'
            } else {
               texto.style.maxHeight = null
            }
         })
      })
   }

   const menus = document.querySelector('.membresia__navegacion .menu')
   if (menus) {

      const btnMenu = document.querySelector('.menu');
      const mobileMenu = document.querySelector('nav.mobile');

      btnMenu.addEventListener('click', () => {
         mobileMenu.classList.toggle('active');
      });
   }
})();