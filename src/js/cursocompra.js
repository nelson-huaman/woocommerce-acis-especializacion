(function() {
   
   const planes = document.querySelector('#planes')
   if(planes) {

      const item = document.querySelectorAll('.wc_planes__item')
      const shop = document.querySelector('.wc_planes__compra')
      item.forEach(input => {
         input.addEventListener('click', seleccionado)
      })

      function seleccionado() {

         // Elimina class activo
         const activoPrevio = document.querySelector('.wc_planes__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wc_planes__activo')           
         }

         const botonPrevio = document.querySelector('.wc_planes__compra')
         if(botonPrevio) {
            while(botonPrevio.firstChild) {
               botonPrevio.removeChild(botonPrevio.firstChild)
            }
         }

         const producto = this.dataset.producto
         const id = this.dataset.id

         if(producto) {
            this.classList.add('wc_planes__activo')

            const opciones = {
               1: 'Comprar Curso',
               2: 'Comprar Plan Clásico',
               3: 'Comprar Plan Premium'
            }

            const botonComprar = document.createElement('A')
            botonComprar.classList.add('wc_planes__pago')
            botonComprar.textContent = opciones[id]
            botonComprar.href = `?add-to-cart=${producto}`
            shop.appendChild(botonComprar)
         }

      }

   }

})();