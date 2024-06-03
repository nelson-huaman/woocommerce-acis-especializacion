// (function() {
//    const opciones = document.querySelector('#simple')
//    if(opciones) {

//       const inputRadio = document.querySelectorAll('[type="radio"]')
//       const html = document.querySelector('.wc_pagar')

//       selecionarRadio()

//       inputRadio.forEach(radio => {
//          radio.addEventListener('input', selecionarRadio)
//       })

//       function selecionarRadio() {

//          const botonPrevio = document.querySelector('.wc_pagar')
//          if(botonPrevio) {
//             while(botonPrevio.firstChild) {
//                botonPrevio.removeChild(botonPrevio.firstChild)
//             }
//          }

//          const radioSeleccionado = document.querySelector('[name="simple"]:checked')

//          if(radioSeleccionado) {
//             const valorRadio = {
//                0: 'Comprar Curso',
//                1: 'Adquirir Plan Clásico',
//                2: 'Adquirir Plan Premium'
//             }
//             const produtoID = radioSeleccionado.value
//             const botonNombre = radioSeleccionado.dataset.id

//             const botonComprar = document.createElement('A')
//             botonComprar.classList.add('wc_pagar__boton')
//             botonComprar.textContent = valorRadio[botonNombre]
//             botonComprar.href = `?add-to-cart=${produtoID}`
//             html.appendChild(botonComprar)
//          }
//       }


//    }
// })();

// Pagar Membresía
(function() {

   const shop = document.querySelector('#shop-memebresia')
   if(shop) {

      const cart = document.querySelectorAll('.wcm_shop__cart')
      const addtocartDOM = document.querySelector('.wc_dashboard__pagar')

      cart.forEach(input => {
         input.addEventListener('click', seleccionado)
      })

      function seleccionado() {

         const activoPrevio = document.querySelector('.wcm_shop__activo')
         if(activoPrevio) {
            activoPrevio.classList.remove('wcm_shop__activo');
         }

         const botonPrevio = document.querySelector('.wc_dashboard__pagar')
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
               1: 'Comprar Curso',
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

// Pagar por Variaciones
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

// Pagar Curso o Membresía
(function() {

   const simple = document.querySelector('#simple')
   if(simple) {

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
