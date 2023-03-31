@extends('layout.main')

@section('Judul')
    Tambah data Peminjaman
@endsection

@section('Isi')
   

    <section class="py-1">

        <div class="container px-5 px-lg-5 mt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button class="btn btn-primary" type="button"
                                    onclick="window.location='/peminjaman/datapeminjaman'">
                                    &laquo; Kembali
                                </button>
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            @if (session('msg'))
                                {{ session('msg') }}
                            @endif

                            <form class="form-group" method="POST" action="{{ url('/peminjaman/simpan') }}"
                                enctype="multipart/form-data">
                                @csrf
    
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td> ID Pelanggan </td>
                                        <td>
                                            {{-- <input type="text" name="id" id="id"  class="form-control form-control-sm"> --}}

                                            <select name="id" id="id" class="form-control form-control-sm">
                                                <option disabled value="Pilih Pelanggan"></option>
                                                @foreach ($pela as $item)
                                                <option value="{{ $item->id }}"> 
                                                    {{$item->name }}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Nama Mobil </td>
                                        <td>
                                            <select name="id_mobil" id="id_mobil" class="form-control form-control-sm">
                                                <option disabled value="Pilih Mobil"></option>
                                                @foreach ($mob as $item)
                                                <option value="{{ $item->id_mobil }}"> 
                                                    {{$item->nama_mobil }}</option>
                                                    @endforeach
                                            </select>

                                            {{-- <input type="text" name="nama_mobil" id="employee_search" 
                                            class="form-control form-control-sm"
                                            
                                            > --}}
                                            
                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Plat Mobil </td>
                                        <td>
                                            <select name="plat_mobil" id="plat_mobil" class="form-control form-control-sm">
                                                <option disabled value="Pilih Plat Mobil"></option>
                                                @foreach ($mob as $item)
                                                <option value="{{ $item->plat_mobil }}"> 
                                                    {{$item->plat_mobil }}</option>
                                                    @endforeach
                                            </select>

                                            {{-- <input type="text" name="plat_mobil" id="plat_mobil" readonly
                                            style="cursor: not-allowed" class="form-control form-control-sm"
                                            > --}}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Harga Sewa </td>
                                        <td>

                                            {{-- <select name="harga_mobil" id="harga_mobil" 
                                            type="number"
                                            onkeyup="sum();"
                                            class="form-control form-control-sm">
                                                <option disabled value="Pilih harga"></option>
                                                @foreach ($mob as $item)
                                                <option value="{{ $item->harga_sewa }}"> 
                                                    {{$item->harga_sewa }}</option>
                                                    @endforeach
                                            </select> --}}

                                            <input type="number" name="harga_sewa"
                                            onkeyup="sum();"
                                            id="harga_sewa"  class="form-control form-control-sm"
                                                >
                                        </td>
                                    </tr>

                                    {{-- <tr>
                                        <td> Keterangan </td>
                                        <td>
                                            <input type="text" name="keterangan" id="keterangan" readonly
                                                style="cursor: not-allowed" class="form-control form-control-sm">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Gambar Mobil </td>
                                        <td>
                                            <input type="text" name="gambar" id="gambar" readonly
                                                style="cursor: not-allowed" class="form-control form-control-sm">
                                        </td>
                                    </tr> --}}

                                    <tr>
                                        <td> Tanggal Pinjam </td>
                                        <td>
                                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                                                class="form-control form-control-sm 
                            @error('tanggal_pinjam') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('tanggal_pinjam') }}">

                                            @error('tanggal_pinjam')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Lama Pinjam </td>
                                        <td>
                                            <input type="number" name="lama_pinjam" id="lama_pinjam" onkeyup="sum();"
                                                class="form-control form-control-sm ">
                           
                                        </td>
                                    </tr>



                                    <tr>
                                        <td> Total Harga </td>
                                        <td>
                                            <input type="number" name="total_harga" 
                                            onkeyup="sum();"
                                            id="total_harga" readonly
                                                style="cursor: not-allowed" class="form-control form-control-sm">
                                        </td>
                                    </tr>
                                    <tr></tr>
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

                {{-- <div class="col-lg-6 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-3">
                            <div>
                                <table class="table table-sm table-striped">
                                    

                                    <tr>
                                        <td> Jaminan (KTP) </td>
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
                                    <tr></tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    <script>
        function sum() {
            var txtFirstNumberValue = document.getElementById('harga_sewa').value;
            var txtSecondNumberValue = document.getElementById('lama_pinjam').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNan(result)) {
                document.getElementById('total_harga').value=result;
            }
        }
        </script>
@endsection


