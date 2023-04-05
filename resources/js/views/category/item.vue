<template>
    <section v-if="category">
        <TitleComponent :title="category.title"/>
        <ProductList :products="category.products"/>
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
            categoryId: null
        }
    },
    computed: {
      category(){ return this.$store.getters.category }
    },
    mounted() {
        const categoryId = this.$route.params.id
        if (categoryId) {
            this.categoryId = categoryId
        }
    },
    watch: {
        $route(to, from) {
            if (to.params.id !== from.params.id) {
                this.categoryId = to.params.id
            }
        },
        categoryId(to, from) {
            if (to !== from) {
                this.$store.dispatch('getCategory', to)
            }
        }
    }
}
</script>

<style lang="scss" scoped>
section{
    margin-top: 30px;
}
</style>
