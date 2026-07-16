<div>
   <div class="japa-form-container w-100 mx-auto" style="max-width: 550px;">

    <div class="text-center mb-4">
        <span class="text-red text-eurostile small tracking-widest uppercase d-block mb-1" style="font-size: 11px;">
            Establish Profile
        </span>
        <h2 class="text-eurostile text-white japa-form-title m-0">
            Create <span class="text-red">Account</span>
        </h2>
        <p class="text-muted small mt-2">Unisciti alla community di appassionati JDM</p>
    </div>

    <form wire:submit="register">

        <div class="mb-4">
            <label for="name" class="form-label japa-label">Username / Full Name</label>
            <input type="text" wire:model.live="name" id="name" class="form-control japa-input @error('name') is-invalid @enderror" placeholder="e.g., Hichem Testouri">
            @error('name')
                <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="form-label japa-label">Email Address</label>
            <input type="email" wire:model.live.blur="email" id="email" class="form-control japa-input @error('email') is-invalid @enderror" placeholder="name@example.com">
            @error('email')
                <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label japa-label">Password</label>
            <input type="password" wire:model.live="password" id="password" class="form-control japa-input @error('password') is-invalid @enderror" placeholder="••••••••">
            @error('password')
                <span class="text-red fs-16 d-block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label japa-label">Confirm Password</label>
            <input type="password" wire:model.live="password_confirmation" id="password_confirmation" class="form-control japa-input" placeholder="••••••••">
        </div>

        <div class="d-flex flex-column gap-3 mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div wire:loading wire:target="register" class="text-secondary tracking-wide fs-14 text-uppercase font-monospace">
                    Creating profile...
                </div>
            </div>

            <button type="submit" class="btn-japa border-0 w-100 py-3 fw-bold text-uppercase tracking-wider">
                Initialize Driver Profile
            </button>

            <div class="text-center mt-2">
                <span class="text-muted small">Hai già un account?</span>
                <a href="{{ route('login') }}" class="text-red text-decoration-none small ms-1 fw-semibold">
                    Accedi qui
                </a>
            </div>
        </div>

    </form>
</div>
</div>
