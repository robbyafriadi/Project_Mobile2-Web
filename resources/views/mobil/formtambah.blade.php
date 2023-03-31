@extends('layout.main')

@section('Judul')
    Tambah data Mobil
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


                            {{-- <td></td>
                            <td>
                                <button class="btn btn-success" type="submit">
                                    Simpan
                                </button>
                            </td> --}}
                            {{-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            @if (session('msg'))
                                {{ session('msg') }}
                            @endif

                            <form class="form-group" method="POST" action="{{ url('/mobil/simpan') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td> Nama </td>
                                        <td>
                                            <input type="text" name="nama_mobil" id="nama_mobil"
                                                class="form-control form-control-sm 
                            @error('nama_mobil') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('nama_mobil') }}">

                                            @error('nama_mobil')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Jenis Mobil </td>
                                        <td>
                                            {{-- <input type="text" name="merk_mobil" id="nama_mobil"
                                class="form-control form-control-sm 
                                @error('merk_mobil') 
                            is-invalid 
                            @enderror"
                                value="{{ old('merk_mobil') }}">

                            @error('merk_mobil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                                            <select name='merk_mobil' id='merk_mobil' class="form-control form-control-sm">
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
                                                class="form-control form-control-sm
                            @error('tahun_mobil') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('tahun_mobil') }}">

                                            @error('tahun_mobil')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Plat </td>
                                        <td>
                                            <input type="text" name="plat_mobil" id="plat_mobil"
                                                class="form-control form-control-sm
                            @error('plat_mobil') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('plat_mobil') }}">

                                            @error('plat_mobil')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Bahan Bakar </td>
                                        <td>

                                            <select name='bahan_bakar' id='bahan_bakar'
                                                class="form-control form-control-sm">
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

                                            <select name='transmisi' id='transmisi' class="form-control form-control-sm">
                                                <option value="Manual ">Manual </option>
                                                <option value="Matic ">Matic </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Jumlah Kursi </td>
                                        <td>
                                            <input type="number" name="kursi" id="kursi"
                                                class="form-control form-control-sm
                            @error('kursi') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('kursi') }}">

                                            @error('kursi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Harga Sewa </td>
                                        <td>
                                            <input type="number" name="harga_sewa" id="harga_sewa"
                                                class="form-control form-control-sm
                            @error('harga_sewa') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('harga_sewa') }}">

                                            @error('harga_sewa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>

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
                                            <input type="file" name="gambar" id="gambar"
                                                class="form-control form-control-sm  @error('gambar') 
                            is-invalid 
                            @enderror"
                                                accept="image/*">

                                            @error('gambar')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Status Mobil </td>
                                        {{-- <td>
                    <input type="text" name="keterangan" id="keterangan" class="form-control form-control-sm">
                </td> --}}
                                        <td>
                                            <select name='keterangan' id='keterangan' class="form-control form-control-sm">
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Deskripsi Mobil </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="deskripsi" id="deskripsi" cols="50" rows="4"></textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td> P3K </td>
                                        <td>

                                            <select name='p3k' id='p3k' class="form-control form-control-sm">
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Charger </td>
                                        <td>

                                            <select name='charger' id='charger' class="form-control form-control-sm">
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> AC </td>
                                        <td>

                                            <select name='ac' id='ac' class="form-control form-control-sm">
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Audio </td>
                                        <td>

                                            <select name='audio' id='audio' class="form-control form-control-sm">
                                                <option value="Ada ">Ada </option>
                                                <option value="Tidak Ada ">Tidak Ada </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <button class="btn btn-success" type="submit">
                                                Simpan
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
