(function() {

   const select = document.querySelector('#opciones-pago');
   if(select) {
      select.addEventListener('change', () => {
         const optionSelected = select.options[select.selectedIndex]
   
         const id = optionSelected.value;
         const regular = optionSelected.dataset.regular;
         const oferta = optionSelected.dataset.oferta;
   
         const mostrarDOM = document.querySelector('.precios__mostrar');
         if(mostrarDOM) {
            while(mostrarDOM.firstChild) {
               mostrarDOM.removeChild(mostrarDOM.firstChild)
            }
         }
   
         if(id) {
            const precioRegular = document.createElement('P');
            precioRegular.classList.add('precios__texto', 'precios__texto--regular')
            precioRegular.textContent = `S/. ${regular}`
            
            const precioOferta = document.createElement('P');
            precioOferta.classList.add('precios__texto', 'precios__texto--oferta')
            precioOferta.textContent = `S/. ${oferta}`
            
            const botonAddToCard = document.createElement('a');
            botonAddToCard.classList.add('precios__boton')
            botonAddToCard.innerHTML = `<i class="fa-solid fa-cart-shopping"></i> Pagar Ahora`
            botonAddToCard.href = `?add-to-cart=${id}`
   
            if(oferta !== regular) {
               mostrarDOM.appendChild(precioRegular)
            }
            mostrarDOM.appendChild(precioOferta)
            mostrarDOM.appendChild(botonAddToCard)
         }
   
      })
   }



})();