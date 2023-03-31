@extends('layout.main')

@section('Judul')
@endsection

@section('Isi')
    <header class="bg-dark py-1">
        <div class="container px-4 px-lg-5 my-3">
            <div class="text-center text-white">
                <h1 class="display-6 fw-bolder">Data Peminjaman Mobil</h1>
                <p class="lead fw-normal text-white-40 mb-0">
                    hanya dengan satu sentuhan
                </p>
            </div>
        </div>
    </header>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/peminjaman/tambah'">
                    + Tambah Data
                </button>

                <a href="{{ url('#') }}" target="_blank" class="btn btn-info" type="button">
                    Cetak Laporan <i class="fas fa-print"></i></a>
                {{-- <button class="btn btn-info" type="button" onclick="window.location='/mobil/datasoft'">
                    Tampil Data SoftDelete
                </button> --}}
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
                            placeholder="Cari data berdasarkan Nama Mobil/Harga Sewa" autofocus="true"
                            value="{{ $cari }}">

                    </div>
                </div>
            </form>
            <table class="table table-bordered table-striped" style="justify-content: center">
                <thead style="text-align: center">
                    <th>NO</th>
                    {{-- <th>Foto Mobil</th> --}}
                    <th>Nama Mobil</th>
                    <th>Plat</th>
                    <th>Harga Sewa</th>
                    <th>Tanggal Pinjam</th>
                    <th>Lama Pinjam</th>
                    <th>Jaminan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>

                </tbody>
            </table>
            {{-- {{ $dataMobil->links() }} --}}


            {{-- {!! $dataMobil->appends(Request::except('page'))->render() !!} --}}
            <script>
                function hapusData() {
                    pesan = confirm('Yakin data ini dihapus ?');
                    if (pesan)
                        return true;
                    else return false;
                }
            </script>
        </div>
    </div>
@endsection
