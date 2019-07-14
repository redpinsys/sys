import Axios from "axios";

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
          total: 0.00
        },
        formsetup: {
          max_width: '',
          max_height: ''
        },
        materials: [],
        orderquantities: [],
        shapes: [],
        formErrors: {},
      }
    },
    mounted() {
      this.getAllMaterials()
      this.getAllOrderquantities()
      this.getAllShapes()
    },
    methods: {
      materialIdSelected() {
        console.log(this.form.material_id)
        if(this.form.material_id == 5) {
          this.formsetup.max_width = 282
          this.formsetup.max_height = 434
        }else {
          this.formsetup.max_width = 307
          this.formsetup.max_height = 460
        }
      },
      getAllMaterials() {
        axios.get('/api/materials/all').then((response) => {
          this.materials = response.data
        })
      },
      getAllOrderquantities() {
        axios.get('/api/orderquantities/all').then((response) => {
          this.orderquantities = response.data
        })
      },
      getAllShapes() {
        axios.get('/api/shapes/all').then((response) => {
          this.shapes = response.data
        })
      },
      getQuotation() {
        axios.post('/api/labelsticker/quotation', this.form).then((response) => {
          this.form.total = response.data
        })
        .catch((error) => {
          this.formErrors = error.response.data.errors
        });
      }
    }
  });

  new Vue({
    el: '#clientLabelstickerController',
  });
}