@extends('layout.main')

@section('Judul')
    Edit data User/Pelanggan
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

                            <form class="form-group" method="POST" action="{{ url('/pelanggan/update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <table class="table table-sm table-striped">

                                    <tr>
                                        <td> ID </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="id"
                                                id="id" value="{{ $id }}" readonly
                                                style="cursor: not-allowed">
                                        </td>

                                    </tr>

                                    <tr>
                                        <td> Nama Pelanggan </td>
                                        <td>
                                            <input type="text" name="name" id="name"
                                                class="form-control form-control-sm" value="{{ $name }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Email </td>
                                        <td>
                                            <input type="text" name="email" id="email"
                                                class="form-control form-control-sm" value="{{ $email }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Username</td>
                                        <td>
                                            <input type="text" name="username" id="username"
                                                class="form-control form-control-sm" value="{{ $username }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Password</td>
                                        <td>
                                            <input type="text" name="password" id="password"
                                                class="form-control form-control-sm" value="{{ $password }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> No. Hp</td>
                                        <td>
                                            <input type="text" name="no_hp" id="no_hp"
                                                class="form-control form-control-sm" value="{{ $no_hp }}">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td> Alamat </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="alamat" id="alamat" cols="50" rows="4">
                                                {{ $alamat }}
                                            </textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Level Akun </td>
                                        <td>

                                            <select name='level' id='level' class="form-control form-control-sm">
                                                <option>{{ $level }}</option>
                                                <option value="1 ">1 </option>
                                                <option value="2 ">2 </option>
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
