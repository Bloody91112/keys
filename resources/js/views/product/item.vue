<template>
    <section v-if="product">
        <div class="product">
            <div class="image">
                <img :src="product.preview" alt="image">
                <div
                    @click="this.$store.dispatch('toggleWishlistItem', { event: $event, id : product.id })"
                    :class="[ 'wishlist', inWishlist ? 'inWishlist' : '' ]"
                >
                    <img src="../../../images/icons/wishlist-product.svg" alt="wishlist">
                </div>
            </div>
            <div class="info">
                <div class="title">{{ product.title }}</div>
                <div class="price-block">
                    <div class="price-info">
                        <div v-if="product.discount" class="discount">
                            <span>{{ product.discountWithPercentage }}</span>
                        </div>
                        <div v-if="product.priceWithCurrency" class="price">
                            {{ product.priceWithCurrency }}
                        </div>
                        <div class="price" v-else>No promocodes</div>
                    </div>
                    <button v-if="product.priceWithCurrency"
                            @click="this.$store.dispatch('toggleCartItem', { event: $event, id : product.id})"
                            :class="['cart', cartItems?.includes(product.id) ? ' inCart' : '' ]">
                        <span class="label">Add to cart</span>
                        <img width="28" height="28" src="../../../images/icons/card-cart.svg" alt="cart">
                    </button>
                </div>
                <ul class="properties">
                    <li class="property">
                        <span class="property-title">Category:</span>
                        <span class="property-value">{{ product.category.title }}</span>
                    </li>
                    <li class="property" v-if="product.tags">
                        <span class="property-title">Tags:</span>
                        <span class="property-value">
                            <span v-for="tag in product.tags"> {{ tag.title }} </span>
                        </span>
                    </li>
                    <li class="property">
                        <span class="property-title">Version:</span>
                        <span class="property-value">{{ product.version.title }}</span>
                    </li>
                    <li class="property">
                        <span class="property-title">Promocodes:</span>
                        <span class="property-value">{{ product.promocodesCount }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="relative-products"></div>
        <div class="description">
            <div class="description-block">
                <h3>Description</h3>
                <div v-html="product.description" class="text"></div>
            </div>
            <div class="description-block">
                <h3>Requirements</h3>
                <div v-html="product.requirements" class="text"></div>
            </div>
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
            productId: null
        }
    },
    computed: {
        product() {
            return this.$store.getters.product
        },
        cartItems() {
            return JSON.parse(localStorage.getItem('cartItems'))
        },
        inWishlist() {
            return !!this.$store.getters.user?.favorites.find( item => this.product?.id === item.product.id)
        }
    },
    mounted() {
        const productId = this.$route.params.id
        if (productId) {
            this.productId = productId
        }
    },
    watch: {
        $route(to, from) {
            if (to.params.id !== from.params.id) {
                this.productId = to.params.id
            }
        },
        productId(to, from) {
            if (to !== from) {
                this.$store.dispatch('getProduct', to)
            }
        }
    }
}
</script>

<style lang="scss" scoped>

