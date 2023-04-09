@extends('template.templadeDash')
@section('content')
    {{-- Konten --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="proposalForm" id="addUlasan" class="btn btn-info"><i class="uil-plus"></i> Usulan Baru</a>
                        </div>
                        <div class="col text-end">
                            <span class="fw-bold">Tahun Ajaran 2020</span>
                        </div>
                    </div>
                    <div class="row">
                        <table id="proposalTable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIDN</th>
                                    <th>Judul Penelitian</th>
                                    <th>Tahun Penelitian</th>
                                    <th>Luaran Wajib</th>
                                    <th>Luaran Tambahan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end Konten --}}
@endsection

{{-- DataTables Ajax --}}
@section('script')
    <script src="{{ asset('assets/js/customAjax/viewAjax.js') }}"></script>
@endsection
