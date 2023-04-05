<template>
    <div class="page-wrapper">
        <div class="content">
            <HeaderComponent/>
        </div>
        <div class="content">
            <RouterView/>
        </div>
        <FooterComponent/>
    </div>
</template>

<script>
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";
export default {
    name: "App",
    components: {
        HeaderComponent,
        FooterComponent
    }
}
</script>

<style lang="scss">

.page-wrapper{
    background-color: #1f143d;
    color: #eee;
    font-family: montserrat,sans-serif;
    line-height: 1.5;
    font-size: 1.6rem;
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    overflow: hidden;

    @media (max-width: 768px) {
        font-size: 1.4rem

    }

    .content{
        margin-left: auto;
        margin-right: auto;
        max-width: 1286px;
        padding-left: 15px;
        padding-right: 15px;
        width: 100%;
    }


}
</style>
