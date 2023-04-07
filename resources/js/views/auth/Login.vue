<template>
    <section>
        <div class="login-block">
            <div class="title">Login</div>
            <div class="description">Already Registered? Please Login From Here.</div>
            <form @submit="false" class="inputs">
                <div class="input-container">
                    <div class="label">email address*</div>
                    <input id="email" v-model="email" type="email" name="email">
                </div>
                <div class="input-container">
                    <div class="label">password*</div>
                    <input v-model="password" id="password" type="password" name="password">
                </div>
            </form>
            <button @click="login" class="submit">Login</button>
        </div>
        <div class="login-block">
            <div class="title">Register</div>
            <div class="description">SIMPLY CLICK THE REGISTER BUTTON AND FILL OUT THE FORM TO BECOME PART OF A HUGE ONLINE COMMUNITY.</div>
            <RouterLink :to="{ name: 'auth.register'}" class="submit">Register</RouterLink>
        </div>
    </section>
</template>

<script>
import router from "../../router";
export default {
    name: "Login",
    data(){
        return {
            email: null,
            password: null,
        }
    },
    beforeCreate() {
        this.$store.dispatch('checkAuth')
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie')
                .then(() => {
                    axios.post('/api/login', {email: this.email, password: this.password})
                        .then((data) => {
                            localStorage.setItem('x_xsrf_token', data.config.headers['X-XSRF-TOKEN'])
                            this.$store.dispatch('initializeUser')
                            router.push({name: 'index'})
                        })
                        .catch((error) => {
                            this.commonError = error.response.data.message
                        })
                });
        },
    }
}
</script>

<style lang="scss" scoped>
section{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-top: 75px;
    margin-bottom: 15px;

    @media (max-width: 767px) {
        flex-direction: column;
        align-items: center;
        row-gap: 50px;
    }

    .login-block{
        flex: 0 1 48.5%;
        max-width: 48.5%;
        position: relative;
        padding: 0 32px 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        background-color: #0c0020;

        @media (max-width: 767px) {
            max-width: 100%;
            min-width: 100%;
        }

        .title{
            display: inline-block;
            padding: 4px 16px;
            font-family: quantico,sans-serif;
            font-weight: 400;
            transform: translateY(-50%);
            font-size: 1.8rem;
            letter-spacing: .06em;
            text-align: center;
            text-transform: uppercase;
            background-color: rgba(56,111,187,.7);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.27), 0 0 12px 1px rgba(37,146,238,.8);
            text-shadow: 0 0 9px #4eb0f0, 0 0 9px #4eb0f0, 0 0 9px #4eb0f0, 0 0 9px #4eb0f0;
        }

        .description{
            font-size: 1.2rem;
            flex-basis: 100%;
            letter-spacing: .05em;
            line-height: 1.7142857143;
            max-width: 390px;
            text-align: center;
            text-transform: capitalize;
        }

        .inputs{
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 30px;

            @media (max-width: 767px) {
                flex-direction: column;
            }

            .input-container{
                .label{
                    font-size: 0.9rem;
                    pointer-events: none;
                    position: relative;
                    transition: all .25s ease-in-out;
                    z-index: 1;
                    line-height: 2;
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
                    font-size: 1.2rem;
                    border: 1px solid #5f5e7e;
                }
            }
        }

        .submit{
            margin-top: 20px;
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
}
</style>
