import router from "../../router";
import axios from "axios";

const state = {
    products: [],
    product: null,
}

const getters = {
    products: state => state.products,
    product: state => state.product,
}

const mutations = {
    setProducts(state, products) {
        state.products = products
    },
    setProduct(state, product) {
        state.product = product
    },
}

const actions = {
    getProduct({commit}, id){
        commit('setLoading', true)
        axios.get(`/api/products/${id}`)
            .then( res  => {
                commit('setProduct', res.data.data)
                commit('setLoading', false)
            })
    },
    getProducts({commit}){
        commit('setLoading', true)
        axios.get('/api/products')
            .then( res  => {
                commit('setProducts', res.data.data)
                commit('setLoading', false)
            })
    }
}

export default {
    state, getters, mutations, actions
};
