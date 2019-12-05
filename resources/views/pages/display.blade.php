@extends('layouts.nav')

@section('title')
    Products Preview
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
 <link href="{{ asset('css/itemdisplay.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="row">

          <div style="margin-top: 60px;"class="col-md-12">

        <div class="row">
            <div class="preview col-md-6">

                <div class="preview-pic tab-content">
                    <div class="tab-pane active" id="pic-1"><img src="/storage/display_images/{{ $product->display_image }}"/>
                    </div>
                    <div class="text-center"><h6 style="color: green;">Available Stocks: {{ $product->quantity }}</h6></div>
                </div>
            </div>
            <div style="margin-top: 100px" class="details col-md-6">
                <p class="product-title">{{ $product->name }}</p>
                <div class="rating">
                    <p class="flavor"><span class="review-no">{{ $product->flavor }}</span></p>
                </div>
                <p class="description">{!! $product->description !!}</p>
                <p class="price"><span>P{{ $product->price }}</span></p>
                    <div class="row">
                        <div class="col-sm-4" id="form-size">
                        <form>
                        <h6 class="colorsize">Size</h6>
                            <select name="cars" class="custom-select">
                            <option selected>60ML</option>
                            </select>
                        </form>
                        </div>
                        <div class="col-sm-4" id="form-size">
                        <form>
                        <h6>Strength</h6>
                            <select name="cars" class="custom-select">
                            <option selected>3MG</option>
                            <option value="volvo">6MG</option>
                            <option value="fiat">9MG</option>
                            <option value="audi">12MG</option>
                            </select>
                        </form>
                        </div>
                        <div class="col-sm-3" id="form-size">
                        <h6>Quantity</h6>
                        <select name="cars" class="custom-select">
                            <option selected>1</option>
                            <option value="volvo">2</option>
                            <option value="fiat">3</option>
                            <option value="audi">4</option>
                            </select>
                        </div>
                    <button class="btn-cart"  type="button">ADD TO CART</button>
                    </div>


            </div>
        </div>
            </div>
        </div>

    <div style="margin-bottom: 30px;"></div>
@endsection

@section('script')


@endsection
