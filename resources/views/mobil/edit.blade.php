@extends('layout.main')

@section('Judul')
    Edit data Mobil
@endsection

@section('Isi')
    <section class="py-1">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button class="btn btn-primary" type="button" onclick="window.location='/mobil/index'">
                                    &laquo; Kembali
                                </button>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/mobil/update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <table class="table table-sm table-striped">

                                    <tr>
                                        <td> ID </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="id_mobil"
                                                id="id_mobil" value="{{ $id_mobil }}" readonly
                                                style="cursor: not-allowed">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td> Nama </td>
                                        <td>
                                            <input type="text" name="nama_mobil" id="nama_mobil"
                                                value="{{ $nama_mobil }}" class="form-control form-control-sm">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Jenis Mobil </td>
                                        <td>
                                            <select value="{{ $merk_mobil }}" name='merk_mobil' id='merk_mobil'
                                                class="form-control form-control-sm">
                                                <option>{{ $merk_mobil }}</option>
                                                <option value="Mobil SUV ">Mobil SUV </option>
                                                <option value="Mobil MPV ">Mobil MPV </option>
                                                <option value="Mobil Crossover ">Mobil Crossover </option>
                                                <option value="Mobil Hatchback ">Mobil Hatchback </option>
                                                <option value="Mobil Sedan ">Mobil Sedan </option>
                                                <option value="Mobil Sport Sedan">Mobil Sport Sedan</option>
                                                <option value="Mobil LCGC ">Mobil LCGC </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Tahun </td>
                                        <td>
                                            <input type="number" name="tahun_mobil" id="tahun_mobil"
                                                value="{{ $tahun_mobil }}" class="form-control form-control-sm">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Plat </td>
                                        <td>
                                            <input type="text" name="plat_mobil" id="plat_mobil"
                                                value="{{ $plat_mobil }}" class="form-control form-control-sm">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Bahan Bakar </td>
                                        <td>

                                            <select value="{{ $bahan_bakar }}" name='bahan_bakar' id='bahan_bakar'
                                                class="form-control form-control-sm">
                                                <option>{{ $bahan_bakar }}</option>
                                                <option value="Pertalite ">Pertalite </option>
                                                <option value="Pertamax ">Pertamax </option>
                                                <option value="Pertamax Turbo ">Pertamax Turbo </option>
                                                <option value="Pertamina Dex ">Pertamina Dex </option>
                                                <option value="Dexlite ">Dexlite </option>
                                                <option value="Solar">Solar</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Transmisi </td>
                                        <td>

                                            <select value="{{ $transmisi }}" name='transmisi' id='transmisi'
                                                class="form-control form-control-sm">
                                                <option>{{ $transmisi }}</option>
                                                <option value="Manual ">Manual </option>
                                                <option value="Matic ">Matic </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Kursi </td>
                                        <td>
                                            <input type="number" name="kursi" id="kursi" value="{{ $kursi }}"
                                                class="form-control form-control-sm">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Harga Sewa </td>
                                        <td>
                                            <input type="number" name="harga_sewa" id="harga_sewa"
                                                value="{{ $harga_sewa }}" class="form-control form-control-sm">
                                        </td>
                                    </tr>



                                    <tr>
                                        <td> Status Mobil </td>
                                        {{-- <td>
                    <input type="text" name="keterangan" id="keterangan" value="{{ $keterangan }}">
                </td> --}}
                                        <td>
                                            <select value="{{ $keterangan }}" name='keterangan' id='keterangan'
                                                class="form-control form-control-sm">
                                                <option>{{ $keterangan }}</option>
                                                <option>Tersedia</option>
                                                <option>Tidak Tersedia</option>
                                            </select>
                                        </td>
                                    </tr>



                                </table>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-3">
                            <div>
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td> Gambar </td>
                                        <td>
                                            @if ($gambar)
                                                <img src="{{ asset('storage/' . $gambar) }}" class="img-thumbnail"
                                                    style="width: 50%">
                                            @else
                                                <span class="badge badge-danger">Belum ada Foto</span>
                                            @endif

                                            <input type="file"
                                                class="form-control @error('gambar') 
                            is-invalid @enderror"accept="image/*"
                                                name="gambar">

                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror


                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Deskripsi Mobil </td>
                                        <td>
                                            <textarea value="{{ $deskripsi }}" class="form-control form-control-sm" name="deskripsi" id="deskripsi"
                                                cols="50" rows="4">{{ $deskripsi }}</textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td> P3K </td>
                                        <td>

                                            <select value="{{ $p3k }}" name='p3k' id='p3k'
                                                class="form-control form-control-sm">
                                                <option>{{ $p3k }}</option>
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Charger </td>
                                        <td>

                                            <select value="{{ $charger }}" name='charger' id='charger'
                                                class="form-control form-control-sm">
                                                <option>{{ $charger }}</option>
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> AC </td>
                                        <td>

                                            <select value="{{ $ac }}" name='ac' id='ac'
                                                class="form-control form-control-sm">
                                                <option>{{ $ac }}</option>
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Audio </td>
                                        <td>

                                            <select value="{{ $audio }}" name='audio' id='audio'
                                                class="form-control form-control-sm">
                                                <option>{{ $audio }}</option>
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-success" type="submit">
                                                Update
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
