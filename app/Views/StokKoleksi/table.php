<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.com/jquery-3.6.1.min.js" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        
<table> id='tabel-stok_koleksi' class="database table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Koleksi_id</th>
            <th>Nomor</th>
            <th>Status_tersedia</th>
            <th>Anggota_id</th>
            <th>Pustakawan_id</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Deleted_at</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function(){
        $('table#table-stok_koleksi').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('stok_koleksi/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searc},
                { data: 'koleksi_id'},
                { data: 'nomor'},
                { data: 'status_tersedia'},
                { data: 'anggota_id'},
                { data: 'pustakawan_id'},
                { data: 'created_at'},
                { data: 'updated_at'},
                { data: 'deleted_at'},
                { data: 'id'}
            ]
        });
    });
</script>