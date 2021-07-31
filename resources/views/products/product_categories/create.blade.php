@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Add Category </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-primary" href="{{ route('products-category.index') }}"> All Categories</a>
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
            <form method="POST" action="{{ route('products-category.store') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('productCategoryName') is-invalid @enderror" name="productCategoryName" value="{{ old('productCategoryName') }}" placeholder="Category Name" required autocomplete="productCategoryName" autofocus>
                        @error('productCategoryName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Description" required autocomplete="description" autofocus>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

               <div class="form-group row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary role-btn">
                        {{ __('Save') }}
                    </button>
               </div>
            </div>

            </form>




            </div>
        </div>
    </div>
</div>

@endsection
