<template>
    <footer>
        <a target="_blank" href="https://github.com/Bloody91112/keys">Github</a>
    </footer>
</template>

<script>
export default {
    name: "HeaderComponent"
}
</script>

<style lang="scss" scoped>
footer{
    background: #0c0020;
    margin-top: auto;
    padding: 25px 0;
    text-align: center;

    a{
        color: white;
        font-weight: bold;
        text-decoration: none;
        transition-duration: 0.3s;

        &:hover{
            text-shadow: 0 0 9px rgba(37, 146, 238, .9), 0 0 9px rgba(37, 146, 238, .9), 0 0 9px rgba(37, 146, 238, .9);

        }
    }
}
</style>
