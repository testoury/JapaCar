<x-layout title="Japa Cars | Pilot Profile">
    <div class="main-collection-container py-5">
        <div class="container">

            <div class="row mb-5 section-header-border pb-3">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="text-eurostile japa-main-title m-0">Pilot Profile</h1>
                        <p class="m-0 mt-1 text-gray">Authenticated access matrix and driver data systems.</p>
                    </div>

                    <div class="japa-profile-pill d-flex align-items-center gap-3">
                        <span class="text-eurostile text-gray fs-16 d-none d-md-inline">
                            Status: Secured
                        </span>
                        <div class="avatar-radar">
                            <div class="radar-ping"></div>
                            <i class="bi bi-shield-lock-fill text-white z-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="card japa-car-card p-4 text-center m-0">
                        <div class="my-3 d-flex justify-content-center">
                            <div
                                class="rounded-circle d-flex align-items-center justify-content-center border border-secondary bg-transparent">
                                <i class="bi bi-person text-red p-4 fs-1"></i>
                            </div>
                        </div>

                        <h3 class="text-eurostile text-white h5 mb-1 mt-2">{{ $user->name }}</h3>
                        <p class="text-red font-monospace small mb-4">ID //
                            #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</p>

                        <hr class="japa-card-divider my-3">

                        <div class="text-start px-2">
                            <div class="mb-2 d-flex justify-content-between align-items-center">
                                <span class="text-eurostile text-gray text-muted small fs-16">Clearance</span>
                                <span class="badge text-uppercase font-monospace bg-secondary">
                                    {{ $user->is_admin ? 'OVERLORD / ADMIN' : 'DRIVER' }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-eurostile text-gray text-muted small fs-16">Enrolled</span>
                                <span
                                    class="text-white font-monospace small">{{ $user->created_at->format('Y.m.d') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="japa-form-container m-0">
                        <div class="d-flex justify-content-between  section-header-border mb-4">
                            <h4 class="text-eurostile text-white fs-6 pb-2 ">Core System
                                Registry
                            </h4>
                            <button class="btn-japa-small mb-3  ">
                                <a href=""
                                    onclick="event.preventDefault(); document.querySelector('#form-delete-user').submit();"><i
                                        class="bi bi-trash  "></i> Delete User</a>
                                <form action="{{ route('userDelete') }}" method="POST" class="d-none"
                                    id="form-delete-user">@csrf @method('delete')</form>
                            </button>
                        </div>

                        <div class="row g-3 ">
                            <div class="col-md-6">
                                <label class="japa-label">Registered Codename</label>
                                <input type="text" class="form-control japa-input" value="{{ $user->name }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="japa-label">Communication Node</label>
                                <input type="text" class="form-control japa-input" value="{{ $user->email }}"
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator my-5"></div>

            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-eurostile text-white h4 mb-2">My Deployed Telemetry</h2>
                    <p class="text-gray m-0">Individual vehicle manifest articles managed by your clearance key.</p>
                </div>
            </div>

            <div class="row g-4">
                @auth

                    @forelse($user->cars as $car)
                        <div class="col-xl-4 col-md-6 d-flex align-items-stretch">
                            <div class="card japa-car-card w-100">

                                <div class="japa-card-img-wrapper1">
                                    <img src="{{ Storage::url($car->image) }}" class="japa-card-img1"
                                        alt="{{ $car->title }}">
                                </div>

                                <div class="card-body japa-card-body d-flex flex-column p-4">
                                    <span class="japa-brand-badge text-red fs-6 mb-2">{{ $car->brand ?? 'JDM' }}</span>
                                    <h4 class="japa-card-title mb-3">{{ $car->title }}</h4>
                                    <p class="japa-card-description mb-4">{{ Str::limit($car->description, 90, '...') }}
                                    </p>

                                    <hr class="japa-card-divider mt-auto">

                                    <div class="d-flex align-items-center justify-content-between pt-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-calendar3 japa-calendar-icon"></i>
                                            <span class="japa-card-date">{{ $car->created_at->format('Y.m.d') }}</span>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <a href="{{ route('car.edit', $car->id) }}"
                                                class="btn-japa-small-modern japa-btn-view">
                                                Modify
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="japa-empty-state text-center p-5">
                                <i class="bi bi-folder2-open text-red mb-3 d-block fs-1"></i>
                                <h4 class="text-eurostile text-white mb-2">No Articles Registered</h4>
                                <p class="text-gray max-width-300 mx-auto mb-4">Your personalized data matrix contains zero
                                    records. Deploy your first profile asset.</p>
                                <a href="{{ route('car.create') }}"
                                    class="nav-btn-create px-4 py-2 fw-bold text-uppercase tracking-wider">
                                    Share Your Legendary
                                </a>
                            </div>
                        </div>
                    @endforelse

                @endauth
            </div>

        </div>
    </div>
</x-layout>
