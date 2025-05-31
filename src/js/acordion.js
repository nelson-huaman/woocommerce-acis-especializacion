(function() {

   const acordion = document.querySelector('#acordion');
   if(acordion) {

      document.querySelectorAll('#acordion .acordion__item').forEach(item => {
         const header = item.querySelector('.acordion__header');
         const body = item.querySelector('.acordion__body');
         const icon = header.querySelector('i');
  
         header.addEventListener('click', () => {
            const isVisible = body.style.display === 'block';
   
            // Toggle current item
            if (!isVisible) {
               body.style.display = 'block';
               icon.classList.remove('fa-angle-right');
               icon.classList.add('fa-angle-down');
            } else {
               body.style.display = 'none';
               icon.classList.remove('fa-angle-down');
               icon.classList.add('fa-angle-right');
            }
         });
      });
   }
})();