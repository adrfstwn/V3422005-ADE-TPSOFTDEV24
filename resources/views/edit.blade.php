@extends('main')
@section('content')
<div class="content-wrapper" valign="center">
    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header text-center">
                  <h3 class="card-title">Edit Data Pegawai</h3>
                </div>

                <form action="/dashboard/{{$buku->id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label>Judul Buku</label>
                      <input value="{{$buku->judul_buku}}" type="text" name="judul_buku" class="form-control" id="judul_buku" placeholder="Masukkan Nama" required>
                    </div>
                      <div class="form-group">
                        <label for="agama">Penuli</label>
                        <select class="form-control" id="id_penulis" name="id_penulis">
                            @foreach ($Penulis as $p)
                                <!-- Iterasi data agama -->
                                <option value="{{ $p->id }}" @if ($p->id === $buku->id_penulis) selected @endif>{{ $p->nama_penulis }}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                        <label for="agama">Penulis</label>
                        <select class="form-control" id="id_kategori" name="id_kategori">
                            @foreach ($Kategori as $p)
                                <!-- Iterasi data agama -->
                                <option value="{{ $p->id }}" @if ($p->id === $buku->id_kategori) selected @endif>{{ $p->jenis_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input value="{{$buku->tahun_terbit}}" type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" placeholder="Masukkan NIK" required>
                      </div>
                      <div class="form-group">
                        <label>Penerbit</label>
                        <input value="{{$buku->penerbit}}" type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Masukkan NIK" required>
                      </div>
                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
</div>
@endsection

