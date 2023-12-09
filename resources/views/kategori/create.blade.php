@extends('main')
@section('content')
<div class="content-wrapper" valign="center">
    <section class="content" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header text-center">
                  <h3 class="card-title text-center">Tambah Data kategori</h3>
                </div>

                <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Jenis Kategori</label>
                      <input type="text" name="jenis_kategori" class="form-control" id="jenis_kategori" placeholder="Masukkan Nama" required>
                    </div>
                      </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- Tambahkan di tempat yang diinginkan dalam formulir -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

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
