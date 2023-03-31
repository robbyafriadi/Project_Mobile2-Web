<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Akun</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h2"><b>Pendaftaran
                        <p></p>
                    </b>Akun</a>
            </div>
            <div class="card-body">
                @if (session('msg'))
                    {{ session('msg') }}
                @endif

                <form class="form-group" method="POST" action="{{ url('/login/simpan') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <table class="table table-sm table-striped">
                        <tr>
                            <td> Nama </td>
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
                            <td> Email </td>
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
                            <td> Alamat</td>
                            <td>
                                <textarea name="alamat" id="alamat" cols="50" rows="4" class="form-control form-control-sm"></textarea>

                            </td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-success" type="submit">
                                    Simpan
                                </button>

                                <button class="btn btn-primary" type="button" onclick="window.location='/'">
                                    Kembali </button>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td></td>
                            <td>
                                <button href="{{ url('/') }}" class="btn primary">
                                    Simpan
                                </button>
                            </td>
                        </tr> --}}
                    </table>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
</body>

</html>
