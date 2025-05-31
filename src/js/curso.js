(function() {
   const divCurso = document.querySelector('#opcion-pago');
   if(divCurso) {
      document.querySelectorAll('.simple__contenido').forEach(contenido => {
         contenido.addEventListener('click', () => {
            document.querySelectorAll('.simple__input').forEach(input =>{
               input.classList.remove('activo');
            })
            document.querySelectorAll('.simple__body').forEach(body =>{
               body.classList.remove('activo');
            })

            const item = contenido.closest('.simple__item');
            const input = item.querySelector('.simple__input');
            const body = item.querySelector('.simple__body');
            if(input) input.classList.add('activo');
            if(body) body.classList.add('activo');
         })
      })
   }
})();