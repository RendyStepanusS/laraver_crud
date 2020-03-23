<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use stdClass;

class SiswaController extends Controller
{
    public function index()
    {

        $data_siswa = Student::all();

        // mengirimkan data ke view siswa.index
        // parameter kedua untuk menggunakan data_siswa pada view
        return view('siswa.index', ['data_siswa' => $data_siswa], compact('data_siswa'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_depan'            => 'required',
            'jenis_kelamin'         => 'required',
            'agama'                 => 'required',
            'alamat'                => 'required'
        ]);

        Student::create($request->all());

        // mengirimkan data ke toast
        return redirect('siswa')->with('sukses','Data Berhasil Di Tambahkan!');
    }

    public function edit($id)
    {
        $data_siswa = Student::find($id);
        return view('siswa', ['data_siswa' => $data_siswa]);
    }
    
    public function update($id, Request $request)
    {
        $data_siswa = Student::find($id);
        $data_siswa->update($request->all());
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/', $request->file('avatar')
            ->getClientOriginalName());
            $data_siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $data_siswa->save();
        }

        return redirect('/siswa')->with('sukses','Data berhasil diupdate');;
    }

    public function delete($id)
    {
        $data_siswa = Student::find($id);
        $data_siswa->delete();
        return redirect('siswa')->with('deleted','Data Berhasil Di Hapus!');
    }

    public function profile($id)
    {
        $data_siswa = Student::find($id);
        return view('siswa.profile', ['data_siswa' => $data_siswa]);
    }

}
