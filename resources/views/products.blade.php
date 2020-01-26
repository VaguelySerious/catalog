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
            <div class="box">
                <p>This is product {{ $product->id }}</p>
                <form action="/products/{{$product->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="button">Delete</button>
                </form>
            </div>
        @empty
            <p>No users</p>
        @endforelse
    </div>
</div>
@endsection
