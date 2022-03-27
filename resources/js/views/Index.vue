<template>
  <div>
    <section class="jumbotron text-center">
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="#" @click="filterProduk()">Semua</a>
        </li>
        <div v-for="(kategori, index) in kategoris" :key="index">
          <li class="nav-item">
            <a class="nav-link" href="#" @click="filterProduk(kategori.id)">{{
              kategori.nama_kategori
            }}</a>
          </li>
        </div>
      </ul>
    </section>

    <section>
      <div class="container py-5">
        <vue-element-loading :active="showloader" spinner="bar-fade-scale" />
        <div class="row">
          <div
            class="col-md-3 col-lg-3 mb-5 mb-md-0 py-2"
            v-for="(produk, index) in produks"
            :key="index"
          >
            <div class="card product-wrapper">
              <div class="product-img">
                <a href="#" data-abc="true">
                  <img
                    :src="'/storage/produk/' + produk.gambar"
                    alt=""
                    height="260"
                    width="260"
                  />
                </a>
                <span class="text-center">
                  <div style="font-size: 2rem">
                    <b-icon
                      :icon="produk.favorit === 1 ? 'heart-fill' : 'heart'"
                      :variant="produk.favorit === 1 ? 'danger' : 'light'"
                    ></b-icon>
                  </div>
                </span>
                <div class="product-action"></div>
              </div>

              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small">
                    <a href="#!" class="text-muted">{{
                      produk.kategori.nama_kategori
                    }}</a>
                  </p>
                  <p class="small text-danger">{{ produk.harga | currency }}</p>
                </div>

                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">{{ produk.nama_produk }}</h5>
                </div>

                <div class="d-flex justify-content-between mb-2">
                  <p class="text-muted mb-0">
                    {{ produk.deskripsi }}
                  </p>
                  <div class="ms-auto text-warning">
                    <i class="fa fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                  </div>
                </div>

                <div class="btn-group d-flex justify-content-center pt-2">
                  <b-button-group>
                    <button
                      class="btn btn-success"
                      type="button"
                      @click="addProductToCart(produk)"
                    >
                      <b-icon icon="cart-plus"></b-icon>
                    </button>
                    <button
                      class="btn btn-outline-primary"
                      type="button"
                      @click="openDetailModal(produk)"
                    >
                      <b-icon icon="eye"></b-icon>
                    </button>
                  </b-button-group>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal Detail -->
    <b-modal
      id="modal-disposisi"
      v-model="detailModal"
      ref="detail-modal"
      title="Detail"
      size="lg"
      :hide-footer="true"
      hide-backdrop
    >
      <detail-modal ref="detailForm" :selected="data_selected" />
    </b-modal>
    <!-- Modal Detail -->
    <b-modal
      id="modal-disposisi"
      v-model="detailModal"
      ref="detail-modal"
      title="Detail"
      size="lg"
      :hide-footer="true"
      hide-backdrop
    >
      <detail-modal ref="detailForm" :selected="data_selected" />
    </b-modal>
  </div>
</template>

<script>
import { BModal, VBModal, BButtonGroup } from 'bootstrap-vue'
import VueElementLoading from 'vue-element-loading'
import { mapActions, mapState } from 'vuex'
import $axios from '../axios'
import DetailModal from './Detail.vue'
export default {
  components: {
    VueElementLoading,
    DetailModal,
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
      detailModal: false,
      data_selected: null,
    }
  },
  directives: {
    'b-modal': VBModal,
  },

  created() {
    this.filterProduk()
    this.getKategori()
  },
  methods: {
    // ...mapActions(['getProduk']),
    ...mapActions(['getKategori', 'addProduct', 'currentProduct']),

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

    openDetailModal(data) {
      this.data_selected = data
      this.detailModal = true
    },

    addProductToCart(produk) {
      this.addProduct(produk)

      this.$swal({
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
  },

  computed: {
    ...mapState({
      // produks: (state) => state.produks,
      kategoris: (state) => state.kategoris,
    }),
  },
}
</script>

<style scoped>
.product-wrapper,
.product-img {
  overflow: hidden;
  position: relative;
}

.product-img > span {
  color: #333;
  display: inline-block;
  font-size: 12px;
  font-weight: 500;
  left: 10px;
  letter-spacing: 1px;
  padding: 3px 0px;
  position: absolute;
  text-align: center;
  text-transform: uppercase;
  top: 10px;
}
</style>