<template>
  <header>
    <div class="navbar navbar-dark fixed-top bg-dark">
      <div class="container d-flex justify-content-between">
        <a
          href="#"
          @click="goToHome()"
          class="navbar-brand d-flex align-items-center"
        >
          <strong>Cafee Melati</strong>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarHeader"
          aria-controls="navbarHeader"
          aria-expanded="false"
          aria-label="Toggle navigation"
          @click="goToCart()"
        >
          <b-icon icon="cart4"> </b-icon>

          <b-badge pill variant="success" v-if="hasProduct()">{{
            getProductsInCart.length
          }}</b-badge>
        </button>
      </div>
    </div>
  </header>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  setup() {},

  methods: {
    hasProduct() {
      return this.getProductsInCart.length > 0
    },

    goToCart() {
      this.$router.push('/cart')
    },
    goToHome() {
      this.$router.push('/')
    },
  },

  computed: {
    ...mapGetters(['getProductsInCart']),
  },
}
</script>
