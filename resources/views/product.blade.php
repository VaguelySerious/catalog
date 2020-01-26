@extends('layouts.master')

@section('content')
@component('components.navbar')
@endcomponent
<div class="container">
    {{-- Distinguish between form to create a new one, and form to update an existing one --}}
    @if ($creating)
    <form action="/products" method="POST">
    @else
    <form action="/products/{{$product->id}}" method="POST">
        @method('PUT')
    @endif
        @csrf
         <div class="field form__item">
            <label class="label" for="name">Name</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="fas fa-align-justify"></i>
                </span>
                <input class="input" type="text" id="name" name="name" value="{{$product->name ?? ''}}">
            </div>
        </div>

        <div class="field form__item">
            <label class="label" for="date">Date</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="far fa-clock"></i>
                </span>
                @php
                    $date = ($product->date ?? false)
                        ? \Carbon\Carbon::parse($product->date)->format('Y-m-d')
                        : \Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                <input class="input" type="date" id="date" name="date" value="{{ $date }}">
            </div>
        </div>

        <div class="field form__item">
            <label class="label" for="category">Category</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="fas fa-box"></i>
                </span>
                <div class="select">
                    <select id="category" name="category" value="{{$product->category ?? 'apparel'}}">
                      <option value="apparel">Apparel</option>
                      <option value="furniture">Furniture</option>
                      <option value="groceries">Groceries</option>
                    </select>
                  </div>
            </div>
        </div>
        
        <div class="field form__item">
            <label class="label" for="cost">Cost</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
                <input class="input" type="number" id="cost" name="cost" value="{{$product->cost ?? '10.00'}}">
            </div>
        </div>

        <div class="form_buttons field is-grouped">
            <div class="control">
                <button class="button is-link">
                    Create
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
