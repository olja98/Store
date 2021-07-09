/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
const axios = require('axios').default;
Vue.use(Vuex);
import VueRouter from 'vue-router';
import Show from './routes/Products/Show.vue';


Vue.use(VueRouter);

Vue.component('index-comp', require('./components/ProductComponent.vue').default);

const router = new VueRouter( {
   
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
            component:()=> import('./routes/Payment/Check.vue'),
        },
    
        {
            path: '/summary',
            name: 'payment.summary',
            component:()=> import('./routes/Payment/Summary.vue')
        }
    
    
    
    
    ] 

});


const store=new Vuex.Store( {
    state: {
        products:[],
        cart:[],
        payment:{}
    },

    mutations: {
        updateProducts(state, products){
            state.products=products;

        },

        addToCart(state, product){
            console.log(product.id);
            let productInCartIndex = state.cart.findIndex(item=>item.id==product.id);
            if(productInCartIndex!=-1){
                state.cart[productInCartIndex].quantity++;
                return;
            }
            product.quantity = 1;
            state.cart.push(product);
        },

        removeFromCart(state, index){
            state.cart.splice(index,1);
        },

        updatePayment(state, payment){
            state.payment=payment;
        },

        updateCart(state, cart){
            state.cart=cart;
        }

    },

    actions:{
        getProducts({commit }){
            axios.get('/shop')
            .then((response)=>{
                commit('updateProducts', response.data);
            });
        },

        clearCart({commit}){
            commit('updateCart', []);
        }

        
    }

});

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    router,
    store:store,
    components:{Show},
    created(){
        store.dispatch('getProducts')
        .then(_=>{});
    }
}).$mount('#app');
