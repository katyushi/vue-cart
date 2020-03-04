import './bootstrap';
import Vue from 'vue';
import Tailwindcss from 'tailwindcss';

import Routes from '@/js/routes.js';

import App from '@/js/views/App';

Vue.use(Tailwindcss);

const App = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(app),
});

export default app;
