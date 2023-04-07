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
        axios.get(`/api/search/${value}`).then( res => {
            commit('setSearchResult', res.data.data)
            console.log(res.data.data)
        })
    },
    toggleCartItem({},{event, id}) {
        let cartItems = JSON.parse(localStorage.getItem('cartItems'));
        let button = event.target.closest('.cart')
        button.classList.toggle('inCart')

        if (!cartItems) {
            localStorage.setItem('cartItems', JSON.stringify([]));
            cartItems = [];
        }
        if (cartItems.includes(id)) {
            cartItems = cartItems.filter(itemId => itemId !== id)
        } else {
            cartItems.push(id)
        }
        const cartItemsCount = cartItems.length
        let cartCounter = document.querySelector('.cart .counter');
        cartCounter.style.display = 'block'
        cartCounter.innerHTML = cartItemsCount

        localStorage.setItem('cartItems', JSON.stringify(cartItems))
    },
    toggleWishlistItem({},{event, id}) {
        let button = event.target.closest('.wishlist')

    }

}

export default {
    state, getters, mutations, actions
};
