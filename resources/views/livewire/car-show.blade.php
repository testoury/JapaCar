<div>
    <div class="container py-5 main-collection-container">

        <div class="mb-4">
            <a href="{{ route('car.index') }}" class="btn-japa-small px-3 py-2 text-decoration-none">
                <i class="bi bi-arrow-left me-2"></i> Back to the Showroom
            </a>
        </div>

        <div class="row g-5">
            <div class="col-12 col-lg-7">
                <div
                    class="position-relative overflow-hidden japa-car-card p-2 h-100 d-flex align-items-center justify-content-center">
                    @if ($car->image)
                        <img src="{{ Storage::url($car->image) }}" class="img-fluid rounded" alt="{{ $car->model }}"
                            style="width: 100%; max-height: 550px; object-fit: cover;">
                    @else
                        <div class="w-100 py-5 text-center japa-card-placeholder">
                            <i class="bi bi-car-front d-block mb-3" style="font-size: 4rem;"></i>
                            <span class="text-uppercase tracking-wider font-monospace text-muted">Picture not found</span>
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card h-100 japa-car-card p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <span
                            class="position-absolute top-0 mt-2 bg-danger text-white px-4 py-1 small fw-bold text-uppercase japa-brand-badge shadow">
                            {{ $car->brand }}
                        </span>
                        <h1 class="fw-bold  japa-card-title text-white" style="font-size: 2.5rem;">
                            {{ $car->model }}</h1>

                        <span class="text-red text-eurostile small mb-2 d-block tracking-widest">Legendary Import
                            Spec</span>
                        <div class="row g-3 mb-4">
                            <div class="col-4">
                                <div class="bg-dark border border-secondary rounded p-3 text-center">
                                    <i class="bi bi-cpu-fill text-red fs-4 d-block mb-2"></i>
                                    <span class="text-gray small d-block text-uppercase ">Engine Layout</span>
                                    <strong
                                        class="text-white text-uppercase tracking-wide">{{ $car->engine ?? 'N/A' }}</strong>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-dark border border-secondary rounded p-3 text-center">
                                    <i class="bi bi-speedometer2 text-red fs-4 d-block mb-2"></i>
                                    <span class="text-gray small d-block text-uppercase ">Production Year</span>
                                    <strong class="text-white tracking-wide">{{ $car->year ?? 'N/A' }}</strong>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-dark border border-secondary rounded p-3 text-center">
                                    <i class="bi bi-speedometer2 text-red fs-4 d-block mb-2"></i>
                                    <span class="text-gray small d-block text-uppercase ">Horse power</span>
                                    <strong class="text-white tracking-wide">{{ $car->hp ?? 'N/A' }} HP</strong>
                                </div>
                            </div>
                        </div>

                        <hr class="japa-card-divider my-4">

                        <h5 class="text-eurostile text-white mb-3" style="font-size: 14px; letter-spacing: 0.1em;">
                            Overview & History</h5>
                        <p class="japa-card-description mb-4 fs-6">
                            {{ $car->description ?? 'Nessuna descrizione aggiuntiva fornita per questo veicolo.' }}
                        </p>
                        <div>
                            <h5 class="text-eurostile text-white mb-3" style="font-size: 14px; letter-spacing: 0.1em;">
                                tags</h5>
                            <p class="japa-card-description mb-4 fs-6">

                                {{ $car->tags->pluck('name')->implode(', ') ?? 'Nessun tag aggiunto per questo veicolo.' }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <hr class="japa-card-divider my-4 gap-2">
                        @auth
                            @if ($car->isuserowner())
                                <button class="btn-japa-medium px-3 py-2 me-2">
                                    <a href="{{ route('car.edit', $car) }}" class="text-decoration-none "> <i
                                            class="bi bi-pencil me-2"></i> Edit</a>
                                </button>
                            @endif
                        @endauth
                        @auth
                            @if ($car->isuserowner())
                                <button class="btn-japa-small " wire:click="delete({{ $car->id }})">
                                    <i class="bi bi-trash  "></i> Delete
                                </button>
                            @endif
                        @endauth
                        @if($car->user_id)
                        <button class="btn-japa-small mt-2">
                            <a href="{{ route('user.show', $car->user_id) }}" class="text-decoration-none "><i class="bi bi-person  "></i> Show Profile</a>
                        </button>
@else
 <button class="btn-japa-small mt-2" >
    <a href="#" onclick="alert('This user is not available.'); return false;" class="text-decoration-none text-muted">
        <i class="bi bi-person-x "></i> Unavailable Profile
    </a>
    </button>
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
