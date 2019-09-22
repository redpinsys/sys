if(document.querySelector('#clientInkjetstickerController')) {
    Vue.component('client-inkjetsticker', {
      template: '#client-inkjetsticker-template',
      data() {
        return {
          form: {
            material_id: '',
            shape_id: '',
            width: '',
            height: '',
            lamination_id: '',
            finishing_id: '',
            frame_id: '',
            orderquantity_id: '',
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
          laminations: [],
          finishings: [],
          frames: [],
          formErrors: {},
          is_finishing_enable: true,
          deliveries: []
        }
      },
      mounted() {
        this.getAllMaterials()
        this.getAllOrderquantities()
        this.getAllShapes()
        this.getAllLaminations()
        this.getAllFinishings()
        this.getAllFrames()
        this.getAllDeliveries()
      },
      methods: {
        materialIdSelected() {
          if(this.form.material_id == 5) {
            this.formsetup.max_width = 282
            this.formsetup.max_height = 434
          }else {
            this.formsetup.max_width = 150
            this.formsetup.max_height = 500
          }
          this.getQuotation()
        },
        getAllMaterials() {
          axios.get('/api/materials/product/2').then((response) => {
            this.materials = response.data
          })
        },
        getAllOrderquantities() {
          axios.get('/api/orderquantities/all').then((response) => {
            this.orderquantities = response.data
          })
        },
        getAllShapes() {
          axios.get('/api/shapes/product/2').then((response) => {
            this.shapes = response.data
          })
        },
        getAllLaminations() {
          axios.get('/api/laminations/product/2').then((response) => {
            this.laminations = response.data
          })
        },
        getAllFinishings() {
          axios.get('/api/finishings/product/2').then((response) => {
            this.finishings = response.data
          })
        },
        getAllFrames() {
          axios.get('/api/frames/product/2').then((response) => {
            this.frames = response.data
          })
        },
        getAllDeliveries() {
          axios.get('/api/deliveries/product/2').then((response) => {
            this.deliveries = response.data
          })
        },
        shapeChosen() {
          this.is_finishing_enable = true
          if(this.form.shape_id == 3) {
            this.form.finishing_id = 1
            this.is_finishing_enable = false
          }
          this.getQuotation()
        },
        getQuotation: _.debounce(function(e) {
          this.formErrors = {}
          axios.post('/api/inkjetsticker/quotation', this.form).then((response) => {
            this.form.total = response.data
          })
          .catch((error) => {
            this.formErrors = error.response.data.errors
          });
        }, 500)
      }
    });

    new Vue({
      el: '#clientInkjetstickerController',
    });
  }