<div>
<div class="japa-form-container w-100 mx-auto" style="max-width: 500px;">

    <div class="text-center mb-4">
        <span class="text-red text-eurostile small tracking-widest uppercase d-block mb-1" style="font-size: 11px;">
            Access Terminal
        </span>
        <h2 class="text-eurostile text-white japa-form-title m-0">
            Account <span class="text-red">Login</span>
        </h2>
        <p class="text-muted small mt-2">Sign in to manage your legendary import assets</p>
    </div>

    <form wire:submit="login">

        <div class="mb-4">
            <label for="email" class="form-label japa-label">Email Address</label>
            <input type="email" wire:model.live.blur="email" id="email" class="form-control japa-input @error('email') is-invalid @enderror" placeholder="name@example.com" autofocus>
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

        <div class="mb-4 d-flex align-items-center">
            <input type="checkbox" wire:model="remember" id="remember" class="form-check-input bg-dark border-secondary shadow-none me-2" style="cursor: pointer;">
            <label for="remember" class="form-label japa-label m-0 select-none" style="cursor: pointer; font-size: 13px;">
                Remember me on this device
            </label>
        </div>

        <div class="d-flex flex-column gap-3 mt-5">
            <div wire:loading wire:target="login" class="text-secondary tracking-wide fs-14 text-uppercase font-monospace">
                Verifying credentials...
            </div>

            <button type="submit" class="btn-japa border-0 w-100 py-3 fw-bold text-uppercase tracking-wider">
                Authenticate Profile
            </button>

            <div class="text-center mt-2">
                <span class="text-muted small">Don't have an account yet?</span>
                <a href="{{ route('register') }}" class="text-red text-decoration-none small ms-1 fw-semibold">
                    Register here
                </a>
            </div>
        </div>

    </form>
</div>
</div>
