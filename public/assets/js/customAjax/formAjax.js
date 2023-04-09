// fungsi action


tampilProposal();
tampilDosen();
tampilMhs();
tampilRab();
list_form();
if (localStorage.getItem('target') == null || localStorage.getItem('target') == '[]') {
    localStorage.setItem('target', 'tab1');
    list_form();
}

// Proses Setup CSRF token
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#form-upload').submit(function (e) {
    e.preventDefault();
    var data = localStorage.getItem('data');
    var dosen = localStorage.getItem('dosen');
    var rab = localStorage.getItem('rab');


    if (data == '[]' || dosen == '[]' || rab == '[]' || data == null || dosen == null || rab == null) {
        Swal.fire({icon: 'error', title: 'Silahkan Lengkapi Data Terlebih Dahulu!', showConfirmButton: true})
    } else {
        var formData = new FormData(this);
        formData.append('data', localStorage.getItem('data'));
        formData.append('dosen', localStorage.getItem('dosen'));
        formData.append('mhs', localStorage.getItem('mhs'));
        formData.append('rab', localStorage.getItem('rab'));
        formData.append('fileUp', document.getElementById('uploadFile').files[0]);
        $.ajax({
            url: 'validasiData',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: formData,

            success: function (response) {
                if (response.success) {
                    localStorage.clear();
                    Swal.fire({
                        icon: 'success',
                        title: response.success,
                        confimButtonText: 'Ok',
                        confirmButtonColor: '#0eab10',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'proposal'
                        }
                    })
                }
            }
        })
    }

});

// lis tab
function list_form() {
    if (localStorage.getItem('target')) {
        var x = document.querySelectorAll('#' + localStorage.getItem('target'));
        x[0].classList.add("active");
        x[1].classList.add("active");
    }
}

