<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        
<table id='table-pemesanan' class="database table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl_awal</th>
            <th>Tgl_akhir</th>
            <th>Koleksi_id</th>
            <th>Status_pesan</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Deleted_at</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function(){
        $('table#table-pemesanan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('pemesanan/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searc},
                { data: 'tgl_awal'},
                { data: 'tgl_akhir'}, 
                { data: 'koleksi_id'},
                { data: 'status_pesan'},
                { data: 'created_at'},
                { data: 'updated_at'},
                { data: 'deleted_at'},
                { data: 'id'}
            ]
        });
    });
</script>