<template>
    <section v-if="tag">
        <TitleComponent :title="tag.title"/>
        <ProductList :products="tag.products"/>
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
            tagId: null
        }
    },
    computed: {
        tag(){ return this.$store.getters.tag }
    },
    mounted() {
        const tagId = this.$route.params.id
        if (tagId) {
            this.tagId = tagId
        }
    },
    watch: {
        $route(to, from) {
            if (to.params.id !== from.params.id) {
                this.tagId = to.params.id
            }
        },
        tagId(to, from) {
            if (to !== from) {
                this.$store.dispatch('getTag', to)
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

