let app =  new Vue({
    el: '#page-container',
    data: {
        projectUrl : '/kubo-shopping-cart/index.php',
        message: 'Hello Vue!',
        author : 'Desarrollado por: Dimitri Avila Y.',
        cartContent : {},
        productName : '',
        productPrice : '',
        productDescription : '',
        productQuantity : 0,
        productAdded : false,
        purchasedSuccess : false,
    },
    mounted() {
      console.log("vue working ok");
      this.purchasedSuccess = false;    
      this.getProductsinCart();        
    },
    methods: {
        getProductIdentier : function(idProduct) {            
            this.idCurrentProduct = idProduct;
            this.productAdded = false;
            this.errorOnProductAdded = false;            
            this.getProductInfo();
        },
        getProductInfo(){
            let formData = new FormData();
            formData.append('idProduct', this.idCurrentProduct);
            axios.post(this.projectUrl + '/info-product', formData)
                .then(response => {
                    console.log(response);
                    let productData = response.data[0];
                    console.log(productData.name);                    
                    this.productName = productData.name;
                    this.productPrice = productData.price;
                    this.productDescription = productData.description;
                })
                .catch(error => {
                    console.log(error);                    
                })
        },        
        getProductsinCart(){
            axios.post(this.projectUrl + '/products-on-cart')
                .then(response => {
                    //console.log(response);
                    this.cartContent = response.data;                    
                })
                .catch(error => {
                    console.log(error);                    
                })    
        },      
        confirmAddProduct(){            
            let formData = new FormData();
            formData.append('idProduct', parseInt(this.idCurrentProduct));
            formData.append('quantity', parseInt(this.productQuantity));
            axios.post(this.projectUrl +  '/add-to-cart', formData)
                .then(response => {                    
                    // assing object with cart content
                    this.cartContent = response.data;
                    this.productAdded = true;                    
                })
                .catch(error => {
                    console.log(error);
                    this.errorOnProductAdded = true;                
                })
        },                       
        decrementQuantity(index){
            this.cartContent[index].quantity--; 
        },
        incrementQuantity(index) {
            this.cartContent[index].quantity++;
        },
        finishPurchase(e){
            e.preventDefault();            
            let formData = new FormData();            
            axios.post(this.projectUrl + '/finish-purchase')
                .then(response => {
                    console.log(response);
                    if (response.data.success) 
                    {
                        this.purchasedSuccess = true;                       
                    }                     
                })
                .catch(error => {
                    console.log(error);                    
                })
        }
    },
    computed: {
        totalPrice : function() {
            return  Number.parseFloat(this.productPrice * this.productQuantity).toFixed(2);
        },
        quantityProducts : function() {
            let acumQuantity = 0;
            for (const key in this.cartContent) {
                if (this.cartContent.hasOwnProperty(key)) {
                    acumQuantity += parseInt(this.cartContent[key].quantity);
                }
            }
            return acumQuantity;
        },
        cartTotal : function(){
            let acumPrice = 0;
            for (const key in this.cartContent) {
                if (this.cartContent.hasOwnProperty(key)) {                    
                    acumPrice = acumPrice + (parseFloat(this.cartContent[key].price) * parseFloat(this.cartContent[key].quantity));
                }
            }
            return Number.parseFloat(acumPrice).toFixed(2);
        },
        totalAmountInCart : function(){
            let acumPrice = 0;
            for (const key in this.cartContent) {
                if (this.cartContent.hasOwnProperty(key)) {                    
                    acumPrice = acumPrice + (parseFloat(this.cartContent[key].price) * parseFloat(this.cartContent[key].quantity));
                }
            }
            return Number.parseFloat(acumPrice).toFixed(2);
        }
    },
    watch: {
        //...
    }
})