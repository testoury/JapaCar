<div class="japa-form-container">
    @if (session()->has('message'))
        <div class="alert alert-success bg-grey text-white rounded-0 border-0 mb-4" role="alert"
            style="border-left: 4px solid var(--red-color) !important;">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-eurostile text-white japa-form-title">
        Insert <span class="text-red">New Legend</span>
    </h2>

    <form wire:submit="store" enctype="multipart/form-data">

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="brand" class="form-label japa-label">Brand / Manufacturer</label>
                <input type="text" wire:model.live="brand" id="brand" class="form-control japa-input"
                    placeholder="e.g., Toyota, Nissan">
                @error('brand')
                    <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="model" class="form-label japa-label">Model Name</label>
                <input type="text" wire:model.live="model" id="model" class="form-control japa-input"
                    placeholder="e.g., Supra MK4">
                @error('model')
                    <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="engine" class="form-label japa-label">Engine</label>
                <input type="text" wire:model.live="engine" id="engine" class="form-control japa-input"
                    placeholder="e.g., 2JZ-GTE">
                @error('engine')
                    <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="year" class="form-label japa-label">Production Year</label>
                <input type="number" wire:model.live.blur="year" id="year" class="form-control japa-input"
                    placeholder="e.g., 1998">
                @error('year')
                    <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for="hp" class="form-label japa-label">Horsepower</label>
                <input type="number" wire:model.live.blur="hp" id="hp" class="form-control japa-input"
                    placeholder="e.g., 308">
                @error('hp')
                    <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label japa-label">Showroom Image Display</label>
            <input type="file" wire:model.live="image" id="image" class="form-control japa-input">
            @error('image')
                <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="description" class="form-label japa-label">Vehicle Overview</label>
            <textarea wire:model.live="description" id="description" rows="5" class="form-control japa-textarea"
                placeholder="Detail condition..."></textarea>
            @error('description')
                <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-uppercase font-monospace text-muted small mb-3">
                Select Hardware Tags // Performance Attributes
            </label>

 <div class="row g-2">
    @foreach ($tags as $tag)
        <div class="col-6 col-md-4">
            <input type="checkbox"
                   wire:model="selectedTags"
                   value="{{ $tag->id }}"
                   id="tag{{ $tag->id }}"
                   class="btn-check japa-tag-input">

            <label class="btn japa-tag-label w-100 text-start font-monospace text-uppercase p-3 d-flex align-items-center justify-content-between"
                   for="tag{{ $tag->id }}">
                <span># {{ $tag->name }}</span>
                <i class="bi bi-plus-lg tag-icon"></i>
            </label>
        </div>
    @endforeach
</div>


        </div>
        <div class="d-flex justify-content-end align-items-center gap-3">
            <div wire:loading wire:target="image, save" class="text-secondary tracking-wide fs-14 text-uppercase">
                Processing Asset...
            </div>
            <button type="submit" class="btn-japa border-0">
                Publish Vehicle {{ $brand || $model ? ' - ' . $brand . ' ' . $model : '' }}
            </button>
        </div>
    </form>
</div>
