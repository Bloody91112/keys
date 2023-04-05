import router from "../../router";
import axios from "axios";

const state = {
    categories: [],
    category: null,
}

const getters = {
    categories: state => state.categories,
    category: state => state.category,
}

const mutations = {
    setCategories(state, categories) {
        state.categories = categories
    },
    setCategory(state, category) {
        state.category = category
    },
}

const actions = {
    getCategory({commit}, id) {
        axios.get(`/api/categories/${id}`)
            .then(res => {
                commit('setCategory', res.data.data)
            })
    },
    getCategories({commit}) {
        axios.get('/api/categories')
            .then(res => {
                commit('setCategories', res.data.data)
            })
    }
}

export default {
    state, getters, mutations, actions
};
