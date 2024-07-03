(function() {

   const variacion = document.querySelector('#variacion')
   if(variacion) {

      const itemShop = document.querySelectorAll('.wc_variaciones__item')
      const detallesDOM = document.querySelector('.wc_variaciones__detalle')

      itemShop.forEach(input => {
         input.addEventListener('click', seleccionado)
      })

      function seleccionado() {

         const activoPrevio = document.querySelector('.wc_variaciones__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wc_variaciones__activo');
         }

         const botonPrevio = document.querySelector('.wc_variaciones__detalle')
         if(botonPrevio) {
            while(botonPrevio.firstChild) {
               botonPrevio.removeChild(botonPrevio.firstChild)
            }
         }

         const id = this.dataset.id
         const nombre = this.dataset.nombre
         
         if(id) {
            this.classList.add('wc_variaciones__activo')
            const botonComprar = document.createElement('A')
            botonComprar.classList.add('wc_variaciones__add-to-cart')
            botonComprar.innerHTML = `<i class="fa fa-shopping-cart" aria-hidden="true"></i> ${nombre}`
            botonComprar.href = `?add-to-cart=${id}`
            detallesDOM.appendChild(botonComprar)
         }
         
      }
   }

})();