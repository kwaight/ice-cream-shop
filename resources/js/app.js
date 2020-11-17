import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';
import _ from 'lodash';

Vue.use(VueRouter)
Vue.use(VueAxios, axios);

import App from './views/App'
import Container from './views/Container'
import PickContainer from './views/PickContainer'
import Confirm from './views/Confirm'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'PickContainer',
            component: PickContainer
        },
        {
            path: '/container/:id',
            name: 'container',
            component: Container,
        },
        {
            path: '/confirm',
            name: 'confirm',
            component: Confirm,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
