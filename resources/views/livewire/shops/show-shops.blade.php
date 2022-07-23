<div>
@foreach($shops as $shop)
    <div class="d-flex justify-content-between align-items-center bg-light border border-dark my-2 p-3 rounded">
        <div>
            {{$shop->subdomain}}
        </div>
        <div>
            <a class="btn btn-dark" href="{{ route('shops.edit', ['shop' => $shop->id]) }}">{{__('update')}}</a>
            <a class="btn btn-danger" href="">{{__('delete')}}</a>
            <a class="btn btn-success" href="">{{__('config')}}</a>
        </div>
    </div>
@endforeach
    {{ $shops->links() }}
</div>
