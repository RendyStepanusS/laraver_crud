@extends('layouts.master')

@section('title', 'Data Siswa | Profil Lengkap')

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$data_siswa->getAvatar()}}" class="img-circle" alt="Avatar">
                                <h3 class="name"> {{ $data_siswa->nama_depan }} {{ $data_siswa->nama_belakang }} </h3>
                                <span class="online-status status-available">Available</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        45 <span>Projects</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        15 <span>Awards</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        2174 <span>Points</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Detail</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>Jenis Kelamin   <span>{{$data_siswa->jenis_kelamin}}</span></li>
                                    <li>Agama           <span>{{$data_siswa->agama}}</span></li>
                                    <li>Alamat          <span>{{$data_siswa->alamat}}</span></li>
                                </ul>
                            </div>
                            <div class="text-center"><a href="/siswa/edit/{id}"
                                data-toggle="modal" data-target="#editdata{{ $data_siswa->id }}"
                                class="btn btn-primary">Edit Profile</a></div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <!-- TABBED CONTENT -->
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Aktivitas terakhir</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <ul class="list-unstyled activity-timeline">
                                    <li>
                                        <i class="fa fa-comment activity-icon"></i>
                                        <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-cloud-upload activity-icon"></i>
                                        <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-plus activity-icon"></i>
                                        <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check activity-icon"></i>
                                        <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                                    </li>
                                </ul>
                                <div class="margin-top-30 text-center"><a href="#" class="btn btn-default">See all activity</a></div>
                            </div>
                        </div>
                        <!-- END TABBED CONTENT -->
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
{{--  Modal Edit Data --}}
<div class="modal fade" id="editdata{{$data_siswa->id}}" tabindex="-1" role="dialog"
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
                        <form action="/siswa/update/{{ $data_siswa->id }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control" 
                                        id="nama_depan" placeholder="Nama Depan" 
                                        value="{{$data_siswa->nama_depan}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="costum-select form-control"
                                        id="nama_belakang" placeholder="Nama Belakang"
                                        value="{{$data_siswa->nama_belakang}}" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="costum-select form-control"
                                        id="jenis_kelamin"
                                        value="{{$data_siswa->jenis_kelamin}}" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" @if($data_siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    <option value="P" @if($data_siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control"
                                        id="agama"
                                        value="{{$data_siswa->agama}}" required>
                                    <option value="">-- Pilih Agama --</option>
                                    <option value="Islam" @if($data_siswa->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen" @if($data_siswa->agama == 'Kristen') selected @endif>Kristen</option>
                                    <option value="Katolik" @if($data_siswa->agama == 'Katolik') selected @endif>Katolik</option>
                                    <option value="Buddha" @if($data_siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Hindu" @if($data_siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Khonghucu" @if($data_siswa->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control"
                                        id="alamat" rows="3" placeholder="Alamat"
                                        value="" required>{{$data_siswa->alamat}}</textarea>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="alamat">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
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
{{-- End Modal Edit Data   --}}
@endsection