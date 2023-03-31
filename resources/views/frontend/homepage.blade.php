@extends('layout.mainfront')

@section('Isi')
    <header class="bg-dark py-1">
        <div class="container px-4 px-lg-5 my-3">
            <div class="text-center text-white">
                <h1 class="display-6 fw-bolder">Sewa Mobil</h1>
                <p class="lead fw-normal text-white-40 mb-0">
                    hanya dengan satu sentuhan
                </p>
            </div>
        </div>
    </header>
    <section class="py-2">
        <div class="container px-1 px-lg-1 mt-1">
            <h3 class="text-center mb-5">Daftar Mobil </h3>
            <form method="GET">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">
                        Cari Data
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="cari" id="cari" class="form-control"
                            placeholder="Cari data berdasarkan Nama Mobil/Harga Sewa" autofocus="true"
                            value="{{ $cari }}">
                    </div>
                </div>
            </form>


            <div class="row gx-1 gx-lg-1 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($cars as $car)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge badge-custom {{ $car->keterangan == 'Tersedia' ? 'bg-success' : 'bg-warning' }}
                                     text-white position-absolute"
                                style="top: 0; right: 0">
                                {{-- Tidak Tersedia --}}
                                {{ $car->keterangan }}
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/' . $car->gambar) }}"
                                alt="{{ $car->nama_mobil }}" style="height: 30%; width: 100%; " />
                            <!-- Product details-->
                            <div class="card-body
                                card-body-custom pt-1">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5>
                                    <!-- Product price-->
                                    <div class="rent-price mb-3">
                                        <span class="text-primary">Rp. {{ number_format($car->harga_sewa) }}/</span>day
                                    </div>
                                    <ul class="list-unstyled list-style-group">
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Transmisi</span>
                                            <span style="font-weight: 600">{{ $car->transmisi }}</span>
                                        </li>
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Jumlah Kursi</span>
                                            <span style="font-weight: 600">{{ $car->kursi }}</span>
                                        </li>
                                        <li class="border-bottom p-2 d-flex justify-content-between">
                                            <span>Bahan Bakar</span>
                                            <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">
                                    {{-- <a class="btn btn-primary mt-auto"
                                        href="{{ url('/peminjaman/tambahpeminjaman', $car->id_mobil) }}">Sewa</a> --}}
                                    @if ($car->keterangan == 'Tersedia')
                                        <a class="btn btn-primary mt-auto" href="https://wa.link/wvi7n5">Sewa</a>
                                    @endif

                                    <a class="btn btn-info mt-auto text-white"
                                        href="{{ url('/frontend/detail', $car->nama_mobil) }}">Detail</a>
                                </div>
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
