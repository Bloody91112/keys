import router from "../../router";
import axios from "axios";

const state = {
    tags: [],
    tag: null,
}

const getters = {
    tags: state => state.tags,
    tag: state => state.tag,
}

const mutations = {
    setTags(state, tags) {
        state.tags = tags
    },
    setTag(state, tag) {
        state.tag = tag
    },
}

const actions = {
    getTag({commit}, id){
        commit('setLoading', true)
        axios.get(`/api/tags/${id}`)
            .then( res  => {
                commit('setTag', res.data.data)
                commit('setLoading', false)
            })
    },
    getTags({commit}){
        commit('setLoading', true)
        axios.get('/api/tags')
            .then( res  => {
                commit('setTags', res.data.data)
                commit('setLoading', false)
            })
    }
}

export default {
    state, getters, mutations, actions
};
