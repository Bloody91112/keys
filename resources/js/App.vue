<template>

    <div class="page-wrapper">
        <Transition name="fade">
            <PreloaderComponent v-if="loading"/>
        </Transition>
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
import PreloaderComponent from "./components/PreloaderComponent.vue";
export default {
    name: "App",
    computed: {
        loading(){ return this.$store.getters.loading }
    },
    components: {
        PreloaderComponent,
        HeaderComponent,
        FooterComponent
    }
}
</script>

<style lang="scss">

.inCart {
    box-shadow: 0 0 15px rgba(20, 203, 141, .9), 0 0 15px rgba(20, 203, 141, .9), 0 0 15px rgba(20, 203, 141, .9), 0 0 15px rgba(20, 203, 141, .9);
}

ul {
    list-style-type: none;
}

ul, li{
    margin: 0;
    padding: 0;
}

.fade-enter-active{
    transition: opacity 0.2s ease;
}
.fade-leave-active {
    transition: opacity 1s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

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
