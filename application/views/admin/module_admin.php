<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://skor.dosh.gov.my/asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>

<script>
	$(document).ready(function(){

$("#model").change(function(){

	url = "<?=base_url()?>index.php/admin/module_admin_add";

	$.post(url,{mdi : $("#model").val() } ,function(data){
		
	$("#user").show();
	$("#papar").html(data).show();

	});

	});

	$("#nama").keyup(function(){
	
	urlx = "<?=base_url()?>index.php/admin/module_admin_user"; 
	$.post(urlx,{cari : $("#nama").val() },function(datax){
	
		$("#senaraiuser").html(datax).show();
		
	})
	
	});

	

	});

</script>
<div class="row">
	<div class="span7">

		<form action='#' id='add' class='contact-us form-horizontal' autocomplete='off'>

			<div class="control-group">
				<label class="control-label">Module</label>
				<div class="controls">

					<div class="input-prepend">

						<span class="add-on"><i class="icon-group"></i> </span>
						<select class='span4' id='model'>
							<option value='' > Sila Pilih Moduel</option>
							<option value='ict' > Pinjaman ICT</option>
							<option value='tempahbilik' > Tempahan Bilik</option>
							<option value='tempahmakan' > Tempahan Makanan</option>
							<option value='alattulis' > Alatan Pejabat</option>
							<option value='kenderaan' > Kenderaan</option>
							<option value='pergerakan' > Pergerakan Pegawai</option>
							<option value='kedatangan' > Kedatangan</option>
							<option value='perpustakaan' > Perpustakaan</option>
							<option value='latihan' > Latihan</option>
						</select>
					</div>
				</div>
			</div>
			<div class="control-group" id="user" style="display:none;">
				<label class="control-label">Pengguna</label>
				<div class="controls">

					<div class="input-prepend">

						<span class="add-on"><i class="icon-group"></i> </span>
						<input id="nama" class="span4"  type="text"/>
					</div>
				</div>
			</div>

		</form>
		<div id="senaraiuser">
			
		</div>
	</div>
	<div class="span7" >
	
			<div id="papar" style="display:none;">

			</div>
		

	</div>
