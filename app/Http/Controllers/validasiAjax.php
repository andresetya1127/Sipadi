<?php

namespace App\Http\Controllers;

use App\Models\tbl_bidang_peneltian;
use App\Models\tbl_jenis_proposal;
use App\Models\tbl_rab;
use App\Models\tbl_tahun_penelitian;
use App\Models\trx_anggota_mahasiswa;
use App\Models\trx_anggota_penelitian_dosen;
use App\Models\trx_proposal_penelitian;
use Clockwork\Storage\Storage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class validasiAjax extends Controller
{
    public function proposal()
    {
        $title = 'Proposal';
        return view('penelitian.proposal', compact('title'));
    }
    public function laporanProposal()
    {
        $title = 'Laporan';
        return view('penelitian.laporan', compact('title'));
    }

    public function anggota()
    {
        $title = 'Anggota';
        return view('penelitian.anggota', compact('title'));
    }

    public function viewProposal()
    {
        // $bidang = tbl_bidang_peneltian::latest()->get();
        // $thn_penelitian = tbl_tahun_penelitian::latest()->get();
        // $jen_propo = tbl_jenis_proposal::latest()->get();
        $data = trx_proposal_penelitian::with('anggota_dosen', 'rab', 'bidang')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($data) {
                return view('action.btn-tabel-proposal')->with([
                    'data' => $data,
                    'bidang' => tbl_bidang_peneltian::orderBy('nama_bidang', 'asc')->get(),
                    'tahun' => tbl_tahun_penelitian::orderBy('tahun', 'asc')->get(),
                    'jenis_proposal' => tbl_jenis_proposal::orderBy('nama_proposal', 'asc')->get()
                ]);
            })
            ->addColumn('st', function ($data) {
                return view('action.status')->with('data', $data);
            })
            ->make(true);
    }

    public function proposalForm()
    {
        $title = 'Form Proposal Penelitian';
        $bidang = tbl_bidang_peneltian::latest()->get();
        $thn_penelitian = tbl_tahun_penelitian::latest()->get();
        $jen_propo = tbl_jenis_proposal::latest()->get();
        return view('penelitian.form', compact(
            'title',
            'bidang',
            'thn_penelitian',
            'jen_propo'
        ));
    }


    public function validasiData(Request $request)
    {
        $data = json_decode($request->data);
        $dosen = json_decode($request->dosen);
        $mhs = json_decode($request->mhs);
        $rab = json_decode($request->rab);
        $filename = time() . '.' . $request->file('fileUp')->extension();
        $request->file->storeAs('public/storage', $filename);
        // dd($request->data);
        foreach ($data as $dtm) {
            $post = new trx_proposal_penelitian();
            $post->nidn = $dtm->nidn1;
            $post->id_bidang = $dtm->bidang;
            $post->judul_penelitian = $dtm->judul_penelitian;
            $post->tahun_penelitian = $dtm->tahun_penelitian;
            $post->anggaran = $dtm->anggaran;
            $post->luaran_wajib = $dtm->luaran_wajib;
            $post->luaran_tambahan = $dtm->luaran_tambahan;
            $post->dokumen_proposal = $filename;
            $post->id_jenis = $dtm->jenis_proposal;
            $post->status = '1';
            $post->save();
            $last_id_penelitian = $post->id_penelitian;
        }
        foreach ($dosen as $dos) {
            $dosen = new trx_anggota_penelitian_dosen();
            $dosen->id_penelitian = $last_id_penelitian;
            $dosen->nidn = $dos->nidn2;
            $dosen->uraian_tugas = $dos->uraian_tugas_dosen;
            $dosen->save();
        }
        if (!$mhs == null) {
            foreach ($mhs as $mahasiswa) {
                $mh = new trx_anggota_mahasiswa();
                $mh->id_penelitian = $last_id_penelitian;
                $mh->nim = $mahasiswa->nim;
                $mh->uraian_tugas = $mahasiswa->uraian_tugas_mhs;
                $mh->save();
            }
        }
        foreach ($rab as $rb) {
            $r = new tbl_rab();
            $r->id_penelitian = $last_id_penelitian;
            $r->id_kegiatan = '2';
            $r->uraian_kegiatan = $rb->uraian_kegiatan;
            $r->qty = $rb->qty;
            $r->satuan = $rb->satuan;
            $r->nominal = $rb->nominal;
            $r->save();
        }

        return response()->json(['success' => 'Data Berhasil Tersimpan!']);
    }

    public function downloadFile($file)
    {
        // Storage::put('avatars/1', $content);
    }
}
