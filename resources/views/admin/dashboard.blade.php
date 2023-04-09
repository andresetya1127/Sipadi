@extends('template.templadeDash')
@section('content')

{{-- Konten --}}
<div class="row">
    <div class="col-sm-12">
        <!-- Profile -->
        <div class="card bg-warning">
            <div class="card-body profile-user-box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-thumbnail">
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <h4 class="mt-1 mb-1 text-white">Michael Franklin</h4>
                                    <p class="font-13 text-white-50"> Authorised Brand Seller</p>
                                </div>
                            </div>

                            <div class="col text-center">
                                <h4 class="fw-bold text-white ">Penelitian</h4>
                                <p class=" font-20 text-dark mt-2 fw-bold">1000</p>
                            </div>

                            <div class="col text-center">
                                <h4 class="fw-bold text-white ">Pengabdian</h4>
                                <p class=" font-20 text-dark mt-2 fw-bold">1000</p>
                            </div>

                            <div class="col text-center">
                                <h4 class="fw-bold text-white ">Publikasi</h4>
                                <p class=" font-20 text-dark mt-2 fw-bold">1000</p>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-sm-4">
                        <div class="text-center mt-sm-0 mt-3 text-sm-end">
                            <button type="button" class="btn btn-light" id="editProf" onclick="myfunction1()">
                                <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                            </button>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->

            </div> <!-- end card-body/ profile-user-box-->
        </div>
        <!--end profile/ card -->
    </div> <!-- end col-->
</div>

<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data</h4>
            </div>
            <div class="card-body">
                {{-- Form input data --}}
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Nama</label>
                                <input type="text" class="form-control" id="validation01" placeholder="First name" value="Mark" required readonly>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">NIDN</label>
                                <input type="text" class="form-control" id="validation02" placeholder="Last name" value="Otto" required readonly>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Program Studi</label>
                                <div class="input-group">
                                    {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                    <input type="text" class="form-control" id="validation03" placeholder="Username" aria-describedby="inputGroupPrepend" required readonly>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">No Telpon</label>
                                <input type="text" class="form-control" id="validation04" placeholder="First name" value="Mark" required readonly>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input type="text" class="form-control" id="validation05" placeholder="Last name" value="Otto" required readonly>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Alamat</label>
                                <div class="input-group">
                                    {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                    <input type="text" class="form-control" id="validation06" placeholder="Username" aria-describedby="inputGroupPrepend" required readonly>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="btnSubEdit" hidden class="btn btn-info">Submit</button>
                </form>
                {{-- end Form --}}
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
{{-- end Konten --}}

@endsection
