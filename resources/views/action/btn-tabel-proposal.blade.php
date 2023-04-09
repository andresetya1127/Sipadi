<!-- Link with Dropdown -->
<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="uil-apps"></i>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#detailModal{{$data->id_penelitian }}"> <i class="uil-eye">
            </i> Detail
        </a>
        <a class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id_penelitian }}">
            <i class="uil-pen"></i> Edit
        </a>
    </div>
</div>

<!-- Modal Detail-->
<div class="modal fade" id="detailModal{{ $data->id_penelitian }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3 class="mt-0">
                            {{ $data->judul_penelitian}} <b>({{ $data->tahun_penelitian }})</b>
                        </h3>
                        @if ($data->status == 1)
                        <div class="badge bg-primary text-light mb-3">
                            Terkirim
                        </div>
                        @endif

                        <h5>Rencana Anggaran</h5>
                        <table id="tbl-anggaran" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Uraian Kegiatan</th>
                                    <th>Quantity</th>
                                    <th>Satuan</th>
                                    <th>Nominal</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->rab as $rab )
                                <tr>
                                    <td>{{ $rab->uraian_kegiatan }}</td>
                                    <td>{{ $rab->qty }}</td>
                                    <td>{{ $rab->satuan }}</td>
                                    <td>{{ $rab->nominal }}</td>
                                    <td id="mount">{{ $rab->nominal * $rab->satuan }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>Jumlah Anggaran</td>
                                    <td colspan="4" id="total"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-4">
                    <h5>Anggota:</h5>
                    <div class="col">
                        @foreach ($data->anggota_dosen as $dosen)
                        <ul>
                            <li> {{ $dosen->nidn }}</li>
                        </ul>
                        @endforeach
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card mb-1 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-sm">
                                            <span class="avatar-title rounded">
                                                .File
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col ps-0">
                                        <span class="text-muted fw-bold">{{ $data->dokumen_proposal }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="downloadFile/{{ $data->dokumen_proposal }}" class="btn btn-link btn-lg text-muted">
                                            <i class="dripicons-download"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> <!-- end modal footer -->
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->

<!-- Modal Edit-->
<div class="modal fade" id="editModal{{ $data->id_penelitian }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div> <!-- end modal header -->
            <div class="modal-body">
                <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#home{{ $data->id_penelitian }}" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">Proposal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile{{ $data->id_penelitian }}" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Anggota</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings{{ $data->id_penelitian }}" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                            <span class="d-none d-md-block">Rencana Anggaran</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane  active" id="home{{ $data->id_penelitian }}">
                        <form id="formFirst">
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">NIDN</label>
                                        <input type="text" class="form-control" id="nidn1" name="nidn1" value="{{ $data->nidn }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom02">Judul Penelitian</label>
                                        <input type="text" class="form-control" id="judul_penelitian" name="judul_penelitian" value="{{ $data->judul_penelitian }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom03">Bidang</label>
                                        <select class="form-control select2" data-toggle="select2" id="bidang" name="bidang">
                                            <option selected hidden>{{ $data->bidang['nama_bidang'] }}</option>
                                            @foreach ($bidang as $bd )
                                            <option value="{{ $bd->id_bidang }}">{{ $bd->nama_bidang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom03">Tahun Penelitian</label>
                                        <select class="form-control select2" data-toggle="select2" id="tahun_penelitian" name="tahun_penelitian">
                                            <option selected hidden>{{ $data->tahun_penelitian }}</option>
                                            @foreach ($tahun as $thn )
                                            <option value="{{ $thn->tahun }}">{{ $thn->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom04">Anggaran</label>
                                        <input type="number" class="form-control" id="anggaran" name="anggaran" value="{{ $data->anggaran }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Luaran Wajib</label>
                                        <input type="text" class="form-control" id="luaran_wajib" name="luaran_wajib" value="{{ $data->luaran_wajib }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="validationCustom05">Luaran Tambahan</label>
                                        <input type="text" class="form-control" id="luaran_tambahan" name="luaran_tambahan" value="{{ $data->luaran_tambahan }}">
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
                                            <option selected hidden>Pilih</option>
                                            @foreach ($jenis_proposal as $jenis )
                                            <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama_proposal }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </form>
                    </div>

                    <div class="tab-pane fade" id="profile{{ $data->id_penelitian }}">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Account No.</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-user">
                                        <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="me-2 rounded-circle" />
                                        Risa D. Pearson
                                    </td>
                                    <td>AC336 508 2157</td>
                                    <td>July 24, 1950</td>
                                    <td class="table-action">
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="settings{{ $data->id_penelitian }}">
                        <p>...</p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> <!-- end modal footer -->
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->
