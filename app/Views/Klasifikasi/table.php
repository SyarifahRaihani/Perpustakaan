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
       
    
<div class="container">
    <button class="'float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='table-klasifikasi' class="datatable table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Ddc</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $(document).ready(function(){
        $('table#table-klasifikasi').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('klasifikasi/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id',},
                { data: 'ddc'},
                { data: 'nama'},
                { data: 'id'}
            ]
        });
    });
</script>