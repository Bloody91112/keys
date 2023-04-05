<template>
    <div class="title">
        <RouterLink v-if="routeData" :to="routeData">
            <strong>{{ title }}</strong>
        </RouterLink>
        <strong v-else>{{ title }}</strong>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: null,
        },
        routeData: {
            type: Object,
            default: null,
        }
    },
    name: "TitleComponent"
}
</script>

<style lang="scss" scoped>
.title{
    font-size: 2.5rem;
    color: #fff;
    font-family: quantico,sans-serif;
    letter-spacing: .05em;
    position: relative;
    text-transform: uppercase;
    text-shadow: 0 0 9px rgba(255,255,255,.7);

    @media (max-width: 767px) {
        font-size: 1.8rem;
    }

    a {
        text-decoration: unset;
        color: white;
        transition: text-shadow .3s;

        &:hover {
            text-decoration: none;
            text-shadow: 0 0 20px rgba(37,146,238,.9), 0 0 20px rgba(37,146,238,.9), 0 0 20px rgba(37,146,238,.9);
        }

    }

    &:before{
        background-color: rgba(255,255,255,.5);
        box-shadow: 0 0 9px rgba(255,255,255,.7);
        content: '';
        position: absolute;
        height: 1px;
        left: 100px;
        right: 0;
        top: 50%;
        z-index: 0;
    }

    strong {
        background-color: #1f143d;
        border: 1px solid rgba(255,255,255,.5);
        box-shadow: 0 0 9px rgba(255,255,255,.7), inset 0 0 9px rgba(255,255,255,.7);
        display: inline-block;
        font-weight: 400;
        padding: 6px 16px;
        position: relative;
        vertical-align: top;
        z-index: 1;
    }
}
</style>
