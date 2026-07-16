<x-layout title="Japa Cars">
    <div class="container-fluid p-0 overflow-hidden ">
        <div class="row justify-content-center align-items-center  ">
            <div class="col-12 ">
                <div class="headerPic ">
                </div>
            </div>
        </div>
    </div>
    <div class="separator"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-10 text-center">
                <h1 class="text-center text-eurostile text-red fs-2">Do you Know what is JDM ?</h1>
                <p class="text-center fs-5 text-eurostile">Jdm stands for Japanese domestic market, which is a term used to describe the Japanese market for cars.</p>
            </div>

        </div>
    </div>
    <div class="container my-5">
    <div class="row align-items-center japa-card g-0">
        <div class="col-12 col-md-6">
            <div class="japa-card-img-wrapper">
                <img src="/assets/media/imgs/supramk4.jpg" alt="Toyota Supra" class="japa-card-img">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="japa-card-body">
                <span class="text-red fw-bold text-uppercase fs-16 tracking-wider d-block mb-2" style="font-family: 'Eurostile Extended', sans-serif; letter-spacing: 0.2em;">Legendary Series</span>
                <h3 class="japa-card-title mb-3">Toyota Supra MK4</h3>
                <p class="mb-4">
                    The crown jewel of Japanese performance. Engineered with the legendary twin-turbocharged 2JZ-GTE engine, this pristine model brings unparalleled track heritage and unmatched tuning potential straight to your garage.
                </p>
                <a href="{{ route('car.index') }}" class="btn-japa">View Showroom</a>
            </div>
        </div>
    </div>

    <div class="row align-items-center japa-card g-0 flex-md-row-reverse">
        <div class="col-12 col-md-6">
            <div class="japa-card-img-wrapper">
                <img src="/assets/media/imgs/skyline.jpg" alt="Nissan Skyline" class="japa-card-img">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="japa-card-body">
                <span class="text-red fw-bold text-uppercase fs-16 tracking-wider d-block mb-2" style="font-family: 'Eurostile Extended', sans-serif; letter-spacing: 0.2em;">AWD Precision</span>
                <h3 class="japa-card-title mb-3">Nissan Skyline GT-R</h3>
                <p class="mb-4">
                    Dominance redefined. Equipped with the iconic RB26DETT powertrain and the revolutionary ATTESA E-TS all-wheel-drive platform, this masterpiece delivers precise control and breathtaking acceleration.
                </p>
                <a href="{{ route('car.index') }}" class="btn-japa">View Showroom</a>
            </div>
        </div>
    </div>

    <div class="row align-items-center japa-card g-0">
        <div class="col-12 col-md-6">
            <div class="japa-card-img-wrapper">
                <img src="/assets/media/imgs/mazda.jpg" alt="Mazda RX-7" class="japa-card-img">
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="japa-card-body">
                <span class="text-red fw-bold text-uppercase fs-16 tracking-wider d-block mb-2" style="font-family: 'Eurostile Extended', sans-serif; letter-spacing: 0.2em;">Rotary Perfection</span>
                <h3 class="japa-card-title mb-3">Mazda RX-7 FD3S</h3>
                <p class="mb-4">
                    Pure, unfiltered driving dynamics. Featuring a flawless 50:50 weight distribution paired with a high-revving sequential twin-turbo 13B rotary engine, it remains a timeless icon of style and performance.
                </p>
                <a href="{{ route('car.index') }}" class="btn-japa">View Showroom</a>
            </div>
        </div>
    </div>
</div>
  <div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <a href="" class="btn-japa ">
    Share Your Legendary Piece
</a>
        </div>
    </div>
  </div>
</x-layout>
