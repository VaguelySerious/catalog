@extends('layouts.master')

@section('content')
@component('components.navbar')
@endcomponent
<div class="container product_list">

    <div class="product_list_title">
        <h1 class="title">Catalog</h1>
        <a href="/products/create" class="button is-link is-light">
            <span class="icon">
            <i class="far fa-edit"></i>
            </span>
            <span>Create New</span>
        </a>
  </button>
    </div>

    <div class="product_list_list">
        @forelse ($products as $product)
            <div class="box product_wrapper is-flex">
                <div class="product_attributes is-flex">
                    <h2 class="product_attribute product_attribute_title">{{ $product->name }}</h2>
                    <p class="text product_attribute product">{{ $product->category }}</p>
                    <p class="text product_attribute product_date">{{\Carbon\Carbon::parse($product->date)->format('M d, Y')}}</p>
                </div>
                <div class="product_price_wrapper">
                    <p class="text product_attribute product_price">$ {{ $product->cost }}</p>
                </div>
                <div class="product_control is-flex">
                    <div class="product_control_item">
                        <a href="/products/{{$product->id}}" class="button is-link">
                            <span class="icon">
                                <i class="far fa-edit"></i>
                            </span>
                            <span>Edit</span>
                        </a>
                    </div>
                    <div class="product_control_item">
                        <form action="/products/{{$product->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="button is-danger">
                                <span class="icon">
                                    <i class="fas fa-trash-alt"></i>
                                </span>
                                <span>Delete</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No users</p>
        @endforelse
    </div>
</div>
@endsection
