<template>
    <div v-if="products.length > 0" class="products">
        <ProductCard v-for="product in products" :key="product.id" :product="product"/>
    </div>
    <div v-else class="no-items">
        No items, see something else :)
    </div>
</template>

<script>
import ProductCard from "./ProductCard.vue";

export default {
    components: {ProductCard},
    props: {
        products: {
            type: Array,
            default: null
        }
    },
    name: "ProductList"
}
</script>

<style lang="scss" scoped>
.products {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    column-gap: 2.5%;
    row-gap: 10px;

    @media (max-width: 767px) {
        margin-top: 15px;
        column-gap: 3%;
    }
}

.no-items {
    text-align: center;
    margin: 30px 0;
    font-family: quantico,sans-serif;
    font-size: 1.8rem;
    font-weight: 300;

    @media (max-width: 767px) {
        font-size: 1.2rem;
    }
}
</style>
