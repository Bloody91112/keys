import router from "../../router";
import axios from "axios";

const state = {
    user: null,
    initialized: false,
}

const getters = {
    user: state => state.user,
}

const mutations = {
    setUser(state, user) {
        state.user = user
    },
}

const actions = {
    logout({commit}){
        let token = localStorage.getItem('x_xsrf_token')
        if (token){
            localStorage.removeItem('x_xsrf_token')
        }
        commit('setUser', null)
        router.push({name: 'index'})
    },
    async initializeUser({commit}) {
        let token = localStorage.getItem('x_xsrf_token')
        if (token) {
           let data = await axios.get('/api/user')
           commit('setUser', data.data.data)
           return data.data.data;
        }
        return null
    },
    checkAuth({commit, getters, dispatch }){
        const routeName = router.currentRoute.value.name
        const user = getters.user
        /** on auth routes redirect back if user authenticated */
        if (routeName === 'auth.login' || routeName === 'auth.register'){
            if (user === null){
                dispatch('initializeUser').then(res => {
                    if (res) router.back()
                })

            }
        /** other routes - redirect to login if not authenticated */
        } else if (user === null){
            dispatch('initializeUser').then( res => {
                if (!res) router.push({'name': 'auth.login'})
            })
        }
    }
}

export default {
    state, getters, mutations, actions
};
