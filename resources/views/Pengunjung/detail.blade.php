<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $artikel->judul }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F4F8FB;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
        }

        .card-header {
            border: none;
            font-weight: 600;
        }

        .related-item {
            transition: .3s;
        }

        .related-item:hover {
            background: #f4f8fc;
        }

        .article-content {
            font-size: 16px;
            line-height: 1.9;
            color: #444;
        }

        .article-meta {
            font-size: 14px;
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        footer {
            background: #212529;
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

            <div class="ms-auto">

                <a href="{{ route('beranda') }}" class="btn btn-outline-light btn-sm me-2">
                    Beranda
                </a>

                <a href="{{ route('login') }}" class="btn btn-success btn-sm">
                    Login Admin
                </a>

            </div>

        </div>
    </nav>

    <div class="container mt-4">

        <div class="row">

            <!-- Detail Artikel -->
            <div class="col-lg-9">

                <div class="card shadow-sm">

                    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}"
                        class="card-img-top article-image w-100">

                    <div class="card-body">

                        <h1 class="fw-bold mb-3">
                            {{ $artikel->judul }}
                        </h1>

                        <p class="text-muted mb-3 article-meta">
                            <span class="badge bg-success">
                                {{ $artikel->kategori->nama_kategori }}
                            </span>
                            |
                            Penulis:
                            <strong>
                                {{ $artikel->penulis->nama_depan }}
                                {{ $artikel->penulis->nama_belakang }}
                            </strong>
                            <br>
                            {{ $artikel->hari_tanggal }}
                        </p>

                        <hr>

                        <div class="article-content text-justify;">
                            {!! nl2br(e($artikel->isi)) !!}
                        </div>

                    </div>

                </div>

                <div class="mt-3">
                    <a href="{{ route('beranda') }}" class="btn btn-secondary">
                        ← Kembali ke Beranda
                    </a>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">

                <div class="card mb-3">
                    <div class="card-header bg-success text-white py-3">
                        Kategori
                    </div>

                    <div class="list-group list-group-flush">

                        @foreach($kategori as $item)
                            <a href="{{ route('kategori.filter', $item->id) }}"
                                class="list-group-item list-group-item-action related-item">
                                {{ $item->nama_kategori }}
                            </a>
                        @endforeach

                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-success text-white">
                        Artikel Terkait
                    </div>

                    <div class="list-group list-group-flush">

                        @forelse($artikelTerkait as $item)

                            <a href="{{ route('artikel.detail', $item->id) }}"
                                class="list-group-item list-group-item-action">

                                <div class="d-flex">

                                    <img src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        style="width:80px;
                                                    height:60px;
                                                    object-fit:cover;
                                                    border-radius:5px;
                                                    margin-right:10px;">

                                    <div>

                                        <strong style="font-size:14px;">
                                            {{ $item->judul }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            {{ explode('|', $item->hari_tanggal)[0] }}
                                        </small>

                                    </div>

                                </div>

                            </a>

                        @empty

                            <div class="list-group-item">
                                Tidak ada artikel terkait.
                            </div>

                        @endforelse

                    </div>
                </div>

            </div>

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