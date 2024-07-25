import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import Swiper from 'swiper';
window.Swiper = Swiper.use([Autoplay, Navigation, Pagination]);