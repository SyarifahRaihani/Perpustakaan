<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js"></script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



<div class="container">
    <button class="float-end btn btn-sm btn-primary" id="btn-tambah">Tambah</button>

    <table id='table-pelanggan' class="datatable table table-bordered">
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

<div id="modalForm" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pustawakan</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formPustakawan" method="post" action="<?=base_url('pustakawan')?>">
                <input type="hidden" name="id" />
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap </label>
                    <input type="text" name="nama_lengkap" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" />
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
                    <input type="email" name="email" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Sandi</label>
                    <input type="password" name="sandi" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">NO HP</label>
                    <input type="text" name="nohp" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" />
                </div>
                <div class="form-label">Kota
                    <label class="form-label">Kota</label>
                    <input type="text" name="kota" class="form-control" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Token Reset</label>
                    <input type="text" name="token_reset">
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
        $('form#formPustakawan').submitAjax({
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
            alert('Maaf, data pustakawan gagal direkam');
        }
        })

        $('button#btn-kirim').on('click', function(){
            $('form#formPustakawan').submit();
        });

       $('button#btn-tambah').on('click', function(){
           $('#modalForm').modal('show');
           $('form#formPustakawan').trigger('reset');
       });

        $('table#table-pelanggan').on('click', '.btn-edit', function(){
            let id = $(this).data('id');
            let baseurl = "<?=base_url()?>";
            $.get(`${baseurl}/pustakawan/${id}`).done((e)=>{

            });
        })
        
        $('table#table-pelanggan').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "<?=base_url('pustakawan/all')?>",
                method: 'GET'
            },
            colums:[
                { data: 'id', sortable:false, searchable:false,
                  render: (data, type, row, meta)=>{
                    return meta.settings._iDisplayStart + meta.row + 1;
                  }
                },
                { data: 'nama_lengkap' },
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
                { data: 'tgl_lahir'},
                { data: 'level',
                   render: (data, type, meta, row)=>{
                    if(data === 'P'){
                        return 'P';
                    }else if( data === 'K'){
                        return 'K';
                    }
                    return data;
                    }
                },
                { data: 'email' },
                { data: 'nohp' },
                { data: 'alamat' },
                { data: 'kota' },
                { data: 'token_reset' },
                { data: 'id', 
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