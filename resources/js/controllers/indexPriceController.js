if(document.querySelector('#indexPriceController')) {
    Vue.component('price-labelsticker', {
      template: '#price-labelsticker-template',
      data() {
        return {
            materials: [],
            orderquantities: [],
            shapes: [],
            deliveries: []
        }
    },
      mounted() {
        this.getAllMaterials()
        this.getAllOrderquantities()
        this.getAllShapes()
        this.getAllDeliveries()
      },
      methods: {
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
        onProductShapeMultiplierChanged(id, value) {
            axios.post('/api/shapes/' + id, {multiplier: value}).then((response) => {
            })
        },
        onProductMaterialMultiplierChanged(id, value) {
            axios.post('/api/materials/' + id, {multiplier: value}).then((response) => {
            })
        },
        onDeliveryMultiplierChanged(id, value) {
            axios.post('/api/deliveries/' + id, {multiplier: value}).then((response) => {
            })
        },
        onQtyNameChanged(id, name) {
            axios.post('/api/orderquantities/' + id, {name: name}).then((response) => {
            })
        },
        onQtyChanged(id, qty) {
            axios.post('/api/orderquantities/' + id, {qty: qty}).then((response) => {
            })
        }
      }
    });

      Vue.component('price-inkjetsticker', {
        template: '#price-inkjetsticker-template',
        data() {
          return {
            materials: [],
            shapes: [],
            laminations: [],
            finishings: [],
            frames: [],
            deliveries: []
          }
        },
        mounted() {
          this.getAllMaterials()
          this.getAllShapes()
          this.getAllLaminations()
          this.getAllFinishings()
          this.getAllFrames()
          this.getAllDeliveries()
        },
        methods: {
            getAllMaterials() {
                axios.get('/api/materials/product/2').then((response) => {
                    this.materials = response.data
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
                })
            },
            getAllDeliveries() {
                axios.get('/api/deliveries/product/2').then((response) => {
                    this.deliveries = response.data
                })
            },
            onProductShapeMultiplierChanged(id, value) {
                axios.post('/api/shapes/' + id, {multiplier: value}).then((response) => {
                })
            },
            onProductMaterialMultiplierChanged(id, value) {
                axios.post('/api/materials/' + id, {multiplier: value}).then((response) => {
                })
            },
            onProductLaminationMultiplierChanged(id, value) {
                axios.post('/api/laminations/' + id, {multiplier: value}).then((response) => {
                })
            },
            onProductFinishingMultiplierChanged(id, value) {
                axios.post('/api/finishings/' + id, {multiplier: value}).then((response) => {
                })
            },
            onProductFrameMultiplierChanged(id, value) {
                axios.post('/api/frames/' + id, {multiplier: value}).then((response) => {
                })
            },
            onDeliveryMultiplierChanged(id, value) {
                axios.post('/api/deliveries/' + id, {multiplier: value}).then((response) => {
                })
            },

        }
      });

      new Vue({
        el: '#indexPriceController',
      });
    }