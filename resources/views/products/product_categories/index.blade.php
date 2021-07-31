@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row pt-3">
        <div class="col-6">
            <div class="page-title-box d-flex  align-items-center justify-content-between">
                <h4 class="mb-0"> Product Categories  </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a  href="{{ route("products-category.create") }}"  class="btn btn-primary waves-effect waves-light">Add Category</a>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($cat as $item)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $item->productCategoryName }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                         <span class="actionbtns">
                            <a href="{{ route('products-category.edit', $item->id) }}" class="btn btn-info waves-effect text-white waves-light"> <i class="fas fa-edit"></i> </a>

                        </span>
                            <span class="actionbtns">
                                <form method="POST" action="{{route('products-category.destroy', $item->id)}}">
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
