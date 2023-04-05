<template>
    <section>
        <template v-if="tags">
            <TagProductsComponent v-for="tag in tags" :key="tag.id" :tag-data="tag" />
        </template>
    </section>
</template>

<script>
import TagProductsComponent from "../components/TagProductsComponent.vue";
export default {
    name: "index",
    components: {TagProductsComponent},
    mounted() {
        this.$store.dispatch('getTags')
    },
    computed: {
        tags() { return this.$store.getters.tags }
    }
}
</script>

<style scoped>

</style>
