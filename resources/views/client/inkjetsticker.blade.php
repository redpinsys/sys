@extends('layouts.app')

@section('content')


    <div id="clientInkjetstickerController">
      <client-inkjetsticker></client-inkjetsticker>
    </div>

    <template id="client-inkjetsticker-template">
      <div>
      <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="card">
            <div class="card-header bg-info">
              Inkjet Sticker Quotation
            </div>

            <div class="card-body">
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Materials
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
                  Shape
                  <label for="required" class="control-label" style="color:red;">*</label>
                </label>
                <select2 v-model="form.shape_id" class="form-control" @input="shapeChosen()">
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
                  Size
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
                  Laminations
                </label>
                <select2 v-model="form.lamination_id" class="form-control" @input="getQuotation()">
                    <option value="">All</option>
                    <option v-for="lamination in laminations" :value="lamination.id">
                      @{{lamination.name}}
                    </option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['lamination_id'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['lamination_id']">
                    <strong>@{{ formErrors['lamination_id'][0] }}</strong>
                </span>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12" v-if="is_finishing_enable">
                <label class="control-label">
                  Finishing
                </label>
                <select2 v-model="form.finishing_id" class="form-control" @input="getQuotation()">
                    <option value="">All</option>
                    <option v-for="finishing in finishings" :value="finishing.id">
                      @{{finishing.name}}
                    </option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['finishing_id'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['finishing_id']">
                    <strong>@{{ formErrors['finishing_id'][0] }}</strong>
                </span>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Frame
                </label>
                <select2 v-model="form.frame_id" class="form-control" @input="getQuotation()">
                    <option value="">All</option>
                    <option v-for="frame in frames" :value="frame.id">
                      @{{frame.name}}
                    </option>
                </select2>
                <input type="hidden" class="form-control" :class="{ 'is-invalid' : formErrors['frame_id'] }">
                <span class="invalid-feedback" role="alert" v-if="formErrors['frame_id']">
                    <strong>@{{ formErrors['frame_id'][0] }}</strong>
                </span>
              </div>
              <hr>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Quantities
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
                  Delivery
                </label>
                <select2 v-model="form.delivery_id" class="form-control" @input="getQuotation()">
                  <option value="">All</option>
                  <option v-for="delivery in deliveries" :value="delivery.id">
                    @{{delivery.name}}
                  </option>
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
{{--
              <hr>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="text-center">
                    <h3>
                        <span class="badge badge-light">
                            Customer Info
                        </span>
                    </h3>
                </div>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label">
                    Attn Name
                  </label>
                  <input type="text" name="attn_name" class="form-control" v-model="form.attn_name">
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label">
                  Contact
                </label>
                <input type="text" name="phone_number" class="form-control" v-model="form.phone_number">
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                  <label class="control-label">
                      Atttachment
                      <i class="fas fa-paperclip"></i>
                  </label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="logo_url" class="custom-file-input" id="attachment" v-on:change="onFileChange" :class="{ 'is-invalid' : formErrors['attachment'] }">
                      <label class="custom-file-label" for="attachment">Choose file</label>
                    </div>
                  </div>
                  @{{file_name}}
                  <span class="invalid-feedback" role="alert" v-if="formErrors['attachment']">
                      <strong>@{{ formErrors['attachment'][0] }}</strong>
                  </span>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      </div>
    </template>


@endsection