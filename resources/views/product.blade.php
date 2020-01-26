@extends('layouts.master')

@section('content')
@component('components.navbar')
@endcomponent
<div class="container">
    <form action="/products" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        {{-- TODO Add better icons --}}
         <div class="field form__item">
            <label class="label" for="name">Name</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                <input class="input" type="text" id="name" name="name">
            </div>
        </div>

        <div class="field form__item">
            <label class="label" for="date">Date</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
                @php
                    $ISODate = \Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                <input class="input" type="date" id="date" name="date" value="{{ $ISODate }}">
            </div>
        </div>

        <div class="field form__item">
            <label class="label" for="category">Category</label>
            <div class="control has-icons-left">
                <span class="icon is-small is-left">
                    <i class="fas fa-box"></i>
                </span>
                <div class="select">
                    <select id="category" name="category">
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
                    <i class="fas fa-dollar-sign"></i>
                </span>
                <input class="input" type="number" id="cost" name="cost" value="10.00">
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
