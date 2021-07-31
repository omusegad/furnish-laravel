@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row pt-3">
        <div class="col-6">
            <div class="page-title-box d-flex  align-items-center justify-content-between">
                <h4 class="mb-0"> Product  </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a  href="{{ route("products.create") }}"  class="btn btn-primary waves-effect waves-light">Add Product</a>
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

    <div class="row mt-2">
        <div class="col-md-12">
            <table class="table table-sm m-0 bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Product</th>
                        <th>Product image</th>
                        <th>Description</th>
                        <th>Regular Price</th>
                        <th>Sale Price</th>
                        <th>Offer %</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($products as $item)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $item->category['productCategoryName']}}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>
                           <div class ="img-circle">
                               <img src="{{ asset('storage/app/public'.$item->product_image_url) }}" alt="">
                            </div>
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->regular_price }}</td>
                        <td>{{ $item->sale_price }}</td>
                        <td>{{ $item->offer_percentage }}</td>
                        <td>
                         <span class="actionbtns">
                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-info waves-effect text-white waves-light"> <i class="fas fa-edit"></i> </a>

                        </span>
                            <span class="actionbtns">
                                <form method="POST" action="{{route('products.destroy', $item->id)}}">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                <button type="submit" class="btn btn-primary waves-effect waves-light"> <i class="far fa-trash-alt"></i> </button>
                            </span>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>







@endsection
