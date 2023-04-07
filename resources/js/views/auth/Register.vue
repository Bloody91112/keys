<template>
    <section>
        <h1>create new customer account</h1>
        <div class="register">
            <div class="title">information</div>
            <form @submit="false" class="inputs">
                <div class="input-container">
                    <div class="label">Name</div>
                    <input id="name" v-model="name" type="text" name="name">
                </div>
                <div class="input-container">
                    <div class="label">Email</div>
                    <input id="email" v-model="email" type="email" name="email">
                </div>
                <div class="input-container">
                    <div class="label">Confirm</div>
                    <input id="password" v-model="password" type="password" name="password">
                </div>
                <div class="input-container">
                    <div class="label">Confirm password</div>
                    <input id="password-confirm" v-model="password_confirmation" type="password"
                           name="password_confirmation">
                </div>
            </form>
        </div>
        <button @click.prevent="register" class="submit">Create an account</button>
    </section>
</template>

<script>
import router from "../../router";
export default {
    name: "Register",
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },
    methods: {
        register() {

            axios.get('/sanctum/csrf-cookie').then(() => {
                axios.post('/api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                }).then((data) => {
                    localStorage.setItem('x_xsrf_token', data.config.headers['X-XSRF-TOKEN'])
                    this.$store.dispatch('initializeUser')
                    router.push({name: 'index'})
                }).catch(error => {
                    console.log(error)
                })

            })
        },
    }
}
</script>

<style lang="scss" scoped>
section{
    h1{
        font-size: 2.6rem;
        font-family: quantico,sans-serif;
        font-weight: 400;
        letter-spacing: .05em;
        line-height: 1.2;
        margin: 1.5em 0;
        text-align: center;
        text-shadow: 0 0 12px rgba(100,162,235,.36), 0 0 12px rgba(100,162,235,.36), 0 0 12px rgba(100,162,235,.36);
        text-transform: uppercase;
    }

    .register{
        background-color: #0c0020;
        border-color: #0c0020;
        padding: 0 48px 48px;
        margin-bottom: 30px;

        .title{
            transform: translateY(-50%);
            font-size: 1.6rem;
            padding: 4px 16px;
            display: inline-block;
            letter-spacing: .06em;
            text-transform: uppercase;
            font-family: quantico,sans-serif;
            font-weight: 400;
            background-color: rgba(56,111,187,.7);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.27), 0 0 12px 1px rgba(37,146,238,.8);
            text-shadow: 0 0 9px #4eb0f0, 0 0 9px #4eb0f0, 0 0 9px #4eb0f0, 0 0 9px #4eb0f0;
        }

        .inputs{
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;

            .input-container{
                padding: 15px;
                width: 48%;

                @media (max-width: 1024px) {
                    width: 100%;
                }

                .label{
                    pointer-events: none;
                    position: relative;
                    transition: all .25s ease-in-out;
                    z-index: 1;
                    font-size: 1.2rem;
                    line-height: 2;
                    top: 0;
                    color: #6e6d93;
                    font-family: quantico,sans-serif;
                    letter-spacing: .05em;
                    text-transform: uppercase;
                }
                input{
                    width: 100%;
                    background-color: transparent;
                    background-position: right 10px center;
                    border-radius: 100px;
                    color: #fff;
                    font-family: quantico,sans-serif;
                    letter-spacing: .05em;
                    padding: 7px 35px 7px 20px;
                    transition: border-color .3s;
                    height: auto;
                    border: 1px solid #e8e6ed;
                    font-size: 1.3rem;
                }
            }
        }
    }

    .submit{
        margin-bottom: 30px;
        float: right;
        background-color: #20c293;
        animation: button-hover .3s linear forwards;
        color: #fff;
        outline: none;
        text-decoration: none;
        font-size: 1.2rem;
        align-items: center;
        background-position: 50% 100%;
        background-size: 100% 200%;
        border: 1px solid #1979c3;
        border-radius: 20px;
        cursor: pointer;
        display: inline-flex;
        justify-content: center;
        letter-spacing: .05em;
        line-height: 1;
        padding: 0.5em 1em;
        text-align: center;
        text-transform: uppercase;
        transition: all .3s;
    }
}
</style>
