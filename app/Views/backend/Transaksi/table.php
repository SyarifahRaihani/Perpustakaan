<?=$this->extend('backend/template')?>

<?=$this->section('content')?>
    
<div class="container">
    <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='table-pelanggan' class="datatable table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Harus Kembali</th>
                <th>Anggota</th>
                <th>Stok Koleksi</th>
                <th>Pustakawan</th>
                <th>Kembali Pustakawan</th>
                <th>Denda</th>
                <th>Status </th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Form Transaksi</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formTransaksi" method="post" action="<?=base_url('transaksi')?>" class="was-validated">
                <input type="hidden" name="id" />
                <input type="hidden" name="_method" />
                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control" aria-label="date example" required />
                    <div class="invalid-feedback">Example invalid form file feedback</div>
                </div>
                <div class="mb-3">
                        <label class="form-label">Tanggal Harus Kembali</label>
                            <input type="date" name="tgl_harus_kembali" class="form-control" aria-label="date example" required />
                            <div class="invalid-feedback">Example invalid form file feedback</div>
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
                        <label class="form-label">Stok Koleksi</label>
                        <select name="stokkoleksi_id" class="form-control" required aria-label="select example">
                            <option value="">Stok Koleksi</option>
                            <?php foreach($stokkoleksi as $sk):?>
                            <option value='<?=$sk['id']?>'><?=$sk['nomor']?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div>
                <div class="mb-3">
                        <label class="form-label">Denda</label>
                        <input type="double" name="denda" class="form-control" placeholder="Masukan denda" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status_trx" class="form-control" required aria-label="select example">
                            <option value="">Status</option>
                            <option value="K">Kembali</option>
                            <option value="R">Rusak</option>
                            <option value="H">Hilang</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div >
                <div class="mb-3">
                        <label class="form-label">Catatan</label>
                        <input type="text" name="catatan" class="form-control" placeholder="Kondisi Buku" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                </div>
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
            dropdownParent: $('form#formTransaksi')
        });

        $('form#formTransaksi').submitAjax({
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
                alert('Maaf, data Transaksi gagal direkam');
            }
        });
        $('button#btn-kirim').on('click', function(){
            $('form#formTransaksi').submit();
        });

        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formTransaksi').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#table-pelanggan').on('click', '.btn-edit', function(){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/transaksi/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=tgl_pinjam]').val(e.tgl_pinjam);
                $('input[name=tgl_harus_kembali]').val(e.tgl_harus_kembali);
                $('input[name=anggota]').val(e.anggota);
                $('input[name=stokkoleksi]').val(e.stokkoleksi);
                $('input[name=pustakawan]').val(e.pustakawan);
                $('input[name=pustakawan]').val(e.pustakawan);
                $('input[name=denda]').val(e.denda);
                $('input[name=status]').val(e.status);
                $('input[name=catatan]').val(e.catatan);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });

        $('table#table-pelanggan').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data Transaksi akan dihapus, mau dilanjutkan?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/transaksi`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#table-pelanggan').DataTable().ajax.reload();
                })
            }
        });

        $('table#table-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('transaksi/all')?>",
                method: 'GET'
            },
            columns:[
                { data: 'id', sortable:false, searchable:false,
                    render: (data,type,row,meta)=>{
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                },
                { data: 'tgl_pinjam' },
                { data: 'tgl_harus_kembali'},
                { data: 'anggota'},
                { data: 'stokkoleksi' },
                { data: 'pustakawan' },
                { data: 'pustakawan'},
                { data: 'denda'},
                { data: 'status_trx',
                    render:(data, type, meta, row)=>{
                        if(data === 'P')
                        return 'Pinjam';
                        else if( data === 'K'){
                            return 'Kembali';
                        }
                        else if( data === 'R'){
                            return 'Rusak'
                        }
                        else if( data === 'H'){
                            return 'Hilang'
                        }
                        return data;
                        }
                },
                { data: 'catatan'},
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
<?=$this->endSection()?>