import router from "../../router";
import axios from "axios";

const state = {
    cartProducts: [],
}

const getters = {
    cartProducts: state => state.cartProducts,
}

const mutations = {
    setCartProducts(state, cartProducts) {
        state.cartProducts = cartProducts
    },
}

const actions = {
    getCartProducts({commit}){
        const productsIds = JSON.parse(localStorage.getItem('cartItems'))
        commit('setLoading', true)
        if (productsIds.length === 0) {
            commit('setCartProducts', [])
            commit('setLoading', false)
        } else {
            axios.post('/api/search/products', { productsIds: productsIds })
                .then( res  => {
                    commit('setCartProducts', res.data.data)
                    commit('setLoading', false)
                })
        }
    },
}

export default {
    state, getters, mutations, actions
};
