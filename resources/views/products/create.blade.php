@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Add Product </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> All Products</a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissable">
                    <p>{{ Session::get('message') }}</p>
                    <button type = "button" class = "close closebtn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                            <label for=""> Choose Category</label>
                            <select name="product_category_id" class="form-select form-control" required>
                                <option selected value=''>Select Category</option>
                                @foreach ($cat as $item)
                                   <option value="{{ $item->id }}">{{ $item->productCategoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <div class="col-md-4">
                <div class="form-group ">
                    <label for="">Product Name</label>
                        <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" placeholder="Product Name" required autocomplete="product_name" autofocus>
                        @error('product_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <label for=""> Product Description</label>
                <div class="form-group ">
                        <input id="name" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Description" required autocomplete="description" autofocus>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label for="">Regular Price</label>
                        <input id="name" type="text" class="form-control @error('regular_price') is-invalid @enderror" name="regular_price" value="{{ old('regular_price') }}" placeholder="Regular Price" required autocomplete="regular_price" autofocus>
                        @error('regular_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label for=""> Offer Percentage</label>
                            <input id="name" type="text" class="form-control @error('offer_percentage') is-invalid @enderror" name="offer_percentage" value="{{ old('offer_percentage') }}" placeholder="Offer Percentage" required autocomplete="offer_percentage" autofocus>
                            @error('offer_percentage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label for=""> Product Image</label>
                        <input type="file" name="product_image" id="js-upload-files" multiple>                            @error('offer_percentage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary role-btn">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
            </form>




            </div>
        </div>
    </div>
</div>

@endsection
