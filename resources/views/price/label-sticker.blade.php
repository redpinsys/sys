<template id="price-labelsticker-template">
    <div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <tr class="table-primary">
                    <th class="text-center" colspan="10">
                        Shape
                    </th>
                </tr>
                <tr class="table-secondary">
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Name
                    </th>
                    <th class="text-center">
                        Multiplier
                    </th>
                </tr>
                <tr v-for="(data, index) in shapes" class="row_edit">
                    <td class="text-center">
                        @{{ index + 1}}
                    </td>
                    <td class="text-left">
                        @{{ data.name }}
                    </td>
                    <td class="text-right">
                        <input type="text" name="multiplier" class="form-control text-right" v-model="data.multiplier" @keyup="onProductShapeMultiplierChanged(data.id, data.multiplier)">
                    </td>
                </tr>
{{--
                <tr v-if="! pagination.total">
                    <td colspan="18" class="text-center"> No Results Found </td>
                </tr> --}}
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <tr class="table-primary">
                    <th class="text-center" colspan="10">
                        Material
                    </th>
                </tr>
                <tr class="table-secondary">
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Name
                    </th>
                    <th class="text-center">
                        Multiplier
                    </th>
                </tr>
                <tr v-for="(data, index) in materials" class="row_edit">
                    <td class="text-center">
                        @{{ index + 1}}
                    </td>
                    <td class="text-left">
                        @{{ data.name }}
                    </td>
                    <td class="text-right">
                        <input type="text" name="multiplier" class="form-control text-right" v-model="data.multiplier" @keyup="onProductMaterialMultiplierChanged(data.id, data.multiplier)">
                    </td>
                </tr>
{{--
                <tr v-if="! pagination.total">
                    <td colspan="18" class="text-center"> No Results Found </td>
                </tr> --}}
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <tr class="table-primary">
                    <th class="text-center" colspan="10">
                        Delivery
                    </th>
                </tr>
                <tr class="table-secondary">
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Name
                    </th>
                    <th class="text-center">
                        Multiplier
                    </th>
                </tr>
                <tr v-for="(data, index) in deliveries" class="row_edit">
                    <td class="text-center">
                        @{{ index + 1 }}
                    </td>
                    <td class="text-left">
                        @{{ data.name }}
                    </td>
                    <td class="text-right">
                        <input type="text" name="multiplier" class="form-control text-right" v-model="data.multiplier" @keyup="onDeliveryMultiplierChanged(data.id, data.multiplier)">
                    </td>
                </tr>
{{--
                <tr v-if="! pagination.total">
                    <td colspan="18" class="text-center"> No Results Found </td>
                </tr> --}}
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <tr class="table-primary">
                    <th class="text-center" colspan="10">
                        Quantities
                    </th>
                </tr>
                <tr class="table-secondary">
                    <th class="text-center">
                        #
                    </th>
                    <th class="text-center">
                        Name
                    </th>
                    <th class="text-center">
                        Qty
                    </th>
{{--
                    <th class="text-center">
                        Multiplier
                    </th> --}}
                </tr>
                <tr v-for="(data, index) in orderquantities" class="row_edit">
                    <td class="text-center">
                        @{{ index + 1 }}
                    </td>
                    <td class="text-right">
                        <input type="text" name="name" class="form-control" v-model="data.name" @keyup="onQtyNameChanged(data.id, data.name)">
                    </td>
                    <td class="text-right">
                        <input type="text" name="qty" class="form-control text-right" v-model="data.qty" @keyup="onQtyChanged(data.id, data.qty)">
                    </td>
{{--
                    <td class="text-right">
                        <input type="text" name="multiplier" class="form-control" v-model="data.multiplier" @change="onMultiplierChanged(data.id, data.multiplier)">
                    </td> --}}
                </tr>
{{--
                <tr v-if="! pagination.total">
                    <td colspan="18" class="text-center"> No Results Found </td>
                </tr> --}}
            </table>
        </div>

      </div>
    </div>
    </div>
  </template>