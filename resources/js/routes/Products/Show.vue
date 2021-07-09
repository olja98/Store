<template>
 
        <div>
            <div class="product_image_area">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                
                    <div class="single_product_img">
                        <img v-bind:src="/images/+product.product_image.image" alt="#" class="img-fluid">
                    </div>
                   
                </div>
                <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{product.product_name}}</h3>
                    <p>{{product.product_description}}</p>
                    <div class="card_area">
                        <div class="product_count_area">
                          
                            <p>$ {{product.price}}</p>
                        </div>
                    <div class="add_to_cart">
                        <a  class="btn_3" @click="$store.commit('addToCart', product)">add to cart</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

</template>
<script>

   export default {
     
      products() {
                return this.$store.state.products;
            },
             data(){
            return {
                
                product : [],
               
            }
        },
        beforeMount(){
            let url = `api/products/${this.$route.params.id}`
            axios.get(url).then(response => this.product = response.data)      
        }
       
}

        
        
    
</script>