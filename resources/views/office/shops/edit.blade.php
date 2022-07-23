@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row pt-2">
            <livewire:shops.update-shop-form :shop="$shop" />
        </div>
    </div>
@endsection
