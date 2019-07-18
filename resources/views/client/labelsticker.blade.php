@extends('layouts.app')

@section('content')


    <div id="clientLabelstickerController">
      <client-labelsticker></client-labelsticker>
    </div>

    <template id="client-labelsticker-template">
      <div>
      <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="card">
            <div class="card-header bg-info">
              Label Sticker Quotation
            </div>

            <div class="card-body">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Step 1 - Materials
                  <label for="required" class="control-label" style="color:red;">*</label>
                </label>
                <select2 v-model="form.material_id" class="form-control" @input="materialIdSelected()">
                    <option value="">All</option>
                    <option v-for="material in materials" :value="material.id">
                      @{{material.name}}
                    </option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['material_id'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['material_id']">
                    <strong>@{{ formErrors['material_id'][0] }}</strong>
                </span>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Step 2 - Shape
                  <label for="required" class="control-label" style="color:red;">*</label>
                </label>
                <select2 v-model="form.shape_id" class="form-control" @input="getQuotation()">
                    <option value="">All</option>
                    <option v-for="shape in shapes" :value="shape.id">
                      @{{shape.name}}
                    </option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['shape_id'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['shape_id']">
                    <strong>@{{ formErrors['shape_id'][0] }}</strong>
                </span>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Step 2 - Size
                </label>
                <label for="required" class="control-label" style="color:red;">*</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label">
                        Width (mm)
                      </label>
                      <input type="text" name="width" class="form-control" v-model="form.width" :class="{ 'is-invalid' : formErrors['width'] }" :placeholder="'Maximum '+formsetup.max_width+'mm'" @input="getQuotation()">
                      <span class="invalid-feedback" role="alert" v-if="formErrors['width']">
                          <strong>@{{ formErrors['width'][0] }}</strong>
                      </span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label class="control-label">
                        Height (mm)
                      </label>
                      <input type="text" name="height" class="form-control" v-model="form.height" :class="{ 'is-invalid' : formErrors['height'] }" :placeholder="'Maximum '+formsetup.max_height+'mm'" @input="getQuotation()">
                      <span class="invalid-feedback" role="alert" v-if="formErrors['height']">
                          <strong>@{{ formErrors['height'][0] }}</strong>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Step 3 - Quantities
                  <label for="required" class="control-label" style="color:red;">*</label>
                </label>
                <select2 v-model="form.orderquantity_id" class="form-control" @input="getQuotation()">
                    <option value="">All</option>
                    <option v-for="orderquantity in orderquantities" :value="orderquantity.id">
                      @{{orderquantity.name}}
                    </option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['orderquantity_id'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['orderquantity_id']">
                    <strong>@{{ formErrors['orderquantity_id'][0] }}</strong>
                </span>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Step 4 - Delivery
                </label>
                <select2 v-model="form.delivery_fee" class="form-control" @input="getQuotation()">
                    <option value="">None</option>
                    <option value="0">JB (Free)</option>
                    <option value="30">Singapore (+ RM 30)</option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['delivery_fee'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['delivery_fee']">
                    <strong>@{{ formErrors['delivery_fee'][0] }}</strong>
                </span>
              </div>
{{--
              <button type="button" class="btn btn-success btn-lg btn-block" :disabled="!form.material_id || !form.shape_id || !form.orderquantity_id" @click.prevent="getQuotation()">
                Get Quotation
              </button> --}}

              <div class="form-group col-md-12 col-sm-12 col-xs-12 row pt-3 ml-1">
                <h4>
                  Total:
                  <span>
                    RM @{{form.total.toFixed(2)}}
                  </span>
                </h4>
              </div>

            </div>
          </div>
        </div>
      </div>
      </div>
    </template>


@endsection