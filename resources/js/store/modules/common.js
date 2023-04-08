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
    toggleWishlistItem({getters,dispatch},{event, id}) {
        let button = event.target.closest('.wishlist')

        const token = localStorage.getItem('x_xsrf_token')
        if (token){
            button.style.pointerEvents = 'none'
            let searchResult = {
                status: false,
                itemId: null
            };

            getters.user.favorites.forEach( favorite => {
                if (favorite.product.id === id) {
                    searchResult.status = true;
                    searchResult.itemId = favorite.id;
                }
            })

            if (searchResult.status){
                axios.delete(`/api/favorites/${searchResult.itemId}`).then( res => {
                    const item = res.data.data
                    button.classList.remove('inWishlist')
                    button.style.pointerEvents = 'unset'
                    dispatch('initializeUser')
                })
            } else {
                axios.post('/api/favorites', { product_id: id }).then( res => {
                    const item = res.data.data
                    button.classList.add('inWishlist')
                    button.style.pointerEvents = 'unset'
                    dispatch('initializeUser')
                })
            }

        } else {
            router.push({name: 'auth.login'})
        }


    }
}

export default {
    state, getters, mutations, actions
};
