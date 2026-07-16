<div>
    @if (session()->has('success'))
        <div class="alert alert-dismissible fade show japa-alert mb-4 p-3 d-flex align-items-center justify-content-between animate__animated animate__fadeIn"
            role="alert">
            <div class="d-flex align-items-center">
                <!-- Icona Custom JDM (Tachimetro/Check) -->
                <div class="japa-alert-icon-box me-3 d-flex align-items-center justify-content-center">
                    <i class="bi bi-check-circle-fill text-red fs-4"></i>
                </div>
                <div>
                    <span class="text-eurostile text-white small d-block tracking-wider uppercase"
                        style="font-size: 11px;">System Notification</span>
                    <p class="mb-0 text-red small fw-semibold">{{ session('success') }}</p>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white shadow-none opacity-50" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif
    <!-- Barra di Ricerca Dinamica -->
    <div class="row mb-5 justify-content-center">
        <div class="col-12 col-md-6">
            <div class="position-relative">
                <input type="text" wire:model.live="search" class="form-control japa-input py-3 ps-4"
                    placeholder="Cerca un modello leggendario (es. Supra, Skyline...)">
                <div class="position-absolute end-0 top-50 translate-middle-y me-3 text-red">
                    <i class="bi bi-search fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Griglia delle Auto Reattiva -->
    <div class="row g-4">
        @forelse($cars as $car)
            <div class="col-12 col-md-6 col-lg-4" wire:key="car-{{ $car->id }}">
                <!-- Card Stile Glassmorphism Premium -->
                <div class="card h-100 japa-car-card">

                    <!-- Immagine di Copertina -->
                    <div class="position-relative overflow-hidden japa-card-img-wrapper1">
                        @if ($car->image)
                            <img src="{{ Storage::url($car->image) }}" class="card-img-top w-100 h-100 japa-card-img1"
                                alt="{{ $car->model }}">
                        @else
                            <div
                                class="w-100 h-100 d-flex align-items-center justify-content-center japa-card-placeholder">
                                <i class="bi bi-car-front fs-1"></i>
                            </div>
                        @endif
                        <!-- Badge del Brand -->

                    </div>

                    <!-- Contenuto Interno della Card -->
                    <div class="card-body d-flex flex-column p-4">
                        <span
                            class="bg-danger text-white px-1 py-2  mb-2 text-center  text-uppercase japa-brand-badge">
                            {{ $car->brand }}
                        </span>
                        <h4 class="card-title fw-bold mb-1 japa-card-title">{{ $car->model }}</h4>

                        <!-- Specifiche Tecniche -->
                        <div class="d-flex gap-2 mb-3">
                            <span
                                class="badge bg-dark border border-secondary text-white text-uppercase tracking-wide px-2 py-1"
                                style="font-size: 11px;">
                                <i class="bi bi-cpu-fill text-red me-1"></i>{{ $car->engine ?? 'N/A' }}
                            </span>
                            <span class="badge bg-dark border border-secondary text-white tracking-wide px-2 py-1"
                                style="font-size: 11px;">
                                <i class="bi bi-speedometer2 text-red me-1"></i>{{ $car->year ?? 'N/A' }}
                            </span>
                                <span class="badge bg-dark border border-secondary text-white tracking-wide px-2 py-1"
                                style="font-size: 11px;">
                                <i class="bi bi-speedometer2 text-red me-1"></i>{{ $car->hp ?? 'N/A' }}
                            </span>
                        </div>

                        <p class="small mb-4 flex-grow-1 japa-card-description">
                            {{ Str::limit($car->description, 90, '...') }}
                        </p>

                        <hr class="japa-card-divider">

                        <!-- Footer della Card -->
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center japa-card-date">
                                <i class="bi bi-calendar3 me-2 japa-calendar-icon"></i>
                                {{ $car->created_at->format('d M Y - H:i') }}
                            </div>
                        </div>
                        <div class="d-flex m-2 justify-content-between">
                            <div class="d-flex align-items-center japa-card-date me-2">
                            <a href="{{ route('car.show', $car) }}"
                                class="btn-japa-small  fw-bold text-uppercase tracking-wider">
                                <i class="bi bi-arrow-right me-2"></i> Vedi Dettagli
                            </a>
                            </div>
                            <div>
                                @auth
                                @if ($car->isuserowner())
                                <button class="btn-japa-small  " wire:click="delete({{ $car->id }})">
                                    <i class="bi bi-trash  "></i> Delete
                                </button>
                                @endif
                                @endauth
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @empty
            <!-- Stato Vuoto Dinamico -->
            <div class="col-12 text-center py-5">
                <div class="p-5 japa-empty-state">
                    <i class="bi bi-search-heart fs-1 text-muted mb-3 d-block"></i>
                    <h5 class="text-white mb-2 fw-semibold">Nessun risultato trovato</h5>
                    <p class="text-muted small mb-0">Nessuna auto corrisponde a "{{ $search }}". Prova un altro
                        modello.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
