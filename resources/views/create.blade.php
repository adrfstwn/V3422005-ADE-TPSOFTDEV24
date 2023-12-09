@extends('main')
@section('content')
<div class="content-wrapper" valign="center">
    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header text-center">
                  <h3 class="card-title text-center">Tambah Data Pegawai</h3>
                </div>

                <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="card-body">

                    <div class="form-group">
                      <label>Judul Buku</label>
                      <input type="text" name="judul_buku" class="form-control" id="judul_buku" placeholder="Masukkan Nama" required>
                    </div>

                      <div class="form-group">
                        <label for="statusPegawai">Nama Penulis</label>
                        <select class="form-control" id="id_penulis" name="id_penulis" required>
                            @foreach ($Penulis as $sp)
                            <!-- Iterasi data agama -->
                                <option value="{{ $sp->id }}">{{ $sp->nama_penulis }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="jenisKelamin">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            @foreach ($Kategori as $jk)
                            <!-- Iterasi data agama -->
                                <option value="{{ $jk->id }}">{{ $jk->jenis_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control" id="tahun_terbit" placeholder="Masukkan Nama" required>
                      </div>

                      <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" id="penerbit" placeholder="Masukkan Nama" required>
                      </div>

                    <br>
                    </div>
                      </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!--Validasi From Error -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <!-- /.card-body -->

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
