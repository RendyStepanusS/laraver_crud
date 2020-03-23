@extends('layouts.master')

@section('title', 'Data Siswa | Master')

@section('content')
<div class="main">
    <div class="main-content">

        {{--  Modal Tambah Data --}}
        <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h3>
                    </div>
                    <div class="modal-body">
                        <div class="panel">
                            <div class="panel-body">
                                <form action="/siswa/store">
                                    {{ csrf_field() }}
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="nama_depan">Nama Depan</label>
                                            <input name="nama_depan" type="text" class="form-control" 
                                                id="nama_depan" placeholder="Nama Depan" 
                                                value="{{old('nama_depan')}}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nama_belakang">Nama Belakang</label>
                                            <input name="nama_belakang" type="text" class="form-control"
                                                id="nama_belakang" placeholder="Nama Belakang"
                                                value="{{old('nama_belakang')}}" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="nama_belakang">Email</label>
                                            <input name="email" type="text" class="form-control"
                                                id="nama_belakang" placeholder="Email" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control"
                                                id="jenis_kelamin"
                                                value="{{old('jenis_kelamin')}}" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="agama">Agama</label>
                                            <select name="agama" class="form-control"
                                                id="agama"
                                                value="{{old('agama')}}" required>
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control"
                                                id="alamat" rows="3" placeholder="Alamat"
                                                value="{{old('alamat')}}" required></textarea>
                                        </div>  
                                    </div>
                   </div>{{-- tutup modal-body--}}
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        {{-- End Modal Tambah Data   --}}
        {{--  Modal Edit Data --}}
        @foreach ($data_siswa as $siswa)
        <div class="modal fade" id="editdata{{$siswa->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h3>
                    </div>
                    <div class="modal-body">
                        <div class="panel">
                            <div class="panel-body">
                                <form action="/siswa/update/{{ $siswa->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="nama_depan">Nama Depan</label>
                                            <input name="nama_depan" type="text" class="form-control" 
                                                id="nama_depan" placeholder="Nama Depan" 
                                                value="{{$siswa->nama_depan}}" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nama_belakang">Nama Belakang</label>
                                            <input name="nama_belakang" type="text" class="costum-select form-control"
                                                id="nama_belakang" placeholder="Nama Belakang"
                                                value="{{$siswa->nama_belakang}}" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="costum-select form-control"
                                                id="jenis_kelamin"
                                                value="{{$siswa->jenis_kelamin}}" required>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="agama">Agama</label>
                                            <select name="agama" class="form-control"
                                                id="agama"
                                                value="{{$siswa->agama}}" required>
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam" @if($siswa->agama == 'Islam') selected @endif>Islam</option>
                                            <option value="Kristen" @if($siswa->agama == 'Kristen') selected @endif>Kristen</option>
                                            <option value="Katolik" @if($siswa->agama == 'Katolik') selected @endif>Katolik</option>
                                            <option value="Buddha" @if($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                            <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                            <option value="Khonghucu" @if($siswa->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-12">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control"
                                                id="alamat" rows="3" placeholder="Alamat"
                                                value="" required>{{$siswa->alamat}}</textarea>
                                        </div>  
                                    </div>
                   </div>{{-- tutup modal-body--}}
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>     
        @endforeach
        {{-- End Modal Edit Data   --}}

        {{-- Main Content --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Siswa</h3>
                            </div>
                            <div class="panel-body">
                                {{--  Button trigger modal  --}}
                                <button type="button" class="btn btn-primary btn-sm float-left mt-2 mb-2"
                                    data-toggle="modal" data-target="#tambahdata">
                                    <i class="fa fa-plus" aria-hidden="true"></i>  Tambah Data Siswa
                                </button>
                            </div>
                            <div class="panel-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_siswa as $siswa)
                                            <tbody style="font-size:14px;">
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><a href="/siswa/profile/{{$siswa->id}}">{{  $siswa->nama_depan   }}</a></td>
                                                    <td><a href="/siswa/profile/{{$siswa->id}}">{{ $siswa->nama_belakang }}</a></td>
                                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                                    <td>{{ $siswa->agama }}</td>
                                                    <td>{{ $siswa->alamat }}</td>
                                                    <td>
                                                        <a style="font-size:10px;" href="/siswa/edit/{{$siswa->id}}" class="btn btn-warning btn-sm" 
                                                            data-toggle="modal" 
                                                            data-target="#editdata{{$siswa->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a style="font-size:10px;" href="/siswa/hapus/{{$siswa->id}}"
                                                            class="btn btn-danger btn-toastr btn-sm" 
                                                            data-context="error" data-message="This is error info" data-position="top-right"
                                                            onclick="return confirm('Anda Yakin?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Main Content --}}

    </div>
</div>
@endsection

@section('script')

@endsection