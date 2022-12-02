<?=$this->extend('backend/template')?>

<?=$this->section('content')?>

<div class="card-body">
    <div class="table-responsive">
        <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

        <table id='tabel-pelanggan' class="datatable table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Gender</th>
                    <th>Tanggal Lahir</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Token Reset</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pustawakan</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formPustakawan" method="post" action="<?=base_url('pustakawan')?>" class="was-validated">
                    <input type="hidden" name="id" />
                    <input type="hidden" name="_method" />
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap </label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Data Nama Depan" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-control" required aria-label="select example">
                            <option value="">Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">Example invalid select feedback</div>
                    </div >
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" aria-label="date example" required>
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select name="level" class="form-control">
                            <option value="P">P</option>
                            <option value="K">K</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukan  Email" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sandi</label>
                        <input type="password" name="sandi" class="form-control" placeholder="Masukan  Sandi" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NO HP</label>
                        <input type="text" name="nohp" class="form-control" placeholder="Masukan  No HP" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukan  Alamat" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-label">Kota
                        <label class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control" placeholder="Masukan  Kota" required />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Token Reset</label>
                        <input type="text" name="token_reset" class="form-control" placeholder="Masukan  Token Reset" required />
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
        $('form#formPustakawan').submitAjax({
            pre:()=>{
                $('button#btn-kirim').hide();
            },
            pasca:()=>{
                 $('button#btn-kirim').show();
            },
            success:(response, status)=>{
                $("#modalForm").modal('hide');
                $("table#tabel-pelanggan").DataTable().ajax.reload();
                alert('Data berhasil ditambahkan')
            },
            error:(xhr, status)=>{
                alert('Maaf, data pustakawan gagal direkam');
            }
        });

        $('button#btn-kirim').on('click', function(){
            $('form#formPustakawan').submit();
        });
        $('button#btn-tambah').on('click', function(){
            $('#modalForm').modal('show');
            $('form#formPustakawan').trigger('reset');
            $('input[name=_method]').val('');
        });

        $('table#tabel-pelanggan').on('click', '.btn-edit', function(){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
                $.get(`${baseurl}/pustakawan/${id}`).done((e)=>{
                $('input[name=id]').val(e.id);
                $('input[name=nama_lengkap]').val(e.nama_lengkap);
                $('input[name=gender]').val(e.gender);
                $('input[name=tgl_lahir]').val(e.tgl_lahir);
                $('input[name=level]').val(e.level);
                $('input[name=email]').val(e.email);
                $('input[name=nohp]').val(e.nohp);
                $('input[name=alamat]').val(e.alamat);
                $('input[name=kota]').val(e.kota);
                $('input[name=token_reset]').val(e.token_reset);
                $('#modalForm').modal('show');
                $('input[name=_method]').val('patch');
            });
        });

        $('table#tabel-pelanggan').on('click', '.btn-hapus', function(){
            let konfirmasi = confirm('Data Pustakawan akan dihapus, mau dilanjutkan?');
            if(konfirmasi === true){
                let _id = $(this).data('id');
                let baseurl = "<?=base_url()?>";
                $.post(`${baseurl}/pustakawan`, {id:_id, _method:'delete'}).done(function(e){
                    $('table#tabel-pelanggan').DataTable().ajax.reload();
                })
            }
        });
        $('table#tabel-pelanggan').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "<?=base_url('pustakawan/all')?>",
                    method: 'GET'
                },
                columns:[
                    { data: 'id', sortable:false, searchable:false,
                        render: (data,type,row,meta)=>{
                            return meta.settings._iDisplayStart + meta.row + 1;
                        }
                    },
                    { data: 'nama_lengkap' },
                    { data: 'gender',
                      render:(data, type, meta, row)=>{
                        if(data === 'L')
                        return 'Laki-Laki';
                        else if( data === 'P'){
                            return 'Perempuan'
                        }
                        return data;
                      }
                    },
                    { data: 'tgl_lahir'},
                    { data: 'level',
                      render:(data, type, meta, row)=>{
                        if(data === 'P')
                        return 'P';
                        else if( data === 'K'){
                            return 'K'
                        }
                        return data;
                      }
                    },
                    { data: 'email' },
                    { data: 'nohp'},
                    { data: 'alamat'},
                    { data: 'kota'},
                    { data: 'token_reset' },
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