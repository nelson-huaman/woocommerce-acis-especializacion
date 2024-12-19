(function() {
   const divCurso = document.querySelector('#wc_curso');
   if(divCurso) {
      document.querySelectorAll('#afiliarme').forEach( item => {
         item.addEventListener('click', e => {
            const body = e.target.parentElement.nextElementSibling;
            const button = e.target;
            if(body.classList.contains('activo')) {
               body.classList.remove('activo');
               button.classList.remove('activo');
            } else {
               document.querySelectorAll('.wc_curso__body.activo').forEach(bodyActivo=> {
                  bodyActivo.classList.remove('activo');
                  bodyActivo.previousElementSibling.querySelector('#afiliarme').classList.remove('activo');
               })

               body.classList.add('activo');
               button.classList.add('activo');
            }
         });
      });
   }
})();