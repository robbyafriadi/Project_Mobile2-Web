@extends('layout.main')

@section('Judul')
    Tambah data User/Pelanggan
@endsection

@section('Isi')
    <section class="py-1">

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-lg-8 mb-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <button class="btn btn-primary" type="button"
                                    onclick="window.location='/pelanggan/datapelanggan/'">
                                    &laquo; Kembali
                                </button>
                            </h3>
                        </div>
                        <div class="card-body">
                            @if (session('msg'))
                                {{ session('msg') }}
                            @endif

                            <form class="form-group" method="POST" action="{{ url('/pelanggan/simpan') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td> Nama Pelanggan </td>
                                        <td>
                                            <input type="text" name="name" id="name"
                                                class="form-control form-control-sm 
                            @error('name') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('name') }}">

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>


                                    <tr>
                                        <td> Email</td>
                                        <td>
                                            <input type="text" name="email" id="email"
                                                class="form-control form-control-sm
                            @error('email') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('email') }}">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Username </td>
                                        <td>
                                            <input type="text" name="username" id="username"
                                                class="form-control form-control-sm
                            @error('username') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('username') }}">

                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Password </td>
                                        <td>
                                            <input type="text" name="password" id="password"
                                                class="form-control form-control-sm
                            @error('password') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('password') }}">

                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> No. Hp </td>
                                        <td>
                                            <input type="number" name="no_hp" id="no_hp"
                                                class="form-control form-control-sm
                            @error('no_hp') 
                            is-invalid 
                            @enderror"
                                                value="{{ old('no_hp') }}">

                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Alamat </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="alamat" id="alamat" cols="50" rows="4"></textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Level Akun </td>
                                        <td>

                                            <select name='level' id='level' class="form-control form-control-sm">
                                                <option value="1 ">1 </option>
                                                <option value="2 ">2 </option>
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
