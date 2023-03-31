<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>


    <title>Cetak data mobil</title>
</head>

<body>
    {{-- <div class="image">
        <img src="{{ asset('/') }}dist/img/rental.jpg" class="img-size-50 mr-3 img-circle" alt="User Image">
    </div> --}}
    <div class="form-group">
        <h1 align="center"> Laporan Data Mobil</h1>
        <h3 align="center"> Rental Mobil STMIK Jayanusa Padang</h3>
        <h3 align="center"> Jl. Damar Kota Padang</h3>

        <p align="center">==============================================================</p>
        <table align="center" rules="all" border="1px" style="width: 95%" class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Nama Mobil</th>
                <th>Jenis</th>
                <th>Tahun </th>
                <th>Plat</th>
                <th>Bahan Bakar</th>
                <th>Transmisi</th>
                <th>Kursi</th>
                <th>Harga Sewa</th>
                <th>Status</th>
            </tr>
            @php $i = 1 @endphp
            @foreach ($dataMobil as $d)
                {{-- <th>{{ $lopp->iteration }}</th> --}}
                <tr>
                    <th>{{ $i++ }}</th>
                    <th>{{ $d->nama_mobil }}</th>
                    <th> {{ $d->merk_mobil }}</th>
                    <th> {{ $d->tahun_mobil }}</th>
                    <th> {{ $d->plat_mobil }}</th>
                    <th> {{ $d->bahan_bakar }}</th>
                    <th> {{ $d->transmisi }}</th>
                    <th> {{ $d->kursi }}</th>
                    <th> {{ $d->harga_sewa }}</th>
                    <th> {{ $d->keterangan }}</th>
                </tr>
            @endforeach

        </table>
        <br>
        <p align="center"><b>Padang, {{ $time }}</b></p>
        <p align="center"><b>Pimpinan Rental Mobil</b></p>
        <br> <br> <br>
        <p align="center"><b>...................</b></p>

    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
