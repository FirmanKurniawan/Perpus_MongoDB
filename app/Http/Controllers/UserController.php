<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function save_peminjaman(Request $r)
    {
    	$peminjaman = new \App\Peminjaman();
    	$peminjaman->nama_peminjam = $r->nama_peminjam;
    	$peminjaman->alamat_peminjam = $r->alamat_peminjam;
    	$peminjaman->judul_buku = $r->judul_buku;
    	$peminjaman->tanggal_pinjam = $r->tanggal_pinjam;
    	$peminjaman->save();

    	return redirect()->back();
    }
}
