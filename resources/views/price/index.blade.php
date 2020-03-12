@extends('layouts.app')

@section('content')
<div>
    <div class="card">
      <div class="card-header">
          <div class="form-row">
          <span class="mr-auto">
            <i class="fas fa-tags"></i>
              Pricing
          </span>
          </div>
      </div>
      <div class="card-body">
        <div id="indexPriceController">
        <div>
            <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#label_sticker">Label Sticker</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" data-toggle="pill" href="#inkjet_sticker">Inkjet Sticker</a>
            </li>
            {{-- <a class="nav-item nav-link" href="#poster">Poster</a> --}}
            </ul>
            <div class="tab-content">
            <div class="tab-pane container active" id="label_sticker">
                <div class="form-group pt-5">
                    <price-labelsticker></price-labelsticker>
                </div>
            </div>
            <div class="tab-pane container fade" id="inkjet_sticker">
                <div class="form-group pt-5">
                    <price-inkjetsticker></price-inkjetsticker>
                </div>
            </div>
{{--
            <div class="tab-pane container fade" id="poster">
                <client-poster></client-poster>
            </div> --}}
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  @include('price.label-sticker')
  @include('price.inkjet-sticker')
  {{-- @include('order.poster') --}}
@endsection