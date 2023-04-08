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
    logout({commit}) {
        const token = localStorage.getItem('x_xsrf_token')
        if (token) localStorage.removeItem('x_xsrf_token')
        commit('setUser', null)
        router.push({name: 'index'})
    },
    initializeUser({commit}) {
        const token = localStorage.getItem('x_xsrf_token')
        if (token) {
            commit('setLoading',true)
            axios.get('/api/user').then(res => {
                commit('setUser', res.data.data)
                commit('setLoading',false)
            }).catch(err => {
                localStorage.removeItem('x_xsrf_token')
                commit('setUser', null)
                commit('setLoading',false)
            })
        }
    }
}

export default {
    state, getters, mutations, actions
};
