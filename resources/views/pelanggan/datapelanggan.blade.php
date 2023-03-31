@extends('layout.main')

@section('Judul')
    Data Pelanggan
@endsection

@section('Isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-success" type="button" onclick="window.location='/pelanggan/tambah'">
                    + Tambah Data
                </button>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <p>
                    {{ session('msg') }}
                </p>
            @endif
            <form method="GET">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">
                        Cari Data
                    </label>
                    <div class="col-sm-10">
                        <input type="text" name="cari" id="cari" class="form-control"
                            placeholder="Cari data berdasarkan Nama Pelanggan" autofocus="true" value="{{ $cari }}">

                    </div>
                </div>
            </form>
            <table class="table table-bordered table-striped" style="justify-content: center">
                <thead style="text-align: center">
                    {{-- <th>NO</th> --}}
                    <th>Nama Pelanggan</th>
                    <th>Email</th>
                    <th>Username</th>
                    {{-- <th>Password</th> --}}
                    <th>No. Hp</th>
                    <th>Alamat</th>
                    <th>Level</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                    {{-- @php
                        $nomor = 1 + ($dataPelanggan->currentPage() - 1) * $dataPelanggan->perPage();
                    @endphp --}}
                    @foreach ($dataPelanggan as $d)
                        <tr style=" text-align: center;">
                            {{-- <td>{{ $nomor++ }}</td> --}}
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->username }}</td>
                            {{-- <td>{{ $d->password }}</td> --}}
                            <td>{{ $d->no_hp }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>{{ $d->level }}</td>
                            <td>
                                <button class="btn  btn-warning" type="button"
                                    onclick="window.location='/pelanggan/edit/{{ $d->id }}'">
                                    Edit
                                </button>

                                <form method="POST" action="/pelanggan/hapus/{{ $d->id }}" style="display: inline;"
                                    onsubmit="return hapus()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $dataPelanggan->links() }} --}}

            {{-- {!! $dataPelanggan->appends(Request::except('page'))->render() !!} --}}
            <script>
                function hapus() {
                    pesan = confirm('Yakin data ini dihapus ?');
                    if (pesan)
                        return true;
                    else return false;
                }
            </script>
        </div>
    </div>
@endsection
