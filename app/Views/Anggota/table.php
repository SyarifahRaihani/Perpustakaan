<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.com/jquery-3.6.1.min.js" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js" 
            crossorigin="anonymous"></script>
<table id='table-anggota' class="database table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Depan</th>
            <th>nama Belakang</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Gender</th>
            <th>Tanggal Daftar</th>
            <th>Status Aktif</th>
            <th>Berlaku Awal</th>
            <th>Berlaku Akhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function(){
        $('table#table-anggota').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('anggota/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searc},
                { data: 'nama_depan'},
                { data: 'nama_belakang'},
                { data: 'email'},
                { data: 'nohp'},
                { data: 'alamat'},
                { data: 'kota'},
                { data: 'gender'},
                { data: 'tgl_daftar'},
                { data: 'berlaku_awal'},
                { data: 'berlaku_akhir'},
                {data: 'id'}
            ]
        });
    });
</script>