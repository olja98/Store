<template>
        <div>
            <div class="container-fluid hero-section d-flex align-content-center justify-content-center flex-wrap ml-auto">
                <h2 class="title">Welcome to the MIRIS</h2>
            </div>
            <div class="gallery-area">
 
                             <div class="row">
                            <div class="container-fluid p-0 fix" v-for="product in products" :key="product.id">
                          <div class="single-gallery mb-30">
                                <img v-bind:src="/images/+product.product_image.image" >
                            </div>
                              <router-link :to="{name: 'products.show', params: {id: product.id, slug:product.slug}}">
                            
                                    <h5><span v-html="product.product_name"></span>
                                        <span class="small-text text-muted float-right">$ {{product.price}}</span>
                                    </h5>
                             </router-link>
                            </div>
                        </div>
                        </div>
                    </div>


    </template>

    <script>
        export default {
              data(){
                return {
                    
                    products : []
                }
            },
            mounted(){
                axios.get("api/products/").then(response => this.products = response.data)      
            },
          

          computed: {
            products() {
                return this.$store.state.products;
            }
        }
            
        }

        
    </script>