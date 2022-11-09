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
    <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='table-pelanggan' class="datatable table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Negara</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Penerbit</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
            <form id="formPenerbit" method="post" action="<?=base_url('penerbit')?>">
                <input type="hidden" name="id" />
                <input type="hidden" name="_method" />
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" name="kota" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Negara</label>
                    <input type="text" name="negara" class="form-control" />
                </div>
            </form>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn-kirim">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('form#formPenerbit').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response, status)=>{
                $("modalForm").modal('hide');
                $("table#table-pelanggan").DataTable().ajax.reload();
            },
            error: (xhr, status)=>{
                alert('Maaf, data Penerbit gagal direkam');
            }
        });

        $('button#btn-kirim').on('click', function(){
            $('form#formPenerbit').submit();
        });

        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formPenerbit').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#table-pelanggan').on('click', '.btn-edit', function(){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/penerbit/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=nama]').val(e.nama);
                $('input[name=kota]').val(e.kota);
                $('input[name=negara]').val(e.negara);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });

        $('table#table-pelanggan').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data Penerbit akan dihapus, mau dilanjutkan?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/penerbit`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-pelanggan').DataTable().ajax.reload();
                })
            }
        });

        $('table#table-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('penerbit/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searchable:false,
                    render: (data,type,row,meta)=>{
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                { data: 'nama' },
                { data: 'kota'},
                { data: 'negara' },
                { data: 'id',
                    render: (data,type, meta, row)=>{
                    var btnEdit = `<button class='btn-edit btn-warning' data-id='${data}'>Edit</button>`;
                    var btnHapus = `<button class='btn-hapus btn-danger' data-id='${data}'>Hapus</button>`;
                    return btnEdit + btnHapus;
                    }
                },
            ]
        });
    });
</script>