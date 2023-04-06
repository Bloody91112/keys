<template>
    <div v-if="product" class="product">
        <div class="thumb">
            <RouterLink :to="{ name: 'products.item', params: { id: product.id } }" class="image">
                <img :src="product.preview" alt="preview">
                <span v-if="product.discount" class="discount">{{ product.discountWithPercentage }}</span>
            </RouterLink>
            <div class="info">
                <RouterLink :to="{ name: 'products.item', params: { id: product.id } }" class="product-title">
                    {{ product.title }}
                </RouterLink>
                <div class="bottom">
                    <div class="price">{{ product.priceWithCurrency }}</div>
                    <div class="actions">
                        <a class="wishlist">
                            <img src="../../images/icons/card-wishlist.svg" alt="wishlist">
                        </a>
                        <a class="cart">
                            <img src="../../images/icons/card-cart.svg" alt="cart">
                            <span class="cart-text">Buy now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
      product: {
          type: Object,
          default: null,
      }
    },
    name: "ProductCard"
}
</script>

<style lang="scss" scoped>
.product{
    max-width: 18%;
    min-height: 100%;
    padding: 30px 0;

    @media (max-width: 1024px) {
        max-width: 23%;
    }

    @media (max-width: 767px) {
        max-width: 31%;
        padding: 15px 0;
    }

    .thumb{
        display: flex;
        flex-direction: column;
        gap: 15px;
        min-height: 100%;


        .image{
            display: block;
            text-decoration: none;
            position: relative;
            box-shadow: 0px 40px 23px -24px rgb(0 0 0);
            transition-duration: 0.5s;

            &:hover{
                transform: scale(1.1);
            }

            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .discount{
                display: block;
                background-color: #e6224d;
                box-shadow: 0 4px 0 rgba(230,34,77,.5);
                color: #fff;
                font-family: quantico,sans-serif;
                font-size: .9rem;
                padding: 3px 6px;
                position: absolute;
                text-shadow: 0 0 8px rgba(255,255,255,.75);
                bottom: 5px;
                z-index: 2;

                @media (min-width: 768px) {
                    font-size: 2rem;
                    right: 5px;
                    bottom: 12px;
                    padding: 3px 8px;
                }
            }
        }
        .info{
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            margin-top: 6px;
            background-color: #0c0020;
            border-radius: 3px;
            padding: 4px 10px 10px;
            flex: 1 1 auto;

            @media (min-width: 1024px) {
                margin-top: 14px;
                padding: 15px;
            }

            @media (min-width: 768px) {
                margin-top: 14px;
                padding: 10px;
            }

            .product-title{
                display: block;
                text-decoration: none;
                font-size: 1.4rem;
                color: #fff;
                font-weight: 400;
                letter-spacing: .05em;
                line-height: 1.5;
                margin-bottom: 16px;
                margin-top: 0;
                text-transform: uppercase;
                transition: text-shadow .3s;

                &:hover {
                    text-decoration: none;
                    text-shadow: 0 0 20px rgba(37,146,238,.9), 0 0 20px rgba(37,146,238,.9), 0 0 20px rgba(37,146,238,.9);
                }

                @media (max-width: 768px) {
                    font-size: 0.8rem;
                }
            }
            .bottom{
                .price{
                    border-top: 1px solid rgba(255,255,255,.1);
                    display: block;
                    margin-top: auto;
                    padding-top: 15px;
                    letter-spacing: .05em;
                    line-height: 1;
                    width: 100%;
                    min-height: 40px;
                    font-size: 1.2rem;

                    @media (max-width: 767px){
                        margin-top: 4px;
                    }

                    @media (max-width: 768px) {
                        font-size: 0.8rem;
                    }

                    @media (min-width: 640px) {
                        text-align: left;
                    }


                }
                .actions{
                    display: flex;
                    gap: 15px;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: 8px;

                    @media (max-width: 1024px){
                        gap: 5px;
                    }

                    .wishlist{
                        border-radius: 3px;
                        background-color: #392a65;
                        background-image: linear-gradient(to top,#392a65 0%,#58468d 100%);
                        padding: 3px 7px;
                        display: block;
                        margin: 0;
                        text-decoration: none;
                        flex: 0 0 auto;
                        cursor: pointer;
                        transition-duration: 0.3s;

                        &:hover{
                            box-shadow: 0 0 10px rgba(63,48,110,.9), 0 0 10px rgba(63,48,110,.9), 0 0 10px rgba(63,48,110,.9);
                        }

                        @media (max-width: 767px){
                            padding: 5px 7px;
                        }

                        img{
                            width: 20px;
                            height: auto;
                        }

                    }
                    .cart{
                        flex: 1 1 auto;
                        text-decoration: unset;
                        font-size: 1rem;
                        white-space: nowrap;
                        display: flex;
                        gap: 10px;
                        justify-content: center;
                        align-items: center;
                        color: #fff;
                        cursor: pointer;
                        border-radius: 3px;
                        background-color: #1ad396;
                        background-image: linear-gradient(to top,#0cbb80 0%,#1ad496 100%);
                        padding: 6px;
                        text-transform: none;
                        width: 100%;
                        transition-duration: 0.3s;

                        &:hover{
                            box-shadow: 0 0 5px rgba(20,203,141,.9), 0 0 5px rgba(20,203,141,.9), 0 0 5px rgba(20,203,141,.9);
                        }

                        @media (max-width: 1024px){
                            gap: 3px;
                        }

                        .cart-text{
                            @media (max-width: 767px){
                                display: none;
                            }
                        }
                    }
                }
            }
        }
    }
}
</style>
