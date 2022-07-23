<div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input id="name" type="text" class="form-control" wire:model="name">
    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
</div>
<div class="mb-3">
    <label for="subdomain" class="form-label">subdomain</label>
    <input id="subdomain" type="text" class="form-control" wire:model="subdomain">
    @error('subdomain') <span class="error text-danger">{{ $message }}</span> @enderror
</div>

@isset($shop)
    <div class="mb-3">
        <label for="status" class="form-label">status</label>
        <input id="status" type="text" class="form-control" wire:model="status">
        @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
@endisset

<button type="submit" class="btn btn-primary">Submit</button>
