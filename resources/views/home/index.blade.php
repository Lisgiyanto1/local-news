@extends('layouts.frontend.app',[
'title' => 'Home',
])
@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url({{ asset('img/bg') }}/banner1.png);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Hero Content -->
                <div class="hero-content text-center">
                    <h2>Selamat Datang di Local News</h2>
                    <a href=" {{ route('artikel') }}" class="btn clever-btn">Berita Online</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

<div class="regular-page-area section-padding-100 mt-5 mb-4">
    <div class="col-lg-9 mx-auto">
        <div
            class="card inner-body shadow-sm p-3 mb-5 bg-blue rounded mx-auto mt-3 mb-3 col-lg-10 col-md-10 col-sm-10 col-xs-10 col-10 col-xl-10">
            <div class=" card-header shadow-sm p-3 mb-5 bg-white rounded mx-auto mt-3 mb-3 col-lg-10 col-md-10 col-sm-10 col-xs-10 col-10 col-xl-10 "
                style=" background-color: #f5f5f5; font-family: 'Tahoma' , sans-serif; font-size: 18pt; font-weight: bold; text-align: center; color: #000000;">
                Local News</div>
            <div class="card-body, shadow-sm p-3 mb-5 bg-white rounded mx-auto mt-3 mb-3 col-lg-10 col-md-10 col-sm-10 col-xs-10 col-10 col-xl-10 
            
            ">
                <p class="card-text" style="text-align: justify; text-indent: 0.5in; line-height: 1.5em; margin-bottom: 0.35cm;
                font-family: 'Tahoma', sans-serif; font-size: 14pt; font-weight: normal;
                ">
                    <strong>Local News</strong> adalah penyedia berita online terkini yang berfokus pada isu-isu terkait
                    dengan
                    negara
                    Indonesia. Dengan jaringan luas dan tim jurnalis yang berdedikasi, Local News memberikan informasi
                    yang akurat, mendalam, dan terpercaya kepada pembacanya.

                    Sebagai penyedia berita lokal, Local News memahami betapa pentingnya pemahaman yang mendalam tentang
                    isu-isu yang mempengaruhi masyarakat Indonesia. Tim jurnalis kami terus melakukan riset dan
                    investigasi untuk menghadirkan berita terkini dan terkualitas kepada pembaca, dengan tujuan membantu
                    mereka memahami secara komprehensif berbagai isu penting di negara ini.

                    Local News meliput beragam topik yang mencakup politik, ekonomi, sosial, budaya, lingkungan,
                    kesehatan, teknologi, olahraga, dan masih banyak lagi. Dalam setiap liputannya, Local News berusaha
                    memberikan sudut pandang yang beragam dan seimbang, memperhatikan keberagaman pendapat dan
                    mempromosikan ruang diskusi yang sehat.

                    Selain berita terkini, Local News juga menyediakan artikel opini, wawancara, dan laporan khusus yang
                    membahas isu-isu penting yang mungkin terlewatkan oleh media lain. Dengan menyajikan konten yang
                    mendalam dan mendetail, Local News berkomitmen untuk menjaga kualitas informasi yang disampaikan
                    kepada pembaca.

                    Local News juga memahami pentingnya pemberitaan daerah. Melalui kolaborasi dengan koresponden di
                    berbagai wilayah Indonesia, kami mencakup berita-berita lokal yang mencerminkan kehidupan dan
                    peristiwa yang terjadi di tingkat lokal. Dengan demikian, Local News tidak hanya menjadi sumber
                    informasi nasional, tetapi juga memberikan penghargaan pada keragaman dan kompleksitas negara ini.

                    Dengan platform online yang mudah diakses, Local News memungkinkan pembaca untuk mendapatkan berita
                    terkini kapan saja dan di mana saja. Kami juga mendorong partisipasi pembaca melalui komentar, umpan
                    balik, dan berbagi berita, sehingga tercipta komunitas yang aktif dan berdiskusi.

                    Local News berkomitmen untuk menjadi mitra tepercaya dalam memberikan berita terkini tentang
                    Indonesia. Dengan integritas jurnalistik yang tinggi dan fokus pada kualitas informasi, kami
                    berharap dapat memberikan pemahaman yang lebih baik tentang isu-isu penting dalam negeri ini kepada
                    masyarakat Indonesia.
                </p>
            </div>
        </div>
    </div>
</div>

@if($pengumuman->count() > 0)
<section class="upcoming-events section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Pengumuman Terbaru</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($pengumuman as $pn)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                    <!-- Events Thumb -->
                    <div class="events-thumb">
                        <img src="{{ asset('img/bg') }}/pengumuman.png" alt="">
                        <h6 class="event-date">{{ $pn->tgl }} | BY : {{ $pn->user->name }}</h6>
                        <h4 class="event-title">{{ $pn->judul }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('pengumuman.show',$pn->slug) }}" class="btn btn-primary col-lg">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <a href="{{ route('pengumuman') }}" class="alert alert-success alert-link mx-auto">Lihat Semua
                Pengumuman</a>
        </div>
    </div>
</section>
@endif

@if($artikel->count() > 0)
<!-- ##### Artikel ##### -->
<section class="blog-area section-padding-100-0 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Artikel Terbaru</h3>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach($artikel as $art)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ $art->judul }}

                        <span class="badge badge-danger float-right">Author : {{ $art->user->name }}</span>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset($art->getThumbnail()) }}" width="100%"
                            style="height: 300px; object-fit: cover; object-position: center;">

                        <div class="card-text mt-3">
                            {!! Str::limit($art->deskripsi) !!}
                        </div>

                        <a href="{{ route('artikel.show',$art->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <span class="float-right">{{ $art->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <span class="badge badge-primary float-right">kategori :
                            {{ $art->kategoriArtikel->nama_kategori }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row mt-3">
            <a href="{{ route('artikel') }}" class="alert alert-success alert-link mx-auto">Lihat Semua Artikel</a>
        </div>
    </div>
</section>
@endif

@stop