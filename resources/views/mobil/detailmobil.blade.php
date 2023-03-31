@extends('layout.main')

@section('Isi')
    <header class="bg-dark py-1">
        <div class="container px-4 px-lg-2 my-3">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Detail Mobil</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-1">
        <div class="container px-4 px-lg-5 mt-5">

            <div class="row justify-content-center">
                <div class="col-lg-5 mb-1">

                    <div class="card h-100">
                        <!-- Product image-->
                        <div class="badge badge-custom {{ $car->keterangan == 'Tersedia' ? 'bg-success' : 'bg-warning' }}
                            text-white position-absolute"
                            style="top: 0; right: 0">
                            {{-- Tidak Tersedia --}}
                            {{ $car->keterangan }}
                        </div>
                        <img class="card-img-top" src="{{ asset('storage/' . $car->gambar) }}"
                            alt="{{ $car->nama_mobil }}" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-5">
                            <div>

                                <h2 style="text-align: center">{{ $car->nama_mobil }}</h2>

                                <!-- Product name-->
                                <h3 class="fw-bolder text-primary" style="text-align: center">Deskripsi</h3>
                                <p>
                                    {{-- <input type="text" class="form-control form-control-sm" name="id_mobil" id="id_mobil"
                                value="{{ $nama_mobil }}" readonly style="cursor: not-allowed"> --}}
                                    {{ $car->deskripsi }}
                                </p>
                               <div class="mobil-info-list border-top pt-4">
                                    <ul class="list-unstyled">
                                        <li>
                                            @if ($car->p3k == 'Ada')
                                                <i class="nav-icon far fa-check-circle"></i>
                                                <span>P3K</span>
                                            @else
                                                <i class="nav-icon fas fa-ban"></i>
                                                <span>P3K</span>
                                            @endif
                                        </li>

                                        <li>
                                            @if ($car->charger == 'Ada')
                                                <i class="nav-icon far fa-check-circle"></i>
                                                <span>CHARGER</span>
                                            @else
                                                <i class="nav-icon fas fa-ban"></i>
                                                <span>CHARGER</span>
                                            @endif
                                        </li>

                                        <li>
                                            @if ($car->audio == 'Ada')
                                                <i class="nav-icon far fa-check-circle"></i>
                                                <span>AUDIO</span>
                                            @else
                                                <i class="nav-icon fas fa-ban"></i>
                                                <span>AUDIO</span>
                                            @endif
                                        </li>

                                        <li>
                                            @if ($car->ac == 'Ada')
                                                <i class="nav-icon far fa-check-circle"></i>
                                                <span>AC</span>
                                            @else
                                                <i class="nav-icon fas fa-ban"></i>
                                                <span>AC</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">Special Item</h5>
                                    <div class="rent-price mb-3">
                                        <span style="font-size: 1rem" class="text-primary">Rp.
                                            {{ number_format($car->harga_sewa) }}/</span>day
                                    </div>
                                </div>
                                <ul class="list-unstyled list-style-group">

                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Jenis Mobil</span>
                                        <span style="font-weight: 600">{{ $car->merk_mobil }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Bahan Bakar</span>
                                        <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Tahun Mobil</span>
                                        <span style="font-weight: 600">{{ $car->tahun_mobil }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Jumlah Kursi</span>
                                        <span style="font-weight: 600">{{ $car->kursi }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Transmisi</span>
                                        <span style="font-weight: 600">{{ $car->transmisi }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Plat Mobil</span>
                                        <span style="font-weight: 600">{{ $car->plat_mobil }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn d-flex align-items-center justify-content-center btn-warning mt-auto"
                                    style="column-gap: 0.4rem"
                                    onclick="window.location='/mobil/edit/{{ $car->id_mobil }}'">Edit <i
                                        class="ri-whatsapp-line"></i></a>
                            </div>
                            <p></p>
                            {{-- <div>
                                <form method="POST" action="/mobil/hapus/{{ $car->id_mobil }}" style="display: inline;"
                                    onsubmit="return hapusData()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn d-flex align-items-center justify-content-center btn-danger mt-auto"
                                        type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div> --}}

                            <p></p>
                            <div class="text-center">
                                <a class="btn d-flex align-items-center justify-content-center btn-success mt-auto"
                                    href="{{ url('mobil/index') }}" style="column-gap: 0.4rem">Kembali <i
                                        class="ri-whatsapp-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
