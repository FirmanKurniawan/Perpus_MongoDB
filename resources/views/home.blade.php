@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row" style="margin-top: 30px;">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-home"></i> Home</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><i class="fas fa-warehouse"></i> Tambah Buku</a>
      <a class="list-group-item list-group-item-action" id="list-profile1-list" data-toggle="list" href="#list-profile1" role="tab" aria-controls="profile"><i class="fas fa-warehouse"></i> Stok Buku</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><i class="fas fa-clipboard-list"></i> Peminjaman</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="accordion" id="accordionExample"></div>
        <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header bg-primary" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Jumlah Buku dan Peminjam
        </button>
      </h5>
    </div>

    @php
        $jumlah_buku = \App\Daftar_buku::count();
        $jumlah_peminjam = \App\Peminjaman::count();
    @endphp
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
                <form>
                  <div class="col-6">
                    <label>Jumlah Peminjam</label>
                    <label class="sr-only" for="inlineFormInputGroup">Jumlah Gudang</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-sort-numeric-up"></i></div>
                      </div>  
                      <button type="button" class="btn btn-primary">
                      Jumlah Peminjam
                      <span class="badge badge-light">
                          {{$jumlah_peminjam}}
                      </span>
                      </button>
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Jumlah Buku</label>
                    <label class="sr-only" for="inlineFormInputGroup">Jumlah Buku</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-sort-numeric-up"></i></div>
                      </div>  
                      <button type="button" class="btn btn-primary">
                      Jumlah Buku
                      <span class="badge badge-light">{{$jumlah_buku}}</span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
    </div>
  </div>
  <div class="card">
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
    </div>
  </div>
</div>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="accordion" id="accordionExample"></div>
          <div class="card">
            <div class="card-header bg-primary" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Tambah Buku <i class="fas fa-angle-down"></i>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <form action="{{url('save_buku')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-row">
                    <div class="col-12">
                    <label>Judul</label>
                    <label class="sr-only" for="inlineFormInputGroup">Judul</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Judul" name="judul_buku">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Pengarang</label>
                    <label class="sr-only" for="inlineFormInputGroup">Pengarang</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-sort-numeric-up"></i></div>
                      </div>  
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Pengarang" name="pengarang">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Kategori</label>
                    <label class="sr-only" for="inlineFormInputGroup">Kategori</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-shield"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Kategori" name="kategori">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Nomor Rak</label>
                    <label class="sr-only" for="inlineFormInputGroup">Nomor Rak</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-shield"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nomor Rak" name="nomor_rak">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Jumlah Buku</label>
                    <label class="sr-only" for="inlineFormInputGroup">Jumlah Buku</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-shield"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Jumlah Buku" name="jumlah_buku">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="input-group mb-2">
                      <button type="submit" class="form-control" id="inlineFormInputGroup"><a href="" class="">
                        <i class="fa fa-paper-plane"></i>
                        Submit
                      </a></button>
                    </div>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
      <div class="tab-pane fade" id="list-profile1" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="accordion" id="accordionExample"></div>
          <div class="card">
            <div class="card-header bg-primary" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Stok Buku <i class="fas fa-angle-down"></i>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">Nomor Rak</th>
      <th scope="col">Jumlah Buku</th>
    </tr>
  </thead>
  @php
    $stok = \App\Stok_buku::all();
    $i = 1;
  @endphp
  @foreach ($stok as $g)
   <tbody>
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$g->judul_buku}}</td>
      <td>{{$g->nomor_rak}}</td>
      <td>{{$g->jumlah_buku}}</td>
    </tr>
  </tbody>
  @endforeach
</table>
            </div>
          </div>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
        <div class="accordion" id="accordionExample"></div>
          <div class="card">
            <div class="card-header bg-primary" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Peminjaman <i class="fas fa-angle-down"></i>
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <form action="{{url('save_peminjaman')}}" method="POST">
                    @csrf
                  <div class="form-row">
                    <div class="col-6">
                    <label>Nama Peminjam</label>
                    <label class="sr-only" for="inlineFormInputGroup">Nama Peminjam</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Nama Peminjam" name="nama_peminjaman">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Alamat Peminjam</label>
                    <label class="sr-only" for="inlineFormInputGroup">Alamat Peminjam</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                      </div>
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Alamat Peminjam" name="alamat_peminjaman">
                    </div>
                  </div>
                  <div class="col-6">
                    <label>Tanggal Pinjam</label>
                    <label class="sr-only" for="inlineFormInputGroup">Tanggal Pinjam</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                      </div>
                      <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Tanggal Pinjam" name="tanggal_pinjam">
                    </div>
                  </div>
                  <div class="col-12">
                    <label>Judul Buku</label>
                    <label class="sr-only" for="inlineFormInputGroup">Judul Buku</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-id-card-alt"></i></i></div>
                      </div>
                      @php
                        $judul = \App\Daftar_buku::all();
                      @endphp
                      <select class="form-control" name="judul_buku">
                          <option>Pilih Judul</option>
                          @foreach($judul as $j)
                            <option value="{{$j->judul_buku}}">{{$j->judul_buku}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="input-group mb-2">
                      <button type="submit" class="form-control" id="inlineFormInputGroup"><a href="" class="">
                        <i class="fa fa-paper-plane"></i>
                        Submit
                      </a></button>
                    </div>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
