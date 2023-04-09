@extends('template.templadeDash')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div id="basicwizard">

                            <ul class="nav nav-pills nav-justified form-wizard-header mb-5">
                                <li class="nav-item">
                                    <a href="#basictab1" id="tab1" class="nav-link rounded-pill  pt-2 pb-2" disabled>
                                        <i class=" uil-envelope-check me-1"></i>
                                        <span class="d-none d-sm-inline">Proposal</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab2" id="tab2" class="nav-link rounded-pill pt-2 pb-2" disabled>
                                        <i class="uil-user-plus me-1"></i>
                                        <span class="d-none d-sm-inline">Anggota</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab3" id="tab3" class="nav-link rounded-pill  pt-2 pb-2" disabled>
                                        <i class="uil-money-withdrawal me-1"></i>
                                        <span class="d-none d-sm-inline">RAB</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basictab4" id="tab4" class="nav-link rounded-pill  pt-2 pb-2" disabled>
                                        <i class=" uil-bag-alt me-1"></i>
                                        <span class="d-none d-sm-inline">Upload Berkas</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane" id="tab1">
                                    <form id="formFirst">
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">NIDN</label>
                                                    <input type="text" class="form-control" id="nidn1" name="nidn1">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom02">Judul Penelitian</label>
                                                    <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <div class="input-group">
                                                        <label class="form-label" for="validationCustomUsername">Bidang</label>
                                                        <select class="form-control select2" data-toggle="select2" id="bidang" name="bidang">
                                                            <option selected disabled>-- Pilih Bidang --</option>
                                                            @foreach ($bidang as $bd )
                                                            <option value="{{ $bd->id_bidang }}">{{ $bd->nama_bidang }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom03">Tahun Penelitian</label>
                                                    <select class="form-control select2" data-toggle="select2" id="tahun_penelitian" name="tahun_penelitian">
                                                        <option selected disabled>-- Pilih Tahun Penelitian --</option>
                                                        @foreach ($thn_penelitian as $thn)
                                                        <option value="{{ $thn->tahun }}">{{ $thn->tahun }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom04">Anggaran</label>
                                                    <input type="number" class="form-control" id="anggaran" name="anggaran">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom05">Luaran Wajib</label>
                                                    <input type="text" class="form-control" id="luaran_wajib" name="luaran_wajib">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom05">Luaran Tambahan</label>
                                                    <input type="text" class="form-control" id="luaran_tambahan" name="luaran_tambahan">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom05">Dokumen Proposal</label>
                                                    <input type="text" class="form-control" id="dokumen_proposal" name="dokumen_proposal">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom05">Jenis Proposal</label>
                                                    <select class="form-control" id="jenis_proposal" name="jenis_proposal">
                                                        <option selected disabled>-- Pilih Jenis Proposal --</option>
                                                        @foreach ($jen_propo as $jp)
                                                        <option value="{{ $jp->id_jenis }}">{{ $jp->nama_proposal }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <ul class="list-inline wizard mb-0 mt-3">
                                                <li class="next list-inline-item float-end">
                                                    <button class="btn btn-success" type="submit" id="next1">Selanjutnya</button>
                                                </li>
                                            </ul>
                                        </div> <!-- end row -->
                                    </form>
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#mDosen">
                                                <i class="uil-plus"></i>Anggota Dosen
                                            </button>
                                            <table id="anggotaDosen" class="table table-striped" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIDN</th>
                                                        <th>Uraian Tugas</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#mMahasiswa">
                                                <i class="uil-plus"></i>Anggota Mahasiswa
                                            </button>
                                            <table id="anggotaMahasiswa" class="table table-striped" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>NIM</th>
                                                        <th>Uraian Tugas</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <ul class="list-inline wizard mb-0 mt-3">
                                        <li class="previous list-inline-item">
                                            <a href="#" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold" id="prev1">
                                                <i class="mdi mdi-arrow-left"></i> Kembali
                                            </a>
                                        </li>
                                        <li class="next list-inline-item float-end">
                                            <button class="btn btn-success" id="next2">Selanjutnya</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane" id="tab3">
                                    <div class="row mt-3">
                                        <div class="col-lg-9 mb-2">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mRab">Tambah Anggaran</button>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text fw-bold" id="basic-addon1">Total Anggaran :</span>
                                                <input type="text" class="form-control" aria-describedby="basic-addon1" value="3000000000" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <table id="table_rab" class="table table-striped" style="width:100%">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Uraian Kegiatan</th>
                                                        <th>QTY</th>
                                                        <th>Satuan</th>
                                                        <th>Nominal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <ul class="list-inline wizard mb-0 mt-3">
                                        <li class="previous list-inline-item">
                                            <a href="#" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold" id="prev2">
                                                <i class="mdi mdi-arrow-left"></i> Kembali
                                            </a>
                                        </li>
                                        <li class="next list-inline-item float-end">
                                            <button class="btn btn-success" id="next3">Selanjutnya</button>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane" id="tab4">
                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <h3 class="card-title fw-bold">Upload Proposal</h3>

                                            <ul>
                                                <li><span class="fw-bold fs-5">Cover</span></li>
                                                <li><span class="fw-bold fs-5">Lembar Pengesahan</span></li>
                                                <li><span class="fw-bold fs-5">Isi Proposal</span></li>
                                                <li><span class="fw-bold fs-5">Anggaran</span></li>
                                                <li><span class="fw-bold fs-5">Surat Tugas</span></li>
                                                <li><span class="fw-bold fs-5"> <button class="btn btn-primary">Unduh Template</button></span></li>
                                            </ul>
                                            <span class="fw-bold text-danger">* Semua File Digabung Dalam Satu File</span>
                                        </div>
                                        <form method="POST" action="validasiData" enctype="multipart/form-data" id="form-upload">
                                            @csrf
                                            <div class="col-lg-5 mt-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <input name="file" class="form-control" type="file" id="uploadFile" name="uploadFile">
                                                        <span class="text-dark">(Format PDF Max.2 MB)</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-inline wizard mb-0 mt-3">
                                                <li class="previous list-inline-item">
                                                    <a href="#" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold" id="prev3">
                                                        <i class="mdi mdi-arrow-left"></i> Kembali
                                                    </a>
                                                </li>
                                                <li class="next list-inline-item float-end">
                                                    <button class="btn btn-success" id="btn-confirm" type="submit">Konfirmasi</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>

                                </div>
                            </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- end card-->
</div> <!-- end card-->


<!-- Modal -->
<div class="modal fade" id="mDosen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-dark">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <form id="formDosen">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIDN</label>
                        <input type="text" class="form-control" id="nidn2" name="nidn2">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Uraian Kegiatan Dosen</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="uraian_tugas_dosen" name="uraian_tugas_dosen" style="height: 100px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpan-dosen">Simpan</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->

<div class="modal fade" id="mMahasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-dark">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <form id="formMhs">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim">
                        <div class="invalid-feedback invalid-nim"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">uraian tugas Mahasiswa</label>
                        <textarea class="form-control" id="uraian_tugas_mhs" name="uraian_tugas_mhs" style="height: 100px;"></textarea>
                        <div class="invalid-feedback invalid-uraian_tugas_mhs"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->

<div class="modal fade" id="mRab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-dark">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Rencana Angaran Biaya (RAB)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <form id="formRab">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Uraian Kegiatan</label>
                        <input type="text" class="form-control" id="uraian_kegiatan" name="uraian_kegiatan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">QTY</label>
                        <input type="text" class="form-control" id="qty" name="qty">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Satuan</label>
                        <input type="number" class="form-control" id="satuan" name="satuan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">simpan</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->
{{-- --}}
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- plugin js -->
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
<!-- init js -->
<script src="{{ asset('assets/js/component.fileupload.js') }}"></script>
<script src="{{ asset('assets/js/customAjax/formAjax.js') }}"></script>
{{-- <script src="{{ asset('') }}assets/js/demo.form-wizard.js"></script> --}}
@endsection
