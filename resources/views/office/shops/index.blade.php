@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="pt-4 pb-2">
            <a class="btn btn-outline-success" href="{{route('shops.create')}}">
                {{__('Create Shop')}}
            </a>
        </div>
        <livewire:shops.show-shops />
    </div>
@endsection
