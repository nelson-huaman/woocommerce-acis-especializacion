(function() {

   const variaciones = document.querySelector('#variaciones')
   if(variaciones) {
      
      const cart = document.querySelectorAll('.wc_variaciones__variacion')
      const addtocartDOM = document.querySelector('.wcv_pagar')

      cart.forEach(input => {
         input.addEventListener('click', seleccionado)
      })

      function seleccionado() {

         const activoPrevio = document.querySelector('.wc_variaciones__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wc_variaciones__activo');
         }

         const botonPrevio = document.querySelector('.wcv_pagar')
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
            botonComprar.classList.add('wcv_pagar__add-to-cart')
            botonComprar.textContent = `Pagar ${nombre}`
            botonComprar.href = `?add-to-cart=${id}`
            addtocartDOM.appendChild(botonComprar)
         }
      }
   }

})();
