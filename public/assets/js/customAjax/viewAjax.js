// tabel proposal
$('#proposalTable').DataTable({
    processing: true,
    serverside: true,
    // , paging: false
    // , paging: false
    info: false,
    responsive: true,
    ajax: 'viewProposal',
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            seacrable: false
        },
        {
            data: 'nidn',
            name: 'NIDN',
            orderable: false
        },
        {
            data: 'judul_penelitian',
            name: 'Judul_penelitian',
            orderable: false
        },
        {
            data: 'tahun_penelitian',
            name: 'Tahun_Penelitian',
            orderable: false
        }, {
            data: 'luaran_wajib',
            name: 'luaran_wajib',
            orderable: false
        }, {
            data: 'luaran_tambahan',
            name: 'luaran_tambahan',
            orderable: false
        }, {
            data: 'st',
            name: 'status',
            orderable: false
        }, {
            data: 'aksi',
            name: 'Aksi',
            orderable: false
        }
    ]
});
