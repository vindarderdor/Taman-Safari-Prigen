@extends('pages.app')

@section('content')

<style>

/* Highlights */
.highlights {
    padding: 50px 0;
    background: #fff;
}

.highlights h2 {
    text-align: center;
    margin-bottom: 30px;
}

.highlights .row {
    display: flex;
    gap: 20px;
    justify-content: space-around;
}

.highlights .col {
    text-align: center;
    flex: 1;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background: #f9f9f9;
}

.highlights .col i {
    font-size: 2rem;
    color: #90C659;
    margin-bottom: 10px;
}
</style>
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown" style="font-family: 'Mikado', sans-serif; font-weight: 900; margin: 0;">About</h1>
            <nav aria-label="breadcrumb" class="animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="about-intro">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-5 mb-4" style="font-family: 'Mikado', sans-serif; font-weight: 900; margin: 0;"> <span style="color: #90C659;">Tentang Kami</span></h1>
                    <p>
                        Taman Safari Prigen adalah destinasi wisata konservasi satwa yang terletak di kaki Gunung Arjuno, Pasuruan, Jawa Timur. 
                        Dengan luas area lebih dari 350 hektar, Taman Safari Prigen tidak hanya menawarkan pengalaman safari yang mendebarkan, 
                        tetapi juga memberikan edukasi tentang pentingnya menjaga keberlangsungan habitat satwa liar.
                    </p>
                    <p>
                        Taman ini merupakan rumah bagi lebih dari 2.500 hewan dari berbagai belahan dunia, termasuk spesies yang dilindungi 
                        seperti harimau putih, panda merah, dan gajah Sumatera. Selain itu, pengunjung juga dapat menikmati berbagai zona rekreasi 
                        dan wahana yang cocok untuk keluarga.
                    </p>
                    <a href="/contact" class="btn btn-primary">Contact Us</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="{{ asset('') }}landing/img/map.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>

    <section class="highlights">
        <div class="container"><h1 class="display-5 mb-4" style="text-align: center; font-family: 'Mikado', sans-serif; font-weight: 900; margin: 0;"><span style="color: #90C659;">Kenapa harus mengunjungi </span><br>
            <span style="color: #274E13;">Taman Safari Prigen?</span></h1>
            <div class="row">
                <div class="col">
                    <i class="fas fa-tree"></i>
                    <h3>Zona Safari</h3>
                    <p>Nikmati pengalaman melihat satwa liar dari dekat dengan kendaraan pribadi atau bus safari.</p>
                </div>
                <div class="col">
                    <i class="fas fa-baby-carriage"></i>
                    <h3>Zona Baby Zoo</h3>
                    <p>Bermain dengan satwa kecil yang lucu seperti anak singa, bayi orangutan, dan masih banyak lagi.</p>
                </div>
                <div class="col">
                    <i class="fas fa-water"></i>
                    <h3>Zona Rekreasi</h3>
                    <p>Jelajahi wahana seru, pertunjukan satwa, dan area bermain air yang cocok untuk keluarga.</p>
                </div>
                <div class="col">
                    <i class="fas fa-globe"></i>
                    <h3>Konservasi</h3>
                    <p>Ambil bagian dalam upaya perlindungan satwa langka dan pelestarian keanekaragaman hayati.</p>
                </div>
            </div>
        </div>
    </section>
@endsection