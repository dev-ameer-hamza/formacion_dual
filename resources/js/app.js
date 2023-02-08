import './bootstrap';
//importacion del vue
import 'laravel-datatables-vite';

import { createApp } from 'vue';
//app absico
import App from './App.vue';
createApp(App).mount("#unapp");
//carrousel base
import Extra from './extra.vue';
createApp(Extra).mount("#extravue");
//manuales
import Manual from './extra2.vue';
createApp(Manual).mount("#manual");


import.meta.glob([
    '../images/**'
]);
