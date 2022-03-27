<template>
  <div>
    <section style="background-color: #eee">
      <div class="card shadow-0 border rounded-3">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
              <div class="bg-image hover-zoom ripple rounded ripple-surface">
                <img
                  :src="'/storage/produk/' + selected.gambar"
                  class="w-100"
                />
                <a href="#!">
                  <div class="hover-overlay">
                    <div
                      class="mask"
                      style="background-color: rgba(253, 253, 253, 0.15)"
                    ></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
              <h5>{{ selected.nama_produk }}</h5>
              <div class="d-flex flex-row">
                <i
                  :class="
                    selected.favorit === 1
                      ? 'bi bi-heart-fill pt-2 px-2'
                      : 'bi bi-heart pt-2 px-2'
                  "
                  style="font-size: 24px; color: red"
                ></i>
              </div>

              <p class="text-truncate mb-4 mb-md-0">
                {{ selected.deskripsi }}
              </p>
            </div>
            <div
              class="
                col-md-6 col-lg-3 col-xl-3
                border-sm-start-none border-start
              "
            >
              <div class="d-flex flex-row align-items-center mb-1">
                <h4 class="mb-1 me-1">{{ selected.harga | currency }}</h4>
              </div>

              <div class="d-flex flex-column mt-4">
                <button
                  class="btn btn-outline-primary btn-sm mt-2"
                  type="button"
                  @click="addProductToCart(selected)"
                >
                  Order
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { BFormSpinbutton } from 'bootstrap-vue'
import { mapActions } from 'vuex'

export default {
  components: {
    BFormSpinbutton,
  },
  data: () => ({
    defaultValue: 1,
    cartProducts: [],
  }),

  props: {
    selected: {
      type: Object,
      default: null,
    },
  },

  created() {
    this.selected
  },

  methods: {
    ...mapActions(['addProduct', 'currentProduct']),
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
}
</script>
