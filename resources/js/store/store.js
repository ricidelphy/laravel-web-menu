import Vue from 'vue'
import Vuex from 'vuex'
import $axios from '../axios'

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        // auth,
    },
    state: {
        token: localStorage.getItem('token'),
        errors: [],
        produks: [],
        kategoris: [],
        cartProducts: [],
        currentProduct: {},
    },
    getters: {
        isAuth: state => {
            return state.token != "null" && state.token != null
        },
        getProductsInCart: state => state.cartProducts,
        getCurrentProduct: state => state.currentProduct,
    },
    mutations: {
        SET_TOKEN(state, payload) {
            state.token = payload
        },
        SET_ERRORS(state, payload) {
            state.errors = payload
        },
        CLEAR_ERRORS(state) {
            state.errors = []
        },
        ALL_PRODUK(state, payload) {
            state.produks = payload
        },
        ALL_KATEGORI(state, payload) {
            state.kategoris = payload
        },

        ADD_PRODUCT: (state, product) => {
            state.cartProducts.push(product);
        },
        CURRENT_PRODUCT: (state, product) => {
            state.currentProduct = product;
        },
        REMOVE_PRODUCT: (state, index) => {
            state.cartProducts.splice(index, 1);
        },
        RESET_CART: (state, payload) => {
            state.cartProducts = [];
        },
    },
    actions: {
        getProduk({ commit }, payload) {
            return new Promise((resolve, reject) => {
                $axios.get(`/produk?kategori_id=${payload.id}`).then(function(response) {
                    commit('ALL_PRODUK', response.data.data)

                })
            })
        },
        getKategori({ commit }) {
            $axios.get('/kategori').then(function(response) {
                commit('ALL_KATEGORI', response.data.data)

            })
        },

        addProduct: (context, produk) => {
            context.commit('ADD_PRODUCT', produk);
        },
        currentProduct: (context, produk) => {
            context.commit('CURRENT_PRODUCT', produk);
        },
        removeProduct: (context, index) => {
            context.commit('REMOVE_PRODUCT', index);
        },
        reseCart: (context, payload) => {
            context.commit('RESET_CART');
        },
    }
})

export default store