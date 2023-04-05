import router from "../../router";
import axios from "axios";

const state = {
    loading: false,
    searchResult: '',
}

const getters = {
    loading: state => state.loading,
    searchResult: state => state.searchResult,
}

const mutations = {
    setLoading(state, loading) {
        state.loading = loading
    },
    setSearchResult(state, searchResult) {
        state.searchResult = searchResult
    },
}

const actions = {
    getSearchResult({commit}, value){
        commit('setLoading', true)
        axios.get(`api/search/${value}`).then( res => {
            commit('setSearchResult', res.data.data)
            commit('setLoading', false)
        })
    }
}

export default {
    state, getters, mutations, actions
};
