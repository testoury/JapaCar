<div class="japa-form-container">
    @if (session()->has('message'))
        <div class="alert alert-success bg-grey text-white rounded-0 border-0 mb-4" role="alert" style="border-left: 4px solid var(--red-color) !important;">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-eurostile text-white japa-form-title">
        Edit <span class="text-red">your post </span>
    </h2>

    <form wire:submit="update" enctype="multipart/form-data">

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="brand" class="form-label japa-label">Brand / Manufacturer</label>
                <input type="text" wire:model.live="brand" id="brand" class="form-control japa-input" placeholder="e.g., Toyota, Nissan">
                @error('brand') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="model" class="form-label japa-label">Model Name</label>
                <input type="text" wire:model.live="model" id="model" class="form-control japa-input" placeholder="e.g., Supra MK4">
                @error('model') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="engine" class="form-label japa-label">Engine</label>
                <input type="text" wire:model.live="engine" id="engine" class="form-control japa-input" placeholder="e.g., 2JZ-GTE">
                @error('engine') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="year" class="form-label japa-label">Production Year</label>
                <input type="number" wire:model.live.blur="year" id="year" class="form-control japa-input" placeholder="e.g., 1998">
                @error('year') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="hp" class="form-label japa-label">Horsepower</label>
                <input type="number" wire:model.live.blur="hp" id="hp" class="form-control japa-input" placeholder="e.g., 308">
                @error('hp') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label japa-label">Showroom Image Display</label>

            <div class="mb-3 p-2 border border-secondary rounded japa-car-card d-inline-block text-center" style="max-width: 250px;">
                @if ($image && !is_string($image))
                    <span class="text-red text-eurostile d-block mb-1 tracking-wider" style="font-size: 10px;">New Preview</span>
                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
                @elseif ($car && $car->image)
                    <span class="text-muted text-eurostile d-block mb-1 tracking-wider" style="font-size: 10px;">Current Image</span>
                    <img src="{{ Storage::url($car->image) }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
                @else
                    <div class="py-3 px-4 text-muted small font-monospace">
                        <i class="bi bi-image fs-4 d-block mb-1"></i> No media asset
                    </div>
                @endif
            </div>

            <input type="file" wire:model.live="image" id="image" class="form-control japa-input">
            @error('image') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="description" class="form-label japa-label">Vehicle Overview</label>
            <textarea wire:model.live="description" id="description" rows="5" class="form-control japa-textarea" placeholder="Detail condition..."></textarea>
            @error('description') <span class="text-red fs-16 d-block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="d-flex justify-content-end align-items-center gap-3">
            <div wire:loading wire:target="image, update" class="text-secondary tracking-wide fs-14 text-uppercase font-monospace">
                Processing Asset...
            </div>
            <button type="submit" class="btn-japa border-0">
                Update Vehicle {{ $brand || $model ? ' - ' . $brand . ' ' . $model : '' }}
            </button>
        </div>
    </form>
</div>
