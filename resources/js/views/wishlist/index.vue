<template>
    <section v-if="user">
        <TitleComponent title="Your wishlist"/>
        <ProductList :products="user.favoritesItems"/>
    </section>
</template>

<script>
import TitleComponent from "../../components/TitleComponent.vue";
import ProductList from "../../components/ProductList.vue";
export default {
    name: "index.vue",
    components: {ProductList, TitleComponent},
    data() {},
    computed: {
        user() { return this.$store.getters.user },
    }
}
</script>

<style lang="scss" scoped>
section{
    margin-top: 30px;
}
</style>
