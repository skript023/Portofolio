@extends('front_end_helper.front_end')
@section('artikel')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Lupa Password</h1>
            
            <div class="card">
                <div class="card-body">
                <?php if(!isset($emailSent)): ?>
                <?php 
                    if(isset($_POST['forgotPassword']))
                    {
                        if(!email_exists($email))
                        {
                            echo 'email tidak terdaftar';
                        }
                    } 
                ?>
                    <form method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="input email">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-outline-primary" name="forgotPassword">
                        </div>
                    </form>
                        <?php else: ?>
                        <h1>Silahkan Cek Email Anda</h1>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection