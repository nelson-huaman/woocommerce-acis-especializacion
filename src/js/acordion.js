(function() {

   const acordion = document.querySelector('#acordion')
   if(acordion) {

      const acordionItem = document.querySelectorAll('.wc_acordion__item')
      acordionItem.forEach(function(item) {
         item.addEventListener('click', function() {
            acordionItem.forEach(function(item) {
               item.classList.remove('wc_acordion__open')
            })
            if(item.querySelector('.wc_acordion__body')) {
               item.classList.add('wc_acordion__open')
            }
         })
      })
   }

})();