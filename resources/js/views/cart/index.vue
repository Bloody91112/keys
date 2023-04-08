<template>
    <section>
        <div class="title">
            <h1>my cart</h1>
            <div v-if="cartProducts && cartProducts.length > 0" class="count">
                {{ cartProducts.length }} items
            </div>
        </div>
        <table v-if="cartProducts && cartProducts.length > 0">
            <thead>
            <tr>
                <td>products</td>
                <td>price</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in cartProducts">
                <td class="product">
                    <div class="image">
                        <img  :src="product.preview" alt="image">
                    </div>
                    <ul class="product-info">
                        <li class="product-title">
                            <RouterLink :to="{ name:'products.item', params: { id: product.id } }">{{ product.title }}</RouterLink>
                        </li>
                        <li><span>{{ product.category.title }}</span> </li>
                        <li><span v-for="tag in product.tags"> {{ tag.title }} </span></li>
                    </ul>
                </td>
                <td class="price">{{ product.priceWithCurrency }}</td>
                <td @click="deleteFromCart(product.id)" class="trash"><img src="../../../images/icons/trash.svg" alt="trash"></td>
            </tr>
            </tbody>
        </table>
        <div style="text-align: center" v-else>Empty</div>
        <div v-show="totalPrice && totalPrice > 0"  class="result">
            <div class="total">
                <div class="total-row">
                    <span class="title">order total</span>
                    <span class="value">{{ totalPrice }}$</span>
                </div>
            </div>
            <button id="payment">Pay</button>
        </div>
    </section>
</template>

<script>
import TitleComponent from "../../components/TitleComponent.vue";
import ProductList from "../../components/ProductList.vue";

export default {
    name: "index.vue",
    components: {ProductList, TitleComponent},
    data() {
        return {
            totalPrice: null
        }
    },
    mounted() {
        this.$store.dispatch('getCartProducts')
    },
    computed: {
        cartProducts() {
            return this.$store.getters.cartProducts
        },
        totalPrice(){
            let sum = 0;
            this.cartProducts.forEach( item => sum += Number(item.price))
            return sum;
        }
    },
    methods: {
        deleteFromCart(id){
            let cartItems = JSON.parse(localStorage.getItem('cartItems'));
            cartItems = cartItems.filter(itemId => itemId !== id)
            localStorage.setItem('cartItems', JSON.stringify(cartItems))
            this.$store.dispatch('getCartProducts')
        }
    }
}
</script>

<style lang="scss" scoped>
section {
    margin-top: 30px;

    .title {
        position: relative;

        h1 {
            margin: 30px 0 15px;
            font-size: 2.6rem;
            font-family: quantico, sans-serif;
            letter-spacing: .05em;
            line-height: 1.2;
            text-align: center;
            text-shadow: 0 0 12px rgba(100, 162, 235, .36), 0 0 12px rgba(100, 162, 235, .36), 0 0 12px rgba(100, 162, 235, .36);
            text-transform: uppercase;
        }

        .count {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translate(0, -50%);
            text-shadow: 0 0 9px #1f143d, 0 0 9px #1f143d, 0 0 9px #1f143d, 0 0 9px #1f143d;
            font-family: quantico, sans-serif;
            font-weight: 400;
            letter-spacing: .05em;
            text-transform: uppercase;
            font-size: 1.4rem;

            @media (max-width: 767px) {
                position: unset;
                text-align: center;
            }
        }
    }

    table {
        width: 100%;

        thead {
            background-color: #0c0020;
            border-radius: 3px;
            letter-spacing: .05em;
            text-transform: uppercase;
            font-size: 1.2rem;

            tr {
                td {
                    padding: 14px;

                    @media (max-width: 767px) {
                        font-size: 0.8rem;
                    }
                }
            }
        }

        tbody {
            background-color: #190f34;
            border-radius: 3px;
            tr{
                border: 1px solid rgba(255,255,255,.3);

                td{
                    padding: 20px;

                    @media (max-width: 767px) {
                        padding: 10px;
                    }
                }

                .product{
                    display: flex;
                    align-items: center;
                    gap: 20px;

                    @media (max-width: 767px) {
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 10px;
                    }

                    .image{

                        img{
                            object-fit: cover;
                            height: 200px;
                            width: 160px;
                            @media (max-width: 767px) {
                                height: 100px;
                                width: 80px;
                            }
                        }
                    }

                    .product-info{

                        li span{
                            font-size: 1.2rem;
                            margin-top: 0.25em;
                            text-transform: uppercase;
                            opacity: .75;
                            display: block;

                            @media (max-width: 767px) {
                                font-size: 0.8rem;
                            }
                        }

                        .product-title a{
                            font-size: 1.4rem;
                            letter-spacing: .05em;
                            text-transform: uppercase;
                            text-decoration: none;
                            color: white;

                            @media (max-width: 767px) {
                                font-size: 1rem;
                            }
                        }
                    }
                }

                .price{
                    font-size: 2rem;
                    font-weight: 400;
                    line-height: 1.25;

                    @media (max-width: 767px) {
                        font-size: 1rem;
                    }
                }

                .trash img{
                    cursor: pointer;

                    @media (max-width: 767px) {
                        transform: scale(0.6);
                    }
                }
            }

        }
    }

    .result{
        margin-bottom: 30px;
        display: flex;
        flex-direction: column;
        background-color: #0c0020;
        float: right;
        border-radius: 3px;
        padding: 20px 28px;
        width: 300px;


        @media (max-width: 767px) {
            max-width: 100%;
            min-width: 100%;
        }

        .total{
            .total-row{
                display: flex;
                flex-direction: row;
                gap: 30px;
                margin-bottom: 10px;
                .title,.value{
                    color: #9694aa;
                    font-size: 1.2rem;
                    font-weight: 400;
                    padding: 5px 0;
                    text-transform: uppercase;
                }
            }
        }
        #payment{
            background-color: #0e9b72;
            border-color: #0e9b72;
            background-image: linear-gradient(to top,#0e9b72 0%,#24b48b 50%,#44e6b7 100%);
            padding: 0.35em 1em;
            font-size: 1.6rem;
            align-items: center;
            animation: button .3s linear forwards;
            background-position: 50% 100%;
            background-size: 100% 200%;
            border-radius: 20px;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            justify-content: center;
            letter-spacing: .05em;
            line-height: 1;
            text-align: center;
            text-transform: uppercase;
            transition: all .3s;
        }
    }
}
</style>
