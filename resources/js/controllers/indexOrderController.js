if(document.querySelector('#indexOrderController')) {
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
        if(this.form.material_id == 5) {
          this.formsetup.max_width = 282
          this.formsetup.max_height = 434
        }else {
          this.formsetup.max_width = 307
          this.formsetup.max_height = 460
        }
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
    Vue.component('client-inkjetsticker', {
      template: '#client-inkjetsticker-template',
      data() {
        return {
          form: {
            // material_id: this.returnNoneOption(),
            material_id: '',
            shape_id: '',
            width: '',
            height: '',
            lamination_id: this.returnNoneMultiplierOption(),
            finishing_id: this.returnNoneMultiplierOption(),
            frame_id: this.returnNoneMultiplierOption(),
            orderquantity_id: '',
            delivery_id: this.returnSelfCollectOption(),
            quantities: '',
            total: 0.00
          },
          formsetup: {
            max_width: 150,
            max_height: 500
          },
          materials: [],
          orderquantities: [],
          shapes: [],
          laminations: [
            this.returnNoneMultiplierOption()
          ],
          finishings: [
            this.returnNoneMultiplierOption()
          ],
          frames: [
            this.returnNoneMultiplierOption()
          ],
          formErrors: {},
          is_finishing_enable: true,
          deliveries: [],
          combine_sticker_str: ''
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
            let vm = this;
            $.each(response.data, function(key, value) {
              vm.laminations.push(value);
            });
            // this.laminations = response.data
          })
        },
        getAllFinishings() {
          axios.get('/api/finishings/product/2').then((response) => {
            let vm = this;
            $.each(response.data, function(key, value) {
              vm.finishings.push(value);
            });
            // this.finishings = response.data
          })
        },
        getAllFrames() {
          axios.get('/api/frames/product/2').then((response) => {
            let vm = this;
            $.each(response.data, function(key, value) {
              vm.frames.push(value);
            });
            // this.frames = response.data
          })
        },
        getAllDeliveries() {
          axios.get('/api/deliveries/product/2').then((response) => {
            this.deliveries = response.data
            // console.log(JSON.parse(JSON.stringify(this.deliveries)))
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
        enterSize() {
          if(this.form.width > this.form.height) {
            if(this.form.width > this.formsetup.max_height) {
              this.combine_sticker_str = 'Need to combine sticker'
            }else {
              this.combine_sticker_str = ''
              if(this.form.height > this.formsetup.max_width) {
                this.combine_sticker_str = 'Need to combine sticker'
              }else {
                this.combine_sticker_str = ''
              }
            }
          }else {
            if(this.form.height > this.formsetup.max_height) {
              this.combine_sticker_str = 'Need to combine sticker'
            }else {
              this.combine_sticker_str = ''
              if(this.form.width > this.formsetup.max_width) {
                this.combine_sticker_str = 'Need to combine sticker'
              }else {
                this.combine_sticker_str = ''
              }
            }
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
        }, 500),
        customLabel(option) {
          return `${option.name}`
        },
        returnNoneMultiplierOption() {
          return {'id': '', 'name': 'None', 'multiplier': 0}
        },
        returnNoneOption() {
          return {'id': '', 'name': 'None'}
        },
        returnSelfCollectOption() {
          return {id: 1, name: "Self Collect", multiplier: 0}
        }
      }
    });

    new Vue({
      el: '#indexOrderController',
    });
  }