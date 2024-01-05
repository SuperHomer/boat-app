import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Boats from './components/Boats.vue';

const app = createApp({
    components: {
        Boats,
    }
});

app.mount('#app');