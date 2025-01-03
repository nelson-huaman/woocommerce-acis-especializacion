(function() {
   const divCurso = document.querySelector('#wc_curso');
   if(divCurso) {
      document.querySelector('#afiliarme').addEventListener('click', (e) => {
         const body = e.target.parentElement.nextElementSibling;
         const button = e.target;
         if(body.classList.contains('activo')) {
            body.classList.remove('activo');
            button.classList.remove('activo');
         } else {
            body.classList.add('activo');
            button.classList.add('activo');
         }
      });
   }
})();