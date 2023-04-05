import { createStore } from 'vuex'
import common from './modules/common'
import tag from './modules/tag'
import category from "./modules/category";

const store = createStore({
    modules: {
        common,
        tag,
        category
    }
})

export default store;
