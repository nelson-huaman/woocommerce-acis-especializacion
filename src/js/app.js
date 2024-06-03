(function() {
   const opciones = document.querySelector('#simple')
   if(opciones) {

      const inputRadio = document.querySelectorAll('[type="radio"]')
      const html = document.querySelector('.wc_pagar')

      selecionarRadio()

      inputRadio.forEach(radio => {
         radio.addEventListener('input', selecionarRadio)
      })

      function selecionarRadio() {

         const botonPrevio = document.querySelector('.wc_pagar')
         if(botonPrevio) {
            while(botonPrevio.firstChild) {
               botonPrevio.removeChild(botonPrevio.firstChild)
            }
         }

         const radioSeleccionado = document.querySelector('[name="simple"]:checked')

         if(radioSeleccionado) {
            const valorRadio = {
               0: 'Comprar Curso',
               1: 'Adquirir Plan Clásico',
               2: 'Adquirir Plan Premium'
            }
            const produtoID = radioSeleccionado.value
            const botonNombre = radioSeleccionado.dataset.id

            const botonComprar = document.createElement('A')
            botonComprar.classList.add('wc_pagar__boton')
            botonComprar.textContent = valorRadio[botonNombre]
            botonComprar.href = `?add-to-cart=${produtoID}`
            html.appendChild(botonComprar)
         }
      }


   }
})();

(function() {

   const variaciones = document.querySelector('#variaciones')

   if(variaciones) {
      

      const inputRadio = document.querySelectorAll('[type="radio"]')
      const html = document.querySelector('.wc_pagar')

      selecionarRadio()

      inputRadio.forEach(radio => {
         radio.addEventListener('input', selecionarRadio)
      })

      function selecionarRadio() {

         const botonPrevio = document.querySelector('.wc_pagar')
         if(botonPrevio) {
            while(botonPrevio.firstChild) {
               botonPrevio.removeChild(botonPrevio.firstChild)
            }
         }

         const radioSeleccionado = document.querySelector('[name="variation"]:checked')
         if(radioSeleccionado) {

            const produtoID = radioSeleccionado.value
            const nombreProducto = radioSeleccionado.dataset.id
            const botonComprar = document.createElement('A')
            botonComprar.classList.add('wc_pagar__boton')
            botonComprar.textContent = `Pagar ${nombreProducto}`
            botonComprar.href = `?add-to-cart=${produtoID}`
            html.appendChild(botonComprar)
         }
      }
   }
})();

(function() {

   const shop = document.querySelector('#shop-memebresia')
   if(shop) {

      const cart = document.querySelectorAll('.wcm_shop__cart')

      cart.forEach(input => {
         input.addEventListener('click', seleccionado)
      })

      function seleccionado() {

         const activoPrevio = document.querySelector('.wcm_shop__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wcm_shop__activo');
         }
         
         const data = this.dataset.id

         if(data) {
            this.classList.add('wcm_shop__activo')

            const opciones = {
               0: 'Comprar Curso',
               1: 'Adquirir Plan Clásico',
               2: 'Adquirir Plan Premium'
            }

            // const produtoID = opciones.value
            // const botonNombre = opciones.dataset.id

            // const botonComprar = document.createElement('A')
            // botonComprar.classList.add('wc_pagar__boton')
            // botonComprar.textContent = opciones[botonNombre]
            // botonComprar.href = `?add-to-cart=${data}`
            // html.appendChild(botonComprar)
            
            
            
         }
         // console.log(e)
         // console.log(data)

   
      }
      
   }




})();