section {
    margin-top: 30px;

    .product {
        display: flex;
        column-gap: 30px;
        row-gap: 15px;

        @media (max-width: 767px) {
            flex-direction: column;
        }

        .image {
            position: relative;
            flex: 0 0 auto;

            @media (max-width: 767px) {
                align-self: center;
                width: 100%;
            }

            img {

                object-fit: cover;

                @media (max-width: 767px) {
                    width: 100%;
                }
            }

            .wishlist {
                position: absolute;
                top: 0;
                right: 0;
                background-color: #392a65;
                background-image: linear-gradient(to top, #392a65 0%, #58468d 100%);
                padding: 5px 11px;
                transition-duration: 0.3s;
                cursor: pointer;

                &:hover {
                    box-shadow: 0 0 5px rgba(83, 65, 134, .9), 0 0 5px rgba(83, 65, 134, .9), 0 0 5px rgba(83, 65, 134, .9), 0 0 5px rgba(83, 65, 134, .9);
                }

                img {
                }
            }
        }

        .info {
            flex: 1 1 auto;

            .title {
                color: #fff;
                font-family: montserrat, sans-serif;
                font-size: 2.4rem;
                font-weight: 400;
                letter-spacing: 1.18px;
                line-height: 1.5;
                margin: 0;
                text-align: left;
                text-shadow: none;
                text-transform: uppercase;

                @media (max-width: 767px) {
                    font-size: 1.6rem;
                }
            }

            .price-block {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                row-gap: 20px;
                margin-top: 15px;

                .price-info {
                    display: flex;
                    column-gap: 20px;
                    align-items: center;

                    .discount {
                        background-color: #e6224d;
                        border-radius: 5px;
                        box-shadow: 0 4px 0 #791237;
                        padding: 15px;

                        @media (max-width: 767px) {
                            padding: 10px;
                        }

                        span {
                            color: #fff;
                            font-family: quantico, sans-serif;
                            font-size: 2.8rem;
                            font-weight: 400;
                            letter-spacing: 1.31px;
                            line-height: 1;
                            text-shadow: 0 0 8px rgba(255, 255, 255, .75);
                            text-transform: uppercase;

                            @media (max-width: 767px) {
                                font-size: 1.8rem;
                            }
                        }
                    }

                    .price {
                        color: #fff;
                        font-weight: 600;
                        letter-spacing: .05em;
                        font-size: 4rem;
                        line-height: 1;
                        text-transform: uppercase;

                        @media (max-width: 767px) {
                            font-size: 1.5rem;
                        }
                    }
                }

                .cart {
                    font-size: 1.4rem;
                    padding: 0.9em 2.5em;
                    background-color: #0e9b72;
                    background-image: linear-gradient(to top, #0e9b72 0%, #24b48b 50%, #44e6b7 100%);
                    align-items: center;
                    animation: button .3s linear forwards;
                    background-position: 50% 100%;
                    background-size: 100% 200%;
                    border: 1px solid #0e9b72;
                    border-radius: 1.5em/50%;
                    color: #fff;
                    cursor: pointer;
                    display: inline-flex;
                    justify-content: center;
                    letter-spacing: .05em;
                    line-height: 1;
                    text-align: center;
                    text-transform: uppercase;
                    transition: all .3s;
                    font-weight: 600;
                    gap: 10px;

                    @media (max-width: 767px) {
                        padding: 0.5em 1.5em;
                    }

                    .label {
                        display: block;

                        @media (max-width: 767px) {
                            display: none;
                        }
                    }

                    img {
                        display: block;
                    }
                }
            }

            .properties {
                background-color: #0c0020;
                border: 1px solid #4c4364;
                border-radius: 5px;
                margin-top: 15px;

                .property {
                    border-bottom: 1px solid #4c4364;
                    align-items: center;
                    display: flex;
                    padding: 15px;
                    font-size: 1.4rem;
                    letter-spacing: .05em;
                    text-transform: uppercase;

                    .property-title {
                        font-weight: 800;
                        flex: 0 0 auto;

                        @media (max-width: 767px) {
                            font-size: 1rem;
                        }
                    }

                    .property-value {
                        flex: 1 1 auto;
                        display: flex;
                        column-gap: 10px;
                        padding-left: 15px;

                        @media (max-width: 767px) {
                            font-size: 1rem;
                        }
                    }
                }
            }
        }
    }

    .relative-products {
    }

    .description {
        margin: 30px 0;
        background-color: #0c0020;
        border: 1px solid #4c4364;
        padding: 30px;

        @media (max-width: 767px) {
            padding: 15px;
        }

        .description-block {
            h3 {
                margin-bottom: 20px;
                font-size: 2rem;
                font-weight: 800;
                @media (max-width: 767px) {
                    font-size: 1.5rem;
                }
            }

            .text {
                margin-bottom: 20px;
            }
        }
    }
}
</style>

