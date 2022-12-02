<?=$this->extend('backend/template')?>

<?=$this->section('content')?>

    
       <!-- Begin Page Content -->
       <div class="container-fluid">

<!-- Page Heading -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
     <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>
   
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id='table-pelanggan' class="datatable table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Awal</th>
                        <th>Tanggal Akhir</th>
                        <th>Koleksi</th>
                        <th>Anggota</th>
                        <th>Status Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

       

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pemesanan</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formPemesanan" method="post" action="<?=base_url('pemesanan')?>" class="was-validated">
                    <input type="hidden" name="id" />
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Tanggal Awal</label>
                            <input type="date" name="tgl_awal" class="form-control" aria-label="date example" required>
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control" aria-label="date example" required>
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Koleksi</label>
                        <select name="koleksi_id" class="form-control" required aria-label="select example">
                            <option value="">Koleksi</option>
                            <?php foreach($koleksi as $kl):?>
                            <option value='<?=$kl['id']?>'><?=$kl['judul']?></option>
                        <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Anggota</label>
                        <select name="anggota_id" class="form-control" required aria-label="select example">
                            <option value="">Angota</option>
                            <?php foreach($anggota as $ag):?>
                            <option value='<?=$ag['id']?>'><?=$ag['nama_depan']?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Pesan</label>
                        <select name="status_pesan" class="form-control" required aria-label="select example">
                            <option value="">Status Pesan</option>
                            <option value="B">Baru Pesan</option>
                            <option value="O">Oke</option>
                            <option value="X">Batal</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div >
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="btn-kirim">Kirim</button>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>

<?=$this->Section('script')?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js">

</script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function(){
        $('.selok').select2({width:'100%',
            dropdownParent: $('form#formPemesanan')
        });

        $('form#formPemesanan').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                $('button#btn-kirim').show();
            },
            success:(response, status)=>{
                $("modalForm").modal('hide');
                $("table#table-pelanggan").DataTable().ajax.reload();
                alert('Data berhasil ditambahkan')
            },
            error: (xhr, status)=>{
                alert('Maaf, data Pemesanan gagal direkam');
            }
        });

        $('button#btn-kirim').on('click', function(){
            $('form#formPemesanan').submit();
        });

        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formPemesanan').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#table-pelanggan').on('click', '.btn-edit', function(){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/pemesanan/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=tgl_awal]').val(e.tgl_awal);
                $('input[name=tgl_akhir]').val(e.tgl_akhir);
                $('input[name=koleksi]').val(e.koleksi);
                $('input[name=anggota]').val(e.anggota);
                $('input[name=status_pesan]').val(e.status_pesan);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });

        $('table#table-pelanggan').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data Pemesanan akan dihapus, mau dilanjutkan?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/pemesanan`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-pelanggan').DataTable().ajax.reload();
                })
            }
        });

        $('table#table-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('pemesanan/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searchable:false,
                render: (data,type,row,meta)=>{
                return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                { data: 'tgl_awal'},
                { data: 'tgl_akhir'}, 
                { data: 'koleksi'},
                { data: 'anggota'},
                { data: 'status_pesan',
                  render:(data, type, meta, row)=>{
                    if(data === 'B')
                    return 'Baru Pesan';
                    else if( data === 'O'){
                        return 'Oke';
                    }
                    else if( data === 'X'){
                        return 'Batal'
                    }
                    return data;
                  }
                },
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
<?=$this->endSection()?>