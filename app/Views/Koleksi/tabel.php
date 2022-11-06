<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container">
    <button class="float-end btn btn-primary" id="btn-nanbah">Tambah</button>
    <table id='table-koleksi' class="database table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>judul</th>
                <th>jilid</th>
                <th>edisi</th>
                <th>penerbit_id</th>
                <th>penulis</th>
                <th>thn_terbit</th>
                <th>klasifikasi_id</th>
                <th>juml_halaman</th>
                <th>isbn</th>
                <th>bahasa_id</th>
                <th>stok</th>
                <th>eksemplar</th>
                <th>kategori_id</th>
                <th>pustakawan_id</th>
                <th>aksi</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('table#table_koleksi').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('koleksi/all') ?>",
                method: 'GET'
            },
            columns: [{
                    data: 'id',
                    sortable: false,
                    searc
                },
                {
                    data: 'judul'
                },
                {
                    data: 'jilid'
                },
                {
                    data: 'edisi'
                },
                {
                    data: 'penerbit_id'
                },
                {
                    data: 'penulis'
                },
                {
                    data: 'thn_terbit'
                },
                {
                    data: 'klasifikasi_id'
                },
                {
                    data: 'juml_halaman'
                },
                {
                    data: 'isbn'
                },
                {
                    data: 'bahasa_id'
                },
                {
                    data: 'stok'
                },
                {
                    data: 'eksemplar'
                },
                {
                    data: 'kategori_id'
                },
                {
                    data: 'pustawakan_id'
                },
                {
                    data: 'id'
                },
            ]
        });
    });
</script>