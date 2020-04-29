if(document.querySelector('#clientLabelstickerController')) {
  Vue.component('client-labelsticker', {
    template: '#client-labelsticker-template',
    data() {
      return {
        form: {
          width: '',
          height: '',
          material_id: '',
          orderquantity_id: '',
          shape_id: '',
          delivery_fee: '',
          delivery_id: '',
          total: 0.00
        },
        formsetup: {
          max_width: '',
          max_height: ''
        },
        materials: [],
        orderquantities: [],
        shapes: [],
        deliveries: [],
        formErrors: {},
      }
    },
    mounted() {
      this.getAllMaterials()
      this.getAllOrderquantities()
      this.getAllShapes()
      this.getAllDeliveries()
    },
    methods: {
      materialIdSelected() {
        this.formsetup.max_width = 305
        this.formsetup.max_height = 455
        this.getQuotation()
      },
      getAllMaterials() {
        axios.get('/api/materials/product/1').then((response) => {
          this.materials = response.data
        })
      },
      getAllOrderquantities() {
        axios.get('/api/orderquantities/all').then((response) => {
          this.orderquantities = response.data
        })
      },
      getAllShapes() {
        axios.get('/api/shapes/product/1').then((response) => {
          this.shapes = response.data
        })
      },
      getAllDeliveries() {
        axios.get('/api/deliveries/product/1').then((response) => {
          this.deliveries = response.data
        })
      },
      getQuotation: _.debounce(function(e) {
        this.formErrors = {}
        axios.post('/api/labelsticker/quotation', this.form).then((response) => {
          this.form.total = response.data
        })
        .catch((error) => {
          this.formErrors = error.response.data.errors
        });
      }, 500)
    }
  });

  new Vue({
    el: '#clientLabelstickerController',
  });
}