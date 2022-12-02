<!DOCTYPE html>
<html>
    <head>
        <title>Login Sistem Informasi Perpustakaan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>

        <div class="container">
            <form id="form-login" method="post" action="<?=base_url('/login')?>">
                <h3>Login Sistem Informasi Perpustakaan</h3>

                <div class="row">
                    <div class="form-froup col-md-4">
                        <div class="mb<label for="email" class="formilabel">Alamat Email</label>-3">
                            
                            <input type="email" name="email" class="form-control" id="email"
                                    placeholder="nama@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="sandi" class="form-label">Sandi Sistem</label>
                            <input type="password" name="sandi" class="form-control" id="sandi">
                        </div>

                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
    
    <?=$this->Section('script')?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/agoenxz2186/submitAjax@develop/submit_ajax.js">
</script>
<link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('form#form-login').submitAjax({
                pre:()=>{
                    $('form#form-login button[type=submit]').hide();
                },
                pasca:()=>{
                    $('form#form-login button[type=submit]').show();
                },
                success:(response, status)=>{
                    var js = $.parseJSON(response);
                    alert(js.message);
                    window.location = "<?=url_to('pustakawan')?>";
                },
                error: (xhr, status)=>{
                    var json = $.parseJSON(   xhr.responseText  );
                    alert(json.message);
                }
            });
        });
    </script>
    <?=$this->endSection('script')?>
</html>
