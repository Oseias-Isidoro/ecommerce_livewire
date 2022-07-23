<div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @foreach($shops as $shop)
        <div class="d-flex justify-content-between align-items-center bg-light border border-dark my-2 p-3 rounded">
            <div>
                {{$shop->subdomain}}
            </div>
            <div>
                <a class="btn btn-dark" href="{{ route('shops.edit', ['shop' => $shop->id]) }}">{{__('update')}}</a>

                <a class="btn btn-danger" href="{{ route('shops.destroy', ['shop' => $shop->id]) }}" onclick="event.preventDefault();document.getElementById('delete-form-{{ $shop->id }}').submit();">{{__('delete')}}</a>
                <form id="delete-form-{{ $shop->id }}" action="{{  route('shops.destroy', ['shop' => $shop->id]) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>

                <a class="btn btn-success" href="">{{__('config')}}</a>
            </div>
        </div>
    @endforeach
    {{ $shops->links() }}
</div>
