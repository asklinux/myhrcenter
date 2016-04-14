 <script>
$(document).ready(function(){

	$("#tukar").click(function(){
		
		
		var user 	= '<?=$username?>';
		var password 	= $("#password").val();
		var bahagian 	= $("#bahagian").val();
		var nophone 	= $("#nophone").val();
		var nophoneb	= $("#nophonehp").val();
		var jawatan	= $("#jawatan").val();
		var grad	= $("#grad").val();
		var noic    	= $("#noic").val();

		
	if( user =='' || password =='' || bahagian == '' || nophone == '' || noic == '' || grad == '' || jawatan == '' || nophoneb == ''){

		alert("Sila Masukkan semua Maklumat ...!!!!!!");

	}else {
		data = {
		     user : user,
		     password : password,
		     bahagian : bahagian,
		     nophone : nophone,
		     nophoneb : nophoneb,
		     jawatan : jawatan,
		     grad : grad,
		     noic : noic
		};	
		
		$.post("<?=base_url()?>index.php/panel/change_profile",data,
			
		function(data) {
			if(data =='berjaya'){

				alert(data);
				var redirect = 'http://ldap.dosh.gov.my/sso/index.php/panel'; 
				window.location = redirect;

			} else{
				//alert("Gagal Update");
				alert(data);
			}
		});
	}
	});
});
</script>   
 <section class="page container" id="content">
        <div class="row">


                        </section>

    			<div class="span4"></div>
                    <div class="span8">
                        <div class="container-signin">
                            <legend>Kemasukan Kali Pertama , Sila Tukar Katalaluan</legend>
                            <form action='#' id='loginForm' class='form-signin' autocomplete='off'>
                                <div class="form-inner">
                                    	<div class="input-prepend">
                                        
                                        <span class="add-on" rel="tooltip" title="Username or E-Mail Address" data-placement="top"><i class="icon-user"></i></span>
                                        <input type='text' class='span5' id='username' value='<?=$username?>' disabled/>
                                    	</div>

                                    	<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-key"></i> </span>
                                        <input type='password' class='span5' id='password' placeholder='Katalaluan Baru Anda'/>
                                    	</div>

					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-group"></i> </span>
					<select class='span5' id='bahagian'>
						<option value='' > Sila Pilih Bahagian/Cawangan</option>
						<?php
						for($i = 0; $i < count($bahagian)-1; $i++) {
				
							echo "<option value='".$bahagian[$i]['gidnumber'][0]."'>".$bahagian[$i]['cn'][0]."</option>";
	
						}
						?>
						
  						
					</select>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-phone"></i></span>
                                        <input type='text' class='span5' id='nophone' placeholder='No Tel Pejabat'/>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-phone-sign"></i></span>
                                        <input type='text' class='span5' id='nophonehp' placeholder='No Tel Bimbit'/>
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-credit-card"></i></span>
                                        <input type='text' class='span5' id='noic' placeholder='No Kad Pengenala cht:- 890717045312' />
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-info-sign"></i></span>
                                        <input type='text' class='span5' id='jawatan' placeholder='Jawatan cth:- Penolong Pegawai Takdbir' />
                                    	</div>
					<div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-info-sign"></i></span>
                                        <input type='text' class='span5' id='grad' placeholder='Grad cth:- N27' />
                                    	</div>

					
                                     
				</div>
                                <footer class="signin-actions">
                                    <input class="btn btn-primary" type='button' name='login' id="tukar" value='Tukar Katalaluan'/>
                                </footer>
                            </form>
                        </div>
                    </div>
                    <div class="span3"></div>
                </div>
		

            </div>
        </div>

        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>
