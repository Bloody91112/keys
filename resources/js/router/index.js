import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "index",
            component: () => import("../views/index.vue")
        },
        {
            path: "/account",
            name: "account.index",
            component: () => import("../views/account/index.vue"),
            auth: true,
        },
        {
            path: "/cart",
            name: "cart.index",
            component: () => import("../views/cart/index.vue")
        },
        {
            path: "/payment",
            name: "payment.index",
            component: () => import("../views/payment/index.vue")
        },
        {
            path: "/wishlist",
            name: "wishlist.index",
            component: () => import("../views/wishlist/index.vue")
        },
        {
            path: "/categories/:id",
            name: "categories.item",
            component: () => import("../views/category/item.vue")
        },
        {
            path: "/tags/:id",
            name: "tags.item",
            component: () => import("../views/tag/item.vue")
        },
        {
            path: "/products/:id",
            name: "products.item",
            component: () => import("../views/product/item.vue")
        },
        {
            path: "/auth/login",
            name: "auth.login",
            component: () => import("../views/auth/Login.vue")
        },
        {
            path: "/auth/register",
            name: "auth.register",
            component: () => import("../views/auth/Register.vue")
        },
    ],
});

router.beforeEach(( to, from, next )=> {

    let token = localStorage.getItem('x_xsrf_token')

    /** Authorized user */
    if (token){
        const protectedRoutes = ['auth.login','auth.register']
        if (protectedRoutes.includes(to.name)){
            return next({name: from.name})
        }
    }
    /** Not authorized user */
    else {
        const protectedRoutes = ['account.index', 'payment.index', 'wishlist.index']
        if (protectedRoutes.includes(to.name)){
            return next({name: 'auth.login'})
        }
    }

    next()
})


export default router;
