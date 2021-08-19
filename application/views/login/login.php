<?= $this->session->flashdata('pesan'); ?>
    <div class="login-box">
    		<div class="login-logo">
                <a href="https://suradi.malangkota.go.id/"><img src="https://suradi.malangkota.go.id/aset/img/logo.png"></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body animated bounceInDown">
            	<p class="login-box-msg">Sign in to start your session</p>
            	<form action="<?= base_url('login/proses');?>" method="POST" class="user">
            	    <div class="form-group has-feedback">
            			<input type="text" autofocus name="username" id="username" required class="form-control" placeholder="Username"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" autofocus name="password" id="password" required class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <!-- <div class="checkbox icheck">
                            	<label>Tahun</label>
                                <label>
                                    <select name="ta" class="form-control" required><option value="">--</option>
										<option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option><option value='2021' selected>2021</option>									</select>
                                </label>
                            </div>                         -->
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div><!-- /.col -->
                    </div>
                </form>

           </div><!-- /.login-box-body -->
           <div class="margin text-center">Suradi version 1.2.2 BETA Made with <i class="fas fa-heart"></i> by Kominfo Kota Malang | 2019</div>
        </div><!-- /.login-box -->
        <div class="error-page">
        <div class="row">
                <div class="form-group col-lg-4 text-center">
                    <a href="https://bsre.bssn.go.id/" target="_blank"><img src="https://suradi.malangkota.go.id/aset/img/logo-bsre.png" width="135px" height="50px"></a>
                </div>
                <div class="form-group col-lg-8 text-justify text-light-blue">
                    Surat Digital sudah mendukung tanda tangan elektronik dari Balai Sertifikasi Elektronik (BsrE) Badan Siber dan Sandi Negara (BSSN).
                </div>
        </div>
    </div>