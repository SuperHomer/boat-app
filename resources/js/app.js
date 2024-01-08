import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import Boats from './components/Boats.vue';
import Boat from './components/Boat/Boat.vue';

const app = createApp({
    components: {
        Boats,
        Boat,
    }
});

app.mount('#app');