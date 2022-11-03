<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.com/jquery-3.6.1.min.js" 
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"  
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"  
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js" 
            crossorigin="anonymous"></script>
        <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet"> 
        <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
<div class="container">
    <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='table-pelanggan' class="datatable table table-bordered">
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
</div>

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body"></div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('button#btn-tambah').on('click', function(){
        $('modalForm').modal('show');


        $('form#formPustakawan').trigger('reset');
        });
        $('table#table-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('anggota/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searchable:false,
                  render: (data,type,row,meta)=>{
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                { data: 'nama_depan'},
                { data: 'nama_belakang'},
                { data: 'email'},
                { data: 'nohp'},
                { data: 'alamat'},
                { data: 'kota'},
                { data: 'gender',
                    render: (data, type, meta, row)=>{
                    if(data === 'L'){
                        return 'Laki-Laki';
                    }else if( data === 'P'){
                        return 'Perempuan';
                    }
                    return data;
                  }
                },
                { data: 'tgl_daftar'},
                { data: 'berlaku_awal'},
                { data: 'berlaku_akhir'},
                {data: 'id',
                    render: (data,type, meta, row)=>{
                    var btnEdit = `<button class='btn-edit' data-id='$(data)'>Edit</button>`;
                    var btnHapus = `<button class='btn-Hapus' data-id='$(data)'>Hapus</button>`;
                    return btnEdit + btnHapus;
                  }
                }
            ]
        });
    });
</script>