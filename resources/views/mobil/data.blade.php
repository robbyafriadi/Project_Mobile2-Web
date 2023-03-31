@extends('layout.main')

@section('Judul')
    Data Mobil
@endsection

@section('Isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-primary" type="button" onclick="window.location='/mobil/tambah'">
                    + Tambah Data
                </button>
                <button class="btn btn-info" type="button" onclick="window.location='/mobil/datasoft'">
                    Tampil Data SoftDelete
                </button>

                <a href="{{ url('mobil/laporan') }}" target="_blank" class="btn btn-info" type="button">
                    Cetak Laporan <i class="fas fa-print"></i></a>
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
                    <th>FOTO MOBIL</th>
                    <th>@sortablelink ('mobil','NAMA MOBIL')</th>
                    {{-- <th>@sortablelink ('mobil','Jenis')</th> --}}
                    {{-- <th>@sortablelink ('mobil','Tahun')</th> --}}
                    <th>PLAT</th>

                    {{-- <th>@sortablelink ('mobil','Kursi')</th> --}}
                    <th>@sortablelink ('mobil','HARGA SEWA')</th>

                    <th>@sortablelink ('mobil','STATUS')</th>
                    <th>AKSI</th>
                </thead>
                <tbody>
                    @php
                        $nomor = 1 + ($dataMobil->currentPage() - 1) * $dataMobil->perPage();
                    @endphp
                    @foreach ($dataMobil as $d)
                        <tr style=" text-align: center;">
                            <td>{{ $nomor++ }}</td>
                            <td><img src="{{ asset('storage/' . $d->gambar) }}" style="width: 50%; ">
                            </td>

                            <td>{{ $d->nama_mobil }}</td>
                            {{-- <td>{{ $d->merk_mobil }}</td> --}}
                            {{-- <td>{{ $d->tahun_mobil }}</td> --}}
                            <td>{{ $d->plat_mobil }}</td>

                            <td>{{ $d->harga_sewa }}</td>

                            <td>{{ $d->keterangan }}</td>
                            <td>
                                <button class="btn  btn-warning" type="button"
                                    onclick="window.location='/mobil/edit/{{ $d->id_mobil }}'">
                                    Edit
                                </button>

                                <form method="POST" action="/mobil/hapus/{{ $d->id_mobil }}" style="display: inline;"
                                    onsubmit="return hapusData()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                                {{-- @foreach ($cars as $car) --}}
                                <a class="btn btn-info mt-auto text-white"
                                    href="{{ url('/mobil/detailmobil', $d->nama_mobil) }}">Detail</a>
                                {{-- @endforeach --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $dataMobil->links() }} --}}


            {!! $dataMobil->appends(Request::except('page'))->render() !!}
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
