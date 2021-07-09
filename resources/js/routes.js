import Vue from 'vue';
import Router from 'vue-router';




Vue.use(Router);

export default new Router({
  routes: [
    {
        path: '/',
        name: 'products.index',
        component:()=> import('./routes/Products/Index.vue')
    },

    {
        path: '/product/:slug',
        name: 'products.show',
        component:()=> import('./routes/Products/Show.vue')
    },

    {
        path: '/checkout',
        name: 'payment.checkout',
        component:()=> import('./routes/Payment/Check.vue')
    },

    {
        path: '/summary',
        name: 'payment.summary',
        component:()=> import('./routes/Payment/Summary.vue')
    }




]});