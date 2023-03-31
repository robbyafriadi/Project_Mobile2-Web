@extends('layout.main')

@section('Judul')
    Data SoftDelete Mobil
@endsection

@section('Isi')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">

        <button class="btn btn-primary"  type="button" onclick="window.location='/mobil/index'">
            &laquo; Kembali
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
<center>
        <table class="table table-sm table-bordered table-striped">
        <thead align="center">
         <th>No</th> 
         <th>Nama</th>   
         <th>Merek</th> 
         <th>Tahun Mobil</th> 
         <th>Plat Mobil</th> 
         <th>Kursi</th> 
         <th>Harga Sewa</th> 
         <th>Gambar</th> 
         <th>Keterangan</th> 
         <th>Aksi</th> 
        </thead>
        <tbody>
            @foreach ($dataMobil as $d)
                <tr style="text-align: center">
                    <td >{{ $loop->iteration}}</td>
                    <td>{{ $d->nama_mobil }}</td>
                    <td>{{ $d->merk_mobil }}</td>
                    <td>{{ $d->tahun_mobil }}</td>
                    <td>{{ $d->plat_mobil }}</td>
                    <td>{{ $d->kursi }}</td>
                    <td>{{ $d->harga_sewa }}</td>
                    <td>{{ $d->gambar }}</td>
                    <td>{{ $d->keterangan }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" type="button" onclick="restore('{{ $d->id_mobil }}')">
                            Restore
                        </button>

                        <form method="POST" action="/mobil/forceDelete/{{ $d->id_mobil }}" 
                            style="display: inline;"
                            onsubmit="return hapusData()">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            Hapus Permanen
                        </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </center>
    <script>
        function restore(id_mobil){
        pesan = confirm('Yakin data ini di-restore ?');
        if(pesan){
            window.location = '/mobil/restore/' + id_mobil
        }
    }

    function hapusData(){
        pesan = confirm('Yakin data ini dihapus secara Permanen ?');
        if(pesan)
            return true;
        else return false;
        }
    </script>
  </div>
</div>
@endsection
