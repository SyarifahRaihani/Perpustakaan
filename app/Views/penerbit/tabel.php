<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<table id='table-Penerbit' class="database table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>kota</th>
            <th>negara</th>
            <th>aksi</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function() {
        $('table#table_penerbit').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('penerbit/all') ?>",
                method: 'GET'
            },
            columns: [{
                    data: 'id',
                    sortable: false,
                    searc
                },
                {
                    data: 'nama'
                },
                {
                    data: 'kota'
                },
                {
                    data: 'negara'
                },
            ]

        });
    });
</script>