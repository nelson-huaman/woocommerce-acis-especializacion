import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

document.addEventListener('DOMContentLoaded', function() {

   if(document.querySelector('.slider')) {

      const opciones = {
         modules: [Navigation, Pagination, Autoplay],
         slidesPerView: 1,
         spaceBetween: 30,
         loop: true,
         freeMode: true,
         autoplay: {
            delay: 2500,
            disableOnInteraction: false,
         },
         navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
         },
         pagination: {
            el: '.swiper-pagination',
            clickable: true,
         },
         breakpoints: {
            768: {
               slidesPerView: 2,
            }
         }
      }
      new Swiper('.slider', opciones)
   }
});