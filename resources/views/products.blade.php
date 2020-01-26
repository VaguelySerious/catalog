@extends('layouts.master')

@section('content')
@component('components.navbar')
@endcomponent
<div class="container product_list">

    <div class="product_list_title">
        <h1 class="title">Catalog</h1>
        <a href="/products/create" class="button button-is-link">
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
                    <p class="text product_attribute">{{ $product->name }}</p>
                    <p class="text product_attribute">{{ $product->cost }}</p>
                    <p class="text product_attribute">{{ $product->date }}</p>
                    <p class="text product_attribute">{{ $product->category }}</p>
                </div>
                <div class="product_control is-flex">
                    <div class="product_control_item">
                        <a href="/products/{{$product->id}}" class="button button-is-link">
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
                            <button class="button">Delete</button>
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
