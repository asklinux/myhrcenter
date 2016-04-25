<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://skor.dosh.gov.my/asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" >
</script>	
<script>
	
	$(document).ready(function(){
		
		$("#save").click(function(){
			alert('test');
			url ="<?=base_url()?>index.php/admin/user_simpan";
			baru =  {
				username  : 'user'
			};
			$.post(url,baru,function(data){
				alert(data);
			});
			
			
		});
		
	});
	
</script>
<div class="box" >
	
<form action='#' id='add' class='contact-us form-horizontal' autocomplete='off'>
		<div class="form-inner">
			
			<div class="control-group">
						<label class="control-label">Nama Kakitangan</label>
						<div class="controls">
			<div class="input-prepend">

				<span class="add-on" rel="tooltip" title="Username or E-Mail Address" data-placement="top"><i class="icon-user"></i></span>
				<input type='text' class='span5' id='username' value='' />
			</div>
			</div></div>
			
			<div class="control-group">
						<label class="control-label">Katalaluan</label>
						<div class="controls">
							
			<div class="input-prepend">

				<span class="add-on"><i class="icon-key"></i> </span>
				<input type='password' class='span5' id='password' placeholder='Katalaluan Baru Anda'/>
			</div>
			</div></div>
			<div class="control-group">
						<label class="control-label">Bahagian / Cawangan</label>
						<div class="controls">
							
			<div class="input-prepend">

				<span class="add-on"><i class="icon-group"></i> </span>
				<select class='span5' id='bahagian'>
					<option value='' > Sila Pilih Bahagian/Cawangan</option>
					<?php
					for ($i = 0; $i < count($bahagian) - 1; $i++) {

						echo "<option value='" . $bahagian[$i]['gidnumber'][0] . "'>" . $bahagian[$i]['cn'][0] . "</option>";

					}
					?>
				</select>
			</div>
			</div></div>
			
			<div class="control-group">
						<label class="control-label">No Tel</label>
						<div class="controls">
			<div class="input-prepend">

				<span class="add-on"><i class="icon-phone"></i></span>
				<input type='text' class='span5' id='nophone' placeholder='No Tel Pejabat'/>
			</div>
			</div></div>
			<div class="control-group">
						<label class="control-label">No Mudah Alih</label>
						<div class="controls">
			<div class="input-prepend">

				<span class="add-on"><i class="icon-phone-sign"></i></span>
				<input type='text' class='span5' id='nophonehp' placeholder='No Tel Bimbit'/>
			</div>
			</div></div>
			<div class="control-group">
						<label class="control-label">No Kad Pengenalan</label>
						<div class="controls">
							
			<div class="input-prepend">

				<span class="add-on"><i class="icon-credit-card"></i></span>
				<input type='text' class='span5' id='noic' placeholder='No Kad Pengenala cht:- 890717045312' />
			</div>
			</div></div>
			<div class="control-group">
						<label class="control-label">Jawatan</label>
						<div class="controls">
			<div class="input-prepend">

				<span class="add-on"><i class="icon-info-sign"></i></span>
				<input type='text' class='span5' id='jawatan' placeholder='Jawatan cth:- Penolong Pegawai Takdbir' />
			</div>
			</div></div>
			<div class="control-group">
						<label class="control-label">Gred Jawatan</label>
						<div class="controls">
			<div class="input-prepend">

				<span class="add-on"><i class="icon-info-sign"></i></span>
				<input type='text' class='span5' id='grad' placeholder='Grad cth:- N27' />
			</div>
			</div></div>
		</div>
		
		<div class="control-group">
						<div class="controls">
		<footer class="signin-actions">
			<input class="btn btn-primary" type='button' name='simpan' id="save" value='Simpan'/>
		</footer>
		</div></div>
	</form>
</div>