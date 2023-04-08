import { createStore } from 'vuex'
import common from './modules/common'
import tag from './modules/tag'
import category from "./modules/category"
import product from "./modules/product"
import user from "./modules/user";
import cart from "./modules/cart";

const store = createStore({
    modules: {
        common,
        tag,
        category,
        product,
        user,
        cart
    }
})

export default store;
