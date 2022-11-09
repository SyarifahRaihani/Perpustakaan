<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<div class="container">
    <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='tabel-pelanggan' class="datatable table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Jilid</th>
                <th>edisi</th>
                <th>Penerbit</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Klasifikasi</th>
                <th>Jumlah Halaman</th>
                <th>ISBN</th>
                <th>Bahasa</th>
                <th>Stok</th>
                <th>Eksemplar</th>
                <th>Kategori</th>
                <th>Pustakawan</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Koleksi</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    <form id="formKoleksi" method="post" action="<?=base_url('koleksi')?>">
                        <input type="hidden" name="id" />
                        <input type="hidden" name="_method" />
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jilid</label>
                            <input type="text" name="jilid" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Edisi</label>
                            <input type="text" name="edisi" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penerbit </label>
                            <input type="text" name="penerbit_id" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="date" name="thn_terbit" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Klasifikasi</label>
                            <input type="text" name="klasifikasi_id" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Halaman</label>
                            <input type="text" name="juml_halaman" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" name="isbn" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bahasa</label>
                            <input type="text" name="bahasa_id" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="text" name="stok" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Eksemplar</label>
                            <input type="text" name="eksemplar" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori_id" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pustakawan</label>
                            <input type="text" name="pustakawan_id" class="form-control" />
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn-kirim">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('form#formKoleksi').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response, status)=>{
                $("#modalForm").modal('hide');
                $("table#tabel-pelanggan").DataTable().ajax.reload();
            },
            error:(xhr, status)=>{
                alert('Maaf, data anggota gagal direkam');
            }
        });

        $('button#btn-kirim').on('click', function(){
            $('form#formKoleksi').submit();
        });

        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formKoleksi').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#tabel-pelanggan').on('click', '.btn-edit', function(){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/koleksi/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=judul]').val(e.judul);
                $('input[name=jilid]').val(e.jilid);
                $('input[name=edisi]').val(e.edisi);
                $('input[name=penerbit_id]').val(e.penerbit_id);
                $('input[name=penulis]').val(e.penulis);
                $('input[name=thn_terbit]').val(e.thn_terbit);
                $('input[name=klasifikasi_id]').val(e.klasifikasi_id);
                $('input[name=juml_halaman]').val(e.juml_halaman);
                $('input[name=isbn]').val(e.isbn);
                $('input[name=bahasa_id]').val(e.bahasa_id);
                $('input[name=stok]').val(e.stok);
                $('input[name=eksemplar]').val(e.eksemplar);
                $('input[name=kategori_id]').val(e.kategori_id);
                $('input[name=pustakawan_id]').val(e.pustakawan_id);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });

        $('table#tabel-pelanggan').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data Koleksi akan dihapus, mau dilanjutkan?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/koleksi`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#tabel-pelanggan').DataTable().ajax.reload();
                })
            }
        });

        $('table#tabel-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('koleksi/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searchable:false,
                    render: (data,type,row,meta)=>{
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                { data: 'judul'},
                { data: 'jilid'},
                { data: 'edisi'},
                { data: 'penerbit_id'},
                { data: 'penulis'},
                { data: 'thn_terbit'},
                { data: 'klasifikasi_id'},
                { data: 'juml_halaman'},
                { data: 'isbn'},
                { data: 'bahasa_id'},
                { data: 'stok'},
                { data: 'eksemplar'},
                { data: 'kategori_id'},
                { data: 'pustakawan_id'},
                { data: 'id',
                    render: (data,type, meta, row)=>{
                    var btnEdit = `<button class='btn-edit btn-warning' data-id='${data}'>Edit</button>`;
                    var btnHapus = `<button class='btn-hapus btn-danger' data-id='${data}'>Hapus</button>`;
                    return btnEdit + btnHapus;
                    }
                }
            ]
        });
    });
</script>