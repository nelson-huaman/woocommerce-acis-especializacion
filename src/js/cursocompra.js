(function() {
   
   const planes = document.querySelector('#planes');
   if(planes) {

      const item = document.querySelectorAll('.wc_planes__item');
      item.forEach( input => input.addEventListener('click', seleccionado) );

      function seleccionado() {

         // Elimina class activo
         const activoPrevio = document.querySelector('.wc_planes__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wc_planes__activo')           
         }

         this.classList.add('wc_planes__activo')
      }

   }

})();