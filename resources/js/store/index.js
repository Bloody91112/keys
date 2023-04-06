import { createStore } from 'vuex'
import common from './modules/common'
import tag from './modules/tag'
import category from "./modules/category"
import product from "./modules/product";

const store = createStore({
    modules: {
        common,
        tag,
        category,
        product
    }
})

export default store;
