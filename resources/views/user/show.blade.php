<x-layout>
    <div class="main-collection-container py-5">
        <div class="container">

            <div class="row mb-5 section-header-border pb-3">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="text-eurostile japa-main-title m-0">Pilot Showroom</h1>
                        <p class="m-0 mt-1 text-gray">Viewing verified platform garage manifest for :
                            {{ $user->name }}.</p>
                    </div>

                    <div class="japa-profile-pill d-flex align-items-center gap-3">
                        <span class="text-eurostile text-gray fs-16 d-none d-md-inline">
                            Clearance: Verified
                        </span>
                        <div class="avatar-radar">
                            <div class="radar-ping"></div>
                            <i class="bi bi-eye-fill text-white z-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-12">
                    <div class="card japa-car-card p-4">
                        <div class="d-flex flex-column flex-md-row align-items-center gap-4 text-center text-md-start">
                            <div class="rounded-circle d-flex align-items-center justify-content-center border border-secondary bg-transparent">
                                <i class="bi bi-person text-red p-4 fs-2"></i>
                            </div>
                            <div>
                                <h2 class="text-eurostile text-white h4 mb-1">{{ $user->name }}</h2>
                                <p class="text-muted font-monospace small m-0">ENROLLED PILOT MATRIX // SECTOR
                                    #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                            <div class="ms-md-auto text-md-end">
                                <span class="badge text-uppercase font-monospace bg-secondary px-3 py-2">
                                    {{ $user->is_admin ? 'OVERLORD / ADMIN' : 'DRIVER' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-eurostile text-white h4 mb-2">Public Garage Manifest</h3>
                    <p class="text-gray m-0">All entries published to the network matrix by this account.</p>
                </div>
            </div>

            <div class="row g-4">
                @forelse($user->cars as $car)
                    <div class="col-xl-4 col-md-6 d-flex align-items-stretch">
                        <div class="card japa-car-card w-100">

                            <div class="japa-card-img-wrapper1">
                                <img src="{{  Storage::url($car->image) }}"
                                    class="japa-card-img1" alt="{{ $car->title }}">
                            </div>

                            <div class="card-body japa-card-body d-flex flex-column p-4">
                                <span class="japa-brand-badge text-red fs-6 mb-2">{{ $car->brand ?? 'JDM' }}</span>
                                <h4 class="japa-card-title mb-3">{{ $car->title }}</h4>
                                <p class="japa-card-description mb-4">{{ Str::limit($car->description, 90, '...') }}</p>

                                <hr class="japa-card-divider mt-auto">

                                <div class="d-flex align-items-center justify-content-between pt-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-calendar3 japa-calendar-icon"></i>
                                        <span class="japa-card-date">{{ $car->created_at->format('Y.m.d') }}</span>
                                    </div>

                                    <a href="{{ route('car.show', $car->id) }}"
                                        class="btn-japa-small-modern japa-btn-view">
                                        See Details
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="japa-empty-state text-center p-5">
                            <i class="bi bi-folder2-open text-muted mb-3 d-block fs-1"></i>
                            <h4 class="text-eurostile text-white mb-2">Garage Empty</h4>
                            <p class="text-gray max-width-300 mx-auto m-0">This pilot hasn't indexed any JDM hardware rows to the platform yet.</p>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-layout>
