<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Wisata</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #F4F8FB;
        }

        .article-card {
            transition: 0.3s;
        }

        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
        }

        .article-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 10px 0 0 10px;
        }
        
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">

            <div>
                <a class="navbar-brand fw-bold" href="{{ route('beranda') }}">
                    Blog Kami
                </a>
                <div style="font-size:12px; color:#ccc;">
                    Artikel terbaru seputar teknologi dan pemrograman
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBlog">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarBlog">

                <ul class="navbar-nav ms-auto me-3">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('beranda') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#artikel">
                            Artikel
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#kategori">
                            Kategori
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">
                            Tentang
                        </a>
                    </li>

                </ul>

                <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                    Login Admin
                </a>

            </div>
        </div>
    </nav>



    <div class="container mt-4">

        <div class="row">

            <!-- Sidebar Kategori -->
            <div class="col-md-3" id="kategori">

                <div class="card border-0 shadow rounded-4 fw-bold rounded-top-4">
                    <div class="card-header bg-success text-white">
                        Kategori
                    </div>

                    <div class="list-group list-group-flush">

                        <a href="{{ route('beranda') }}" class="list-group-item list-group-item-action">
                            Semua Artikel
                        </a>

                        @foreach($kategori as $item)
                            <a href="{{ route('kategori.filter', $item->id) }}"
                                class="list-group-item list-group-item-action">
                                {{ $item->nama_kategori }}
                            </a>
                        @endforeach

                    </div>
                </div>

            </div>

            <!-- Daftar Artikel -->
            <div class="col-md-9" id="artikel">

                <h3 class="mb-3">Artikel Terbaru</h3>

                @forelse($artikel as $item)

                    <div class="card mb-4 border-0 shadow-sm rounded-4 article-card">

                        <div class="row g-0">

                            <div class="col-md-4">
                                <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
                                    class="img-fluid rounded-start w-100 article-img"
                                    alt="{{ $item->judul }}">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">

                                    <h5 class="card-title">
                                        {{ $item->judul }}
                                    </h5>

                                    <div class="mb-2">

                                        <span class="badge bg-success">
                                            {{ $item->kategori->nama_kategori }}
                                        </span>

                                        <small class="text-muted ms-2">
                                            {{ $item->penulis->nama_depan }}
                                            {{ $item->penulis->nama_belakang }}
                                        </small>

                                    </div>

                                    <p class="card-text">
                                        {{ Str::limit(strip_tags($item->isi), 200) }}
                                    </p>

                                    <a href="{{ route('artikel.detail', $item->id) }}" class="btn btn-success btn-sm">
                                        Baca Selengkapnya
                                    </a>

                                </div>
                            </div>

                        </div>

                    </div>

                @empty

                    <div class="alert alert-info">
                        Belum ada artikel.
                    </div>

                @endforelse

            </div>

        </div>

    </div>
    <div id="tentang" class="bg-light mt-5 py-5">
        <div class="container">

            <h3 class="mb-3">Tentang Blog Kami</h3>

            <p class="text-muted">
                Blog Kami merupakan media informasi yang menyajikan artikel
                seputar teknologi, pemrograman, jaringan komputer,
                Internet of Things (IoT), dan Artificial Intelligence (AI).
            </p>

            <p class="text-muted">
                Tujuan website ini adalah memberikan informasi dan wawasan
                kepada pembaca mengenai perkembangan teknologi terkini.
            </p>

        </div>
    </div>
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container text-center">

            <h5>Blog Kami</h5>

            <p class="mb-0">
                © {{ date('Y') }} Blog Kami.
                Semua Hak Dilindungi.
            </p>

        </div>
    </footer>
</body>

</html>