// Validasi Form proposal
$("#formFirst").validate({
    rules: {
        nidn1: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
        },
        judul_penelitian: "required",
        bidang: "required",
        anggaran: "required",
        tahun_penelitian: "required",
        luaran_wajib: "required",
        luaran_tambahan: "required",
        dokumen_proposal: "required",
        jenis_proposal: "required"


    },
    // Pesan Error valdiasi
    messages: {
        nidn1: {
            required: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
            digits: "<div class='invalid-feedback d-block'>Kolom Berupa Angka!</div>",
            minlength: "<div class='invalid-feedback d-block'>Min. 10 Karakter!</div>",
            maxlength: "<div class='invalid-feedback d-block'>Max.10 Karakter!</div>"
        },
        judul_penelitian: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        bidang: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        anggaran: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        tahun_penelitian: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        luaran_wajib: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        luaran_tambahan: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        dokumen_proposal: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        jenis_proposal: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>"

    },
    errorPlacement: function (error, element) {
        if (element.is("select")) {
            error.insertAfter(element.next());
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function () {

        localStorage.removeItem('data');
        // mengambil nilai inputan
        let nidn1 = document.querySelector('#nidn1').value;
        let judul_penelitian = document.querySelector('#judul_penelitian').value;
        let bidang = document.querySelector('#bidang').value;
        let tahun_penelitian = document.querySelector('#tahun_penelitian').value;
        let anggaran = document.querySelector('#anggaran').value;
        let luaran_wajib = document.querySelector('#luaran_wajib').value;
        let luaran_tambahan = document.querySelector('#luaran_tambahan').value;
        let dokumen_proposal = document.querySelector('#dokumen_proposal').value;
        let jenis_proposal = document.querySelector('#jenis_proposal').value;

        // mengambil text didalam optioan
        let optBidang = $('#bidang option:selected').html();
        let optTahun = $('#tahun_penelitian option:selected').html();
        let optJenis = $('#jenis_proposal option:selected').html();

        const newObj = {
            nidn1,
            judul_penelitian,
            bidang,
            tahun_penelitian,
            anggaran,
            luaran_wajib,
            luaran_tambahan,
            dokumen_proposal,
            jenis_proposal,
            optBidang,
            optTahun,
            optJenis
        }
        let dataArray = JSON.parse(localStorage.getItem('data')) || [];
        dataArray.push(newObj);
        localStorage.setItem('data', JSON.stringify(dataArray));
        next1();

    }
});

// validasi form mhs
$("#formMhs").validate({
    rules: {
        nim: {
            required: true,
            minlength: 10,
            maxlength: 10
        },
        uraian_tugas_mhs: "required"


    },
    messages: {
        nim: {
            required: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
            minlength: "<div class='invalid-feedback d-block'>Min. 10 Karakter!</div>",
            maxlength: "<div class='invalid-feedback d-block'>Max.10 Karakter!</div>"
        },
        uraian_tugas_mhs: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>"

    },
    submitHandler: function () {

        const mhs = JSON.parse(localStorage.getItem('mhs')) || [];
        const nim = document.querySelector('#nim').value;
        const uraian_tugas_mhs = document.querySelector('#uraian_tugas_mhs').value;
        const duplicateData = mhs.find(data => data.nim === nim);
        if (duplicateData) {
            Swal.fire({icon: 'error', title: 'Data Sudah Ada!', showConfirmButton: true})
        } else {
            const newObj = {
                nim,
                uraian_tugas_mhs
            };

            mhs.push(newObj);
            localStorage.setItem('mhs', JSON.stringify(mhs));
            tampilMhs();
        }
    }
});
// validasi form dosen
$("#formRab").validate({
    rules: {
        uraian_kegiatan: {
            required: true
        },
        qty: "required",
        satuan: {
            required: true,
            digits: true
        },

        nominal: {
            required: true,
            digits: true
        }


    },
    messages: {
        uraian_kegiatan: {
            required: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>"
        },
        qty: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
        satuan: {
            required: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
            digits: "<div class='invalid-feedback d-block'>Karakter Berupa Angka!</div>"
        },
        nominal: {
            required: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
            digits: "<div class='invalid-feedback d-block'>Karakter Berupa Angka!</div>"
        }

    },
    submitHandler: function () {

        const rab = JSON.parse(localStorage.getItem('rab')) || [];
        const uraian_kegiatan = document.querySelector('#uraian_kegiatan').value;
        const qty = document.querySelector('#qty').value;
        const satuan = document.querySelector('#satuan').value;
        const nominal = document.querySelector('#nominal').value;
        const newObj = {
            uraian_kegiatan,
            qty,
            satuan,
            nominal
        };

        rab.push(newObj);
        localStorage.setItem('rab', JSON.stringify(rab));
        tampilRab();
    }
});
// validasi form dosen
$("#formDosen").validate({
    rules: {
        nidn2: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
        },
        uraian_tugas_dosen: "required"


    },
    messages: {
        nidn2: {
            required: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>",
            digits: "<div class='invalid-feedback d-block'>Kolom Berupa Angka!</div>",
            minlength: "<div class='invalid-feedback d-block'>Min. 10 Karakter!</div>",
            maxlength: "<div class='invalid-feedback d-block'>Max.10 Karakter!</div>"
        },
        uraian_tugas_dosen: "<div class='invalid-feedback d-block'>Kolom Tidak Boleh Kosong!</div>"

    },
    errorPlacement: function (error, element) {
        if (element.is("textarea")) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function () {

        const dosen = JSON.parse(localStorage.getItem('dosen')) || [];
        const nidn2 = document.querySelector('#nidn2').value;
        const uraian_tugas_dosen = document.querySelector('#uraian_tugas_dosen').value;
        const duplicateData = dosen.find(data => data.nidn2 === nidn2);
        if (duplicateData) {
            Swal.fire({icon: 'error', title: 'Data Sudah Ada!', showConfirmButton: true})
        } else {
            const newObj = {
                nidn2,
                uraian_tugas_dosen
            };

            dosen.push(newObj);
            localStorage.setItem('dosen', JSON.stringify(dosen));
            tampilDosen();
        }
    }
});


function next1() {
    if (localStorage.getItem('data') == '[]' || localStorage.getItem('data') == null) {
        Swal.fire({icon: 'error', title: 'Silahkan Lengkapi Data Terlebih Dahulu!', showConfirmButton: true})
    } else {
        var x = document.querySelectorAll('#' + localStorage.getItem('target'));
        x[0].classList.remove('active');
        x[1].classList.remove('active');
        localStorage.setItem('target', 'tab2');
        list_form();
    }
}
$('#next2').click(function () {
    if (localStorage.getItem('dosen') == '[]' || localStorage.getItem('dosen') == null) {
        Swal.fire({icon: 'error', title: 'Silahkan Lengkapi Data Terlebih Dahulu!', showConfirmButton: true})
    } else {
        var x = document.querySelectorAll('#' + localStorage.getItem('target'));
        x[0].classList.remove('active');
        x[1].classList.remove('active');
        localStorage.setItem('target', 'tab3');
        list_form();
    }

});

$('#next3').click(function () {
    if (localStorage.getItem('rab') == '[]' || localStorage.getItem('rab') == null) {
        Swal.fire({icon: 'error', title: 'Silahkan Lengkapi Data Terlebih Dahulu!', showConfirmButton: true})

    } else {
        var x = document.querySelectorAll('#' + localStorage.getItem('target'));
        x[0].classList.remove('active');
        x[1].classList.remove('active');
        localStorage.setItem('target', 'tab4');
        list_form();
    }

});

$('#prev3').click(function () {
    var x = document.querySelectorAll('#' + localStorage.getItem('target'));
    x[0].classList.remove('active');
    x[1].classList.remove('active');
    localStorage.setItem('target', 'tab3');
    list_form();
});

$('#prev2').click(function () {
    var x = document.querySelectorAll('#' + localStorage.getItem('target'));
    x[0].classList.remove('active');
    x[1].classList.remove('active');
    localStorage.setItem('target', 'tab2');
    list_form();
});

$('#prev1').click(function () {
    var x = document.querySelectorAll('#' + localStorage.getItem('target'));
    x[0].classList.remove('active');
    x[1].classList.remove('active');
    localStorage.setItem('target', 'tab1');
    list_form();
});


function tampilProposal(params) {

    let dataArray = JSON.parse(localStorage.getItem('data')) || [];
    let i = 0;
    dataArray.forEach(function (data, index) {

        $('#nidn1').val(data.nidn1);
        $('#judul_penelitian').val(data.judul_penelitian);
        $('#anggaran').val(data.anggaran);
        $('#luaran_wajib').val(data.luaran_wajib);
        $('#luaran_tambahan').val(data.luaran_tambahan);
        $('#dokumen_proposal').val(data.dokumen_proposal);
        $('#bidang').append(`<option value="${
            data.bidang
        }" selected>${
            data.optBidang
        }</option>`);
        $('#tahun_penelitian').append(`<option value="${
            data.tahun_penelitian
        }" selected>${
            data.optTahun
        }</option>`);
        $('#jenis_proposal').append(`<option value="${
            data.jenis_proposal
        }" selected hidden >${
            data.optJenis
        }</option>`);

    });

}
// fungsi Tampil Dosen
function tampilDosen() {

    let dataArray = JSON.parse(localStorage.getItem('dosen')) || [];
    let dataHTML = '';
    let i = 0;
    dataArray.forEach(function (data, index) {
        dataHTML += `<tr>
            <td>${
            ++ i
        }</td>
            <td>${
            data.nidn2
        }</td>
            <td>${
            data.uraian_tugas_dosen
        }</td>
            <td><button class="btn btn-danger" onclick="deleteDosen(${index})"><i class="uil-trash-alt"></i></button></td>
            </tr>`;

    });

    document.querySelector('#anggotaDosen tbody').innerHTML = dataHTML;
};

// fungsi tampil mahsiswa
function tampilMhs() {

    let dataArray = JSON.parse(localStorage.getItem('mhs')) || [];
    let dataHTML = '';
    let i = 0;
    dataArray.forEach(function (data, index) {
        dataHTML += `<tr>
            <td>${
            ++ i
        }</td>
            <td>${
            data.nim
        }</td>
            <td>${
            data.uraian_tugas_mhs
        }</td>
            <td><button class="btn btn-danger" onclick="deleteMhs(${index})"><i class="uil-trash-alt"></i></button></td>
            </tr>`;

    });

    document.querySelector('#anggotaMahasiswa tbody').innerHTML = dataHTML;
};
// fungsi tampil Rab
function tampilRab() {

    let dataArray = JSON.parse(localStorage.getItem('rab')) || [];
    let dataHTML = '';
    let i = 0;
    dataArray.forEach(function (data, index) {
        dataHTML += `<tr>
            <td>${
            ++ i
        }</td>
            <td>${
            data.uraian_kegiatan
        }</td>
            <td>${
            data.qty
        }</td>
        <td>${
            data.satuan
        }</td>
        <td>${
            data.nominal
        }</td>
        <td><button class="btn btn-danger" onclick="deleteRab(${index})"><i class="uil-trash-alt"></i></button></td>
            </tr>`;

    });

    document.querySelector('#table_rab tbody').innerHTML = dataHTML;
};


// Delete Dosen
function deleteDosen(index) {
    var dosen;
    if (localStorage.getItem("dosen") == null) {
        dosen = [];
    } else {
        dosen = JSON.parse(localStorage.getItem("dosen"));
    } dosen.splice(index, 1);
    localStorage.setItem("dosen", JSON.stringify(dosen));
    tampilDosen();
};
// Delete mhs
function deleteMhs(index) {
    var mhs;
    if (localStorage.getItem("mhs") == null) {
        mhs = [];
    } else {
        mhs = JSON.parse(localStorage.getItem("mhs"));
    } mhs.splice(index, 1);
    localStorage.setItem("mhs", JSON.stringify(mhs));
    tampilMhs();
};
// Delete Rab
function deleteRab(index) {
    var rab;
    if (localStorage.getItem("rab") == null) {
        rab = [];
    } else {
        rab = JSON.parse(localStorage.getItem("rab"));
    } rab.splice(index, 1);
    localStorage.setItem("rab", JSON.stringify(rab));
    tampilRab();
};


// Hapus inputan modal Saat modal hilang
$('#mDosen').on('hidden.bs.modal', function () {
    $('#nidn2').val('');
    $('#uraian_tugas_dosen').val('');
});
$('#mMahasiswa').on('hidden.bs.modal', function () {
    $('#nim').val('');
    $('#uraian_tugas_mhs').val('');
});
$('#mRab').on('hidden.bs.modal', function () {
    $('#uraian_kegiatan').val('');
    $('#qty').val('');
    $('#nominal').val('');
    $('#satuan').val('');
});
