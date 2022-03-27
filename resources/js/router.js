import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Index.vue'
import Cart from './views/Cart.vue'
import store from './store/store'
Vue.use(Router)

const router = new Router({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'home',
            component: Home,

        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart,

        }
    ]
});

router.beforeEach((to, from, next) => {
    // store.commit('CLEAR_ERRORS')
    if (to.matched.some(record => record.meta.requiresAuth)) {
        let auth = store.getters.isAuth
        if (!auth) {
            next({ name: 'login' })
        } else {
            next()
        }
    } else {
        next()
    }
})

export default router