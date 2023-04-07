<template>
    <section v-if="user">
        <div class="user">
            <div class="image">
                <img :src="user.avatar" alt="image">
            </div>
            <div class="info">
                <div class="title">{{ user.name }}</div>
                <ul class="properties">
                    <li class="property">
                        <span class="property-title">Email:</span>
                        <span class="property-value">{{ user.email }}</span>
                    </li>
                    <li class="property">
                        <span class="property-title">Role:</span>
                        <span class="property-value">{{ user.role.title }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
import router from "../../router";

export default {
    name: "index.vue",
    data() {
        return {}
    },
    mounted() {
        this.$store.dispatch('checkAuth')
    },
    computed: {
        user() {
            return this.$store.getters.user
        }
    }
}
</script>

<style lang="scss" scoped>

section {
    margin-top: 30px;

    .user {
        display: flex;
        column-gap: 30px;
        row-gap: 15px;

        @media (max-width: 767px) {
            flex-direction: column;
        }

        .image {
            position: relative;
            flex: 0 0 auto;

            @media (max-width: 767px) {
                align-self: center;
                width: 100%;
            }

            img {

                object-fit: cover;

                @media (max-width: 767px) {
                    width: 100%;
                }
            }
        }
    }

    .info {
        flex: 1 1 auto;

        .title {
            color: #fff;
            font-family: montserrat, sans-serif;
            font-size: 2.4rem;
            font-weight: 400;
            letter-spacing: 1.18px;
            line-height: 1.5;
            margin: 0;
            text-align: left;
            text-shadow: none;
            text-transform: uppercase;

            @media (max-width: 767px) {
                font-size: 1.6rem;
            }
        }

        .properties {
            background-color: #0c0020;
            border: 1px solid #4c4364;
            border-radius: 5px;
            margin-top: 15px;

            .property {
                border-bottom: 1px solid #4c4364;
                align-items: center;
                display: flex;
                padding: 15px;
                font-size: 1.4rem;
                letter-spacing: .05em;
                text-transform: uppercase;

                .property-title {
                    font-weight: 800;
                    flex: 0 0 auto;
                }

                .property-value {
                    flex: 1 1 auto;
                    display: flex;
                    column-gap: 10px;
                    padding-left: 15px;
                }
            }
        }
    }
}

</style>
