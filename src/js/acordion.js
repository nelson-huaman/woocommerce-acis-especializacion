(function() {

   const acordion = document.querySelector('#acordion');
   if(acordion) {

      const acordionItem = document.querySelectorAll('.wc_acordion__item');
      acordionItem.forEach(item => {
         item.addEventListener('click', function() {
            // Verifica si el elemento ya está abierto
            const isOpen = item.classList.contains('wc_acordion__open');

            // Cierra todos los elementos
            acordionItem.forEach(item => {
               item.classList.remove('wc_acordion__open');
            });

            // Si el elemento no estaba abierto, lo abre; si ya estaba abierto, lo deja cerrado
            if (!isOpen && item.querySelector('.wc_acordion__body')) {
               item.classList.add('wc_acordion__open');
            }
         });
      });

   }

})();