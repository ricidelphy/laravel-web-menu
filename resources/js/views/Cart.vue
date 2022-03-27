<template>
  <div class="container">
    <div class="py-2 text-center">
      <h2>CART</h2>
      <p class="lead" v-if="!hasProduct()">
        Tidak ada Produk yang ditambahkan !
      </p>
      <button
        class="btn btn-outline-primary mt-2"
        v-if="!hasProduct()"
        type="button"
        @click="goToHome()"
      >
        <b-icon icon="shop"></b-icon> Beranda
      </button>
    </div>

    <div class="container mt-1 mb-5">
      <div class="d-flex justify-content-center row">
        <div
          class="col-md-10 pt-2"
          v-for="(produk, index) in getProductsInCart"
          :key="index"
        >
          <div class="row p-2 bg-white border rounded">
            <div class="col-md-3 mt-1">
              <img
                class="img-fluid img-responsive rounded product-image"
                :src="'/storage/produk/' + produk.gambar"
                alt=""
                width="100"
              />
            </div>
            <div class="col-md-6 mt-1">
              <h5>{{ produk.nama_produk }}</h5>

              <p class="text-justify text-truncate para mb-0">
                {{ produk.deskripsi }}
              </p>
            </div>
            <div
              class="
                align-items-center align-content-center
                col-md-3
                border-left
                mt-1
              "
            >
              <div class="d-flex flex-row align-items-right">
                <h4 class="mr-1">{{ produk.harga | currency }}</h4>
              </div>
              <div class="d-flex flex-column mt-2">
                <button
                  class="btn btn-outline-danger btn-sm mt-2"
                  type="button"
                  @click="remove(index)"
                >
                  <b-icon icon="trash"></b-icon>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10 pt-2" v-if="hasProduct()">
          <div class="d-flex justify-content-end mt-5">
            <h4 class="mr-1">Total: {{ totalPrice() | currency }}</h4>
          </div>
          <div class="text-center">
            <b-button-group>
              <button
                class="btn btn-outline-primary mt-2"
                type="button"
                @click="goToHome()"
              >
                <b-icon icon="shop"></b-icon> Beranda
              </button>
              <button
                class="btn btn-outline-success mt-2"
                type="button"
                @click="opencheckOutModal()"
              >
                <b-icon icon="check2"></b-icon> Checkout
              </button>
            </b-button-group>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Detail -->
    <b-modal
      id="modal-disposisi"
      v-model="checkOutModal"
      ref="checkout-modal"
      title="Checkout"
      size="lg"
      :hide-footer="true"
    >
      <checkout-modal ref="detailForm" :selected="data_selected" />
    </b-modal>
    <!-- Modal Detail -->
  </div>
</template>


<script>
import { BModal, VBModal, BButtonGroup } from 'bootstrap-vue'
import VueElementLoading from 'vue-element-loading'
import { mapActions, mapState, mapGetters } from 'vuex'
import $axios from '../axios'
import CheckoutModal from './Checkout.vue'
export default {
  components: {
    VueElementLoading,
    CheckoutModal,
    BModal,
    VBModal,
    BButtonGroup,
  },
  data() {
    return {
      produks: [],
      idKategori: '',
      search: '',
      showloader: false,
      checkOutModal: false,
      data_selected: null,
    }
  },
  directives: {
    'b-modal': VBModal,
  },

  created() {},
  methods: {
    // ...mapActions(['getProduk']),
    ...mapActions([
      'getKategori',
      'currentProduct, getProductsInCart',
      'removeProduct',
    ]),

    filterProduk(id) {
      this.showloader = true
      $axios
        .get('/produk?', {
          params: {
            search: id,
          },
        })
        .then((response) => {
          this.showloader = false
          this.produks = response.data
        })
    },

    opencheckOutModal(data) {
      this.data_selected = data
      this.checkOutModal = true
    },

    addProductToCart(produk) {
      this.addProduct(produk)

      this.$swal({
        position: 'top-right',
        title: `Berhasil`,
        icon: 'success',
        variant: 'success',
        title: `Ditambahkan...`,
        showConfirmButton: false,
        timer: 1500,
        width: 400,
      })
    },
    addCurrentProduct(produk) {
      this.currentProduct(produk)
    },
    hasProduct() {
      return this.getProductsInCart.length > 0
    },
    totalPrice() {
      return this.getProductsInCart.reduce(
        (current, next) => current + next.harga,
        0
      )
    },
    remove(index) {
      this.removeProduct(index)
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
