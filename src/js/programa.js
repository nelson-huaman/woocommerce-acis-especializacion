(function() {

   const simple = document.querySelector('#simple')
   if(simple) {

      const cart = document.querySelectorAll('.wcm_shop__cart')
      const addtocartDOM = document.querySelector('.wc_pagar')

      cart.forEach(input => {
         input.addEventListener('click', seleccionado)
      })

      function seleccionado() {

         const activoPrevio = document.querySelector('.wcm_shop__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wcm_shop__activo');
         }

         const botonPrevio = document.querySelector('.wc_pagar')
         if(botonPrevio) {
            while(botonPrevio.firstChild) {
               botonPrevio.removeChild(botonPrevio.firstChild)
            }
         }

         const data = this.dataset.id
         const add = this.dataset.add

         if(data) {
            this.classList.add('wcm_shop__activo')

            const opciones = {
               1: 'Comprar este Curso',
               2: 'Adquirir Plan Clásico',
               3: 'Adquirir Plan Premium'
            }

            const botonComprar = document.createElement('A')
            botonComprar.classList.add('wc_dashboard__add-to-cart')
            botonComprar.textContent = opciones[add]
            botonComprar.href = `?add-to-cart=${data}`
            addtocartDOM.appendChild(botonComprar)
         }
      }
   }

})();