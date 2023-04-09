import router from "../../router";
import axios from "axios";

const state = {
    payment: null,
}

const getters = {
    payment: state => state.payment,
}

const mutations = {
    setPayment(state, payment) {
        state.payment = payment
    },
}

const actions = {
    makePayment({commit}, ids){
        commit('setLoading', true)
        axios.post('/api/payments', { ids })
            .then( res => {
                console.log(res)
                commit('setLoading', false)
                router.push({ name: 'index' })
                localStorage.setItem('cartItems', JSON.stringify([]));
                commit('setCartProducts', null)
        })
    }
}

export default {
    state, getters, mutations, actions
};
