<template>
  <div class="container">
    <vue-element-loading :active="showloader" spinner="bar-fade-scale" />
    <div class="row">
      <div class="col-md-6 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Order</span>
          <span class="badge badge-success badge-pill">{{
            getProductsInCart.length
          }}</span>
        </h4>
        <ul class="list-group mb-3">
          <li
            class="list-group-item d-flex justify-content-between lh-condensed"
            v-for="(produk, index) in getProductsInCart"
            :key="index"
          >
            <div>
              <h6 class="my-0">{{ produk.nama_produk }}</h6>
              <small class="text-muted">{{ produk.deskripsi }}</small>
            </div>
            <span class="text-muted">{{ produk.harga | currency }}</span>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total</span>
            <strong>{{ totalPrice() | currency }}</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-6 order-md-1">
        <form class="needs-validation">
          <div class="mb-3">
            <label for="firstName">Nama Anda</label>
            <input
              type="text"
              class="form-control"
              id="firstName"
              placeholder=""
              v-model="form.nama_customer"
              value=""
              required
            />
            <div class="invalid-feedback">Valid first name is required.</div>
          </div>

          <div class="mb-3">
            <label for="email"
              >Email <span class="text-muted">(Optional)</span></label
            >
            <input
              type="email"
              class="form-control"
              id="email"
              v-model="form.email"
              placeholder="email@example.com"
            />
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Nomor HP</label>
            <input
              type="text"
              class="form-control"
              id="address"
              v-model="form.nomor_hp"
              placeholder="08xxxxxxxxx"
              required
            />
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <div class="mb-3">
            <label for="address">Jenis Pelanggan</label>
            <v-select
              @input="getMeja"
              label="text"
              name="id"
              v-model="customer_type"
              :options="options_type_customer"
              input-id="text"
            >
              <span slot="no-options">Tidak Ada Data !</span>
            </v-select>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label for="country">Area</label>
              <v-select
                @input="getMeja"
                label="nama_area"
                name="id"
                v-model="area_caffee"
                :options="areas"
                input-id="id"
              >
                <span slot="no-options">Tidak Ada Data !</span>
              </v-select>
              <div class="invalid-feedback">Please select a valid country.</div>
            </div>
            <div class="col-md-6 mb-4">
              <label for="state">Nomor Meja</label>
              <v-select
                label="nomor_meja"
                name="id"
                v-model="nomor_meja"
                :options="mejas"
                input-id="id"
              >
                <span slot="no-options">Tidak Ada Data !</span>
              </v-select>
              <div class="invalid-feedback">Please provide a valid state.</div>
            </div>
          </div>
          <hr class="mb-4" />

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <b-form-radio-group
                :options="options_payment"
                inline
                v-model="jenis_pembayaran"
                name="jenis-permohonan"
              />
            </div>
          </div>
          <div v-if="jenis_pembayaran === 'Non Tunai'">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nama Bank</label>
                <input
                  type="text"
                  class="form-control"
                  id="cc-name"
                  placeholder=""
                  v-model="form.nama_bank"
                />
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">Name on card is required</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Nomor Kartu Debit</label>
                <input
                  type="text"
                  class="form-control"
                  id="cc-number"
                  placeholder=""
                  required
                />
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input
                  type="text"
                  class="form-control"
                  id="cc-expiration"
                  placeholder=""
                  v-model="form.expiration"
                />
                <div class="invalid-feedback">Expiration date required</div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input
                  type="text"
                  class="form-control"
                  id="cc-cvv"
                  placeholder=""
                  v-model="form.cvv"
                />
                <div class="invalid-feedback">Security code required</div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <hr class="mb-4" />
    <button
      class="btn btn-primary btn-lg btn-block"
      type="submit"
      @click="submitOrder"
    >
      BAYAR
    </button>
  </div>
</template>


<script>
import vSelect from 'vue-select'
import { BModal, VBModal, BFormRadioGroup } from 'bootstrap-vue'
import VueElementLoading from 'vue-element-loading'
import { mapActions, mapState, mapGetters } from 'vuex'
import $axios from '../axios'
import DetailModal from './Detail.vue'
export default {
  components: {
    VueElementLoading,
    DetailModal,
    BModal,
    VBModal,
    vSelect,
    BFormRadioGroup,
  },
  data: () => ({
    produks: [],
    idKategori: '',
    search: '',
    showloader: false,
    detailModal: false,
    data_selected: null,

    form: {
      nama_customer: '',
      email: '',
      nomor_hp: '',
      nama_bank: '',
      nomor_kartu: '',
      expiration: '',
      cvv: '',
    },
    area_caffee: '',
    nomor_meja: '',
    customer_type: '',
    mejas: [],
    areas: [],
    totalOrder: '',

    jenis_pembayaran: '',
    showloader: false,
    options_payment: [
      { text: 'Tunai', value: 'Tunai' },
      { text: 'Non Tunai', value: 'Non Tunai' },
    ],
    options_type_customer: [
      { text: 'Sendiri', value: 'Sendiri' },
      { text: 'Couple', value: 'Couple' },
      { text: 'Keluarga', value: 'Keluarga' },
      { text: 'Grup/Komunitas', value: 'Grup/Komunitas' },
    ],
  }),

  created() {
    this.getArea()
  },
  methods: {
    // ...mapActions(['getProduk']),
    ...mapActions(['getArea', 'currentProduct, getProductsInCart', 'reseCart']),

    getArea() {
      //   this.showloader = true
      $axios.get('/area').then((response) => {
        //   this.showloader = false
        this.areas = response.data.data
      })
    },
    getMeja() {
      //   this.showloader = true
      this.mejas = []
      this.nomor_meja = ''
      $axios
        .get('/meja?', {
          params: {
            area_id: this.area_caffee.id,
          },
        })
        .then((response) => {
          //   this.showloader = false
          this.mejas = response.data.data
        })
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

    getResetCart() {
      this.reseCart()
    },
    submitOrder() {
      this.showloader = true
      $axios
        .post('/order', {
          nama_customer: this.form.nama_customer,
          email: this.form.email,
          nomor_hp: this.form.nomor_hp,
          nama_bank: this.form.nama_bank,
          nomor_kartu: this.form.nomor_kartu,
          expiration: this.form.expiration,
          cvv: this.form.cvv,
          area_id: this.area_caffee.id,
          meja_id: this.nomor_meja.id,
          type: this.customer_type.text,
          jenis_pembayaran: this.jenis_pembayaran,
          produk: JSON.stringify(this.getProductsInCart),
          total: this.getProductsInCart.reduce(
            (current, next) => current + next.harga,
            0
          ),
        })
        .then((response) => {
          this.showloader = false
          if (response.data.success === true) {
            this.$swal({
              title: `Terimakasih`,
              icon: 'success',
              variant: 'success',
              title: `Pembayaran Berhasil`,
              showConfirmButton: false,
              timer: 2000,
              width: 400,
            })

            setTimeout(
              () => {
                this.$router.push('/')
                this.getResetCart()
              },

              2000
            )
          } else {
            this.$swal({
              title: `Gagal`,
              icon: 'warning',
              variant: 'warning',
              title: `Proses Pembayaran gagal...`,
              showConfirmButton: false,
              timer: 1500,
              width: 400,
            })
          }
        })
    },
  },

  computed: {
    ...mapGetters(['getProductsInCart']),
  },
}
</script>
<style lang="scss">
@import 'vue-select/dist/vue-select.css';
</style>

