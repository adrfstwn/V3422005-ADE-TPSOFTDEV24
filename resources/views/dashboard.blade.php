@extends('main')
@section('content')

<div class="content-wrapper">
    <br>
    <br>
    <div class="content-header">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="text-align: center;">
                    <h2 class="card-title text-center w-100 my-auto" style="margin-left: 100px; font-size: 24px; font-weight: bold;">Tabel Pegawai</h2>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ route('create')}}" class="btn btn-primary ml-auto">Tambah Data</a>
                        </div>
                    </div>
                </div>
            <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-bordered table-hover text-nowrap" style="width: 100%; padding: 20px;">
                    <thead>
                    <tr>
                        <th class="text-center">Judul Buku</th>
                        <th class="text-center">Penulis</th>
                        <th class="text-center">Tahun Terbit</th>
                        <th class="text-center">Penerbit</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($buku as $p)
                        <tr>
                            <td style="width: 10%">{{ $p->judul_buku }}</td>

                            <td  style="width: 10%">
                                @if ($p->Penulis)
                                    {{ $p->Penulis->nama_penulis }}
                                @else
                                    -
                                @endif
                            </td>

                            <td style="width: 10%">{{ $p->tahun_terbit }}</td>
                            <td style="width: 10%">{{ $p->penerbit }}</td>

                            <td  style="width: 10%">
                                @if ($p->Kategori)
                                    {{ $p->Kategori->jenis_kategori }}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="width: 10%">
                                <a href="/dashboard/{{ $p->id }}/edit" class="btn btn-primary"><i class="fas fa-pen"></i></a>

                                <form action="dashboard/{{ $p->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>
</div>
      @push('scripts')
      <script src="{{ asset('js/hapus.js') }}"></script>
      @endpush
@endsection

