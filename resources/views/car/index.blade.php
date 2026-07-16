<x-layout title="Japa-Cars Collection | Showroom">
    <div class="container py-5 main-collection-container">

        <!-- Header Sezione Bilanciato -->
        <div class="d-flex justify-content-between align-items-center flex-column mb-5 p-3 section-header-border gap-2">
            <img src="{{ asset('assets/media/imgs/jcLogo.png') }}" class="img-fluid jc-logo-showroom" alt="Japa-Cars Logo">
            <p class="text-center text-eurostile text-red fs-5 ">Explore Our Customers'<br>Legendary Collection</p>
            <a href="{{ route('car.create') }}" class="nav-btn-create px-4 py-2 fw-bold text-uppercase tracking-wider">
                Share Your Legendary
            </a>
        </div>

        <!-- Griglia delle Auto -->
        <livewire:car-index />
</x-layout>
