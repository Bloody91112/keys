<template>
    <div class="tag">
        <TitleComponent :route-data="{ name: 'tags.item', params: { id: tagData.id } }" :title="tagData.title"/>
        <ProductList :products="tagData.products"/>
    </div>
</template>

<script>
import ProductList from "./ProductList.vue";
import TitleComponent from "./TitleComponent.vue";
export default {
    components: {TitleComponent, ProductList},
    props: {
        tagData: {
            type: Object,
            default: null,
        }
    },
    name: "TagProductsComponent"
}
</script>

<style lang="scss" scoped>
.tag{
    margin: 50px 0;
    position: relative;
    @media (max-width: 767px) {
        padding-top: 8px;
        margin: 15px 0;
    }
}
</style>
