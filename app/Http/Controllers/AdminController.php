<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function save_buku(Request $r)
    {
    	$buku = new \App\Daftar_buku();
    	$buku->kode_buku = rand(5, 10);
    	$buku->judul_buku = $r->input('judul_buku');
    	$buku->pengarang = $r->input('pengarang');
    	$buku->kategori = $r->input('kategori');
    	$buku->save();

    	$stok = new \App\Stok_buku();
    	$stok->judul_buku = $r->input('judul_buku');
    	$stok->nomor_rak = $r->input('nomor_rak');
    	$stok->jumlah_buku = $r->input('jumlah_buku');
    	$stok->save();

    	return redirect()->back();
    }

    public function save_peminjaman(Request $r)
    {
    	$peminjaman = new \App\Peminjaman();
    	$peminjaman->nama_peminjaman = $r->input('nama_peminjaman');
    	$peminjaman->alamat_peminjaman = $r->input('alamat_peminjaman');
    	$peminjaman->judul_buku = $r->input('judul_buku');
    	$peminjaman->tanggal_pinjam = $r->input('tanggal_pinjam');
    	$peminjaman->save();

    	return redirect()->back();
    }
}
