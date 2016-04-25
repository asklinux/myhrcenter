<script src="<?=base_url()?>asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/clockpicker/dist/bootstrap-clockpicker.min.css">
<script>
	$(document).ready(function() {
		$("#bbaru").click(function() {
			$("#baru").show();
			$("#status").hide();
			$("#cari").hide();
			$("#admin").hide();
			$("#panduan").hide();
			$("#proses").hide();
		});

		$("#bstatus").click(function() {
			$("#status").show();
			$("#baru").hide();
			$("#cari").hide();
			$("#admin").hide();
			$("#panduan").hide();
			$("#proses").hide();
			
		});
		$("#bcari").click(function() {
			$("#status").hide();
			$("#baru").hide();
			$("#cari").show();
			$("#admin").hide();
			$("#panduan").hide();
			$("#proses").hide();
		});
		$("#bpanduan").click(function() {
			$("#status").hide();
			$("#baru").hide();
			$("#cari").hide();
			$("#admin").hide();
			$("#panduan").show();
			$("#proses").hide();
			
			$.post("<?=base_url()?>index.php/panel/get_panduan",{conf : 'panduan'},
			function(data){
				
				
				$( "#panduan_contant" ).html(data).show();
				
			});
		});
		
		<?php if ($admin == 1) { ?>
		$("#badmin").click(function() {
			$("#status").hide();
			$("#baru").hide();
			$("#cari").hide();
			$("#admin").show();
			$("#panduan").hide()
			$("#proses").hide();
			
			$.post("<?=base_url()?>index.php/panel/latihan_admin",{conf : 'bahagian'},
			function(data){
				
				//alert('test');
				$( "#adminc" ).html(data).show();
			});
			
		});
		
		<?php } ?>
		
		$("#latihan").submit(function(event)
		{
			
			
			db = {
				uid : "<?=$this->session->userdata['logged_in']['username']?>",
				tajuk :  $("#tajuk").val(),
				jenis :  $("#jenis").val(),
				tarikh_dari : $("#tarikh_dari").val(),
				tarikh_hingga : $("#tarik_hingga").val(),
				//masa_dari : $("#jumjam").val(),
				tempat : $("#tempat").val(),
				//jam : $("#jumjam").val(),
				sumber_data : $("#sumber_data").val(),
				tempat_bentang_data : $("#tempat_bentang_data").val(),
				pegawai_data : $("#pegawai_data").val(),
				jumjam_data : $("#jumjam_data").val(),
				jumhari_data :  $("#jumhari_data").val(),
				 
				 
			};
			//var masuk = $("#latihan").serializeArry();
			
			$.post("<?=base_url()?>index.php/panel/latihan_hadir",db,
			function(data){
				
				$("#status").text(data).show();
				$( "#status" ).text( "Kemasukkan Data telah di hantar" ).show().fadeOut( 10000 );
				$("#baru").hide();
			});
			event.preventDefault();
			
		});
		
		$("#carian").keyup(function(ec)
		{
		
		$.post("<?=base_url()?>index.php/panel/cari_latihan",{ cari : $("#carian").val() , uid : "<?=$this->session->userdata['logged_in']['username']?>"},
		function(data){
			
			$("#keputusan").html("<b>"+data+"</b>");
		});
		
		ec.preventDefault();	
		});
	}); 
</script>
<div class="row">
	<div class="span16" align="center">
		<div class="well well-small well-shadow">
			<h4>Sistem Log Kehadiran</h4>
		</div>
	</div>
	<div class="span2">
		<div class="box-content">
			<div class="btn-group-box">

				<button id="bbaru" class="btn btn-success">
					<i class="icon-pencil icon-large"></i>
					<br/>
					Log Baru
				</button>
				<button id="bcari" class="btn btn-warning">
					<i class="icon-search icon-large"></i>
					<br/>
					Carian
				</button>
				<button id="bstatus" class="btn">
					<i class="icon-list-alt icon-large"></i>
					<br/>
					Status
				</button><button id="bpanduan" class="btn">
					<i class="icon-book icon-large"></i>
					<br/>
					Panduan
				</button>
				<?php if ($admin == 1) { ?>
					<button id="badmin" class="btn btn-warning">
					<i class="icon-briefcase icon-large"></i>
					<br/>
					Admin
					</button>
				
				<?php } ?>
			</div>
		</div>
		<br />
	</div>
	<div class="span14">
		<div id="status" class="box">
			
			<div class="box-header">
				<i class="icon-inbox"></i>
				<h5>Log Latihan <?=date('Y')?></h5>
			</div>
			<div class="box-content">
				
				<table id="sejarah" class="table table-hover table-bordered tablesorter">
					<thead>
						<tr>
							<th width="15%">Tarikh</th>
							<th>Tajuk Latihan</th>
							<th>Jenis Latihan</th>
							<th class="td-actions" width="10%" >Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
				
						foreach ($stat as $s) {
						?>
							
						<tr>
							<td><?=$s->hadir_tarikh_dari?></td>
							<td><?=$s->hadir_tajuk?></td>
							<td><?=$s->latihan_jenis_nama?></td>
							<td class="td-actions">
								<?php if ($s->status == 1) { ?>
								<a href="javascript:;" class="btn btn-small btn-info"> 
								<i class="btn-icon-only icon-ok"></i></a>
								<?php } ?>
								<?php if ($s->status == 0) { ?>
								<a href="javascript:;" class="btn btn-small btn-danger"> 
								<i class="btn-icon-only icon-remove"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php
						}
				
						?>
						

					</tbody>
				</table>
				<button class="btn btn-small btn-info">
					<i class="btn-icon-only icon-ok"></i>
				</button>
				Telah Dipulangkan
				<button class="btn btn-small btn-danger">
					<i class="btn-icon-only icon-remove"></i>
				</button>
				Belum Dipulangkan
			</div>
		</div>

		<div id="baru" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-inbox"></i>
				<h5>Log Latihan Baru</h5>
			</div>
			<div class="box-content">
				<div id="status"></div>
				
				<script>
				
					$(document).ready(function() {
						
						$("#jenis").change(function(){
							
							jenis = $("#jenis").val();
							
							if(jenis == 0){
							$("#borang").slideUp();	
							}
							if(jenis == 1){
								$("#borang").slideDown();
								$("#ikuthari").show();
								$("#ikutjam").hide();
								$("#thingga").show();
								$("#tempat_view").show();
								$("#sumber").hide();
								$("#tempat_bentang").hide();
								$("#pegawai").hide();
							}
							if(jenis == 2){
								$("#borang").slideDown();
								$("#ikuthari").show();
								$("#ikutjam").hide();
								$("#thingga").show();
								$("#tempat_view").show();
								$("#sumber").hide();
								$("#tempat_bentang").hide();
								$("#pegawai").hide();
							}
							if(jenis == 3){
								$("#borang").slideDown();
								$("#ikuthari").hide();
								$("#ikutjam").show();
								$("#thingga").show();
								$("#tempat_view").show();
								$("#sumber").hide();
								$("#tempat_bentang").hide();
								$("#pegawai").hide();
							}
							if(jenis == 4){
								$("#borang").slideDown();
								$("#ikuthari").hide();
								$("#ikutjam").hide();
								$("#thingga").hide();
								$("#tempat_view").hide();
								$("#sumber").show();
								$("#tempat_bentang").show();
								$("#pegawai").show();
							}
							
						});
						
					});
					
				</script>
				
				<form class="contact-us form-horizontal" method="post" id="latihan">
					
					<div class="control-group">
						<label class="control-label">Jenis Pinjaman</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-inbox"></i></span>
								<select class='span5' id='jenis'>
									<option value='0' > Sila Pilih </option>
									<?php foreach ($latihan_jenis as $j ) {
									?>
									<option value='<?=$j->latihan_jenis_id?>' > <?=$j->latihan_jenis_nama?> </option>
									<?php	
									}
									?>
									

								</select>
							</div>
						</div>
					</div>
					<div id="borang" style='display:none'>

					<div class="control-group">
						<label class="control-label">tajuk</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span6" id="tajuk" type="text" >

							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Tarikh </label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">Dari</span>
								<div id="datepicker1" class="input-prepend date">
									<span class="add-on"><i class="icon-th"></i></span>
									<input class="span2" id="tarikh_dari" type="text" >
								</div>
							</div>
							<div id="thingga" class="input-prepend">
								<span class="add-on">Hingga</span>
								<div id="datepicker2" class="input-prepend date">
									<span class="add-on"><i class="icon-th"></i></span>
									<input class="span2" type="text" id="tarikh_hingga" >
								</div>
							</div>
						</div>
					</div>
					
					<div id="tempat_view" class="control-group">
						<label class="control-label">Tempat</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span6" id="tempat" type="text" >

							</div>
						</div>
					</div>
					<div id="sumber" class="control-group" style='display:none'>
						<label class="control-label">Sumber</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span6" id="sumber_data" type="text" >

							</div>
						</div>
					</div>
					<div id="tempat_bentang" class="control-group" style='display:none'>
						<label class="control-label">Tempat Pembentangan</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span6" id="tempat_bentang_data" type="text" >

							</div>
						</div>
					</div>
					<div id="pegawai" class="control-group" style='display:none'>
						<label class="control-label">Pegawai Penyelia</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span6" id="pegawai_data" type="text" >

							</div>
						</div>
					</div>
					<div id="ikutjam" class="control-group" style='display:none'>
						<label class="control-label">Jumlah Jam</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span2" id="jumjam_data" type="text" >

							</div>
						</div>
					</div>
					<div id="ikuthari" class="control-group" style='display:none'>
						<label class="control-label">Jumlah Hari</label>
						<div class="controls">
							<div class="input-prepend">
							<input class="span2" id="jumhari_data" type="text" >

							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="controls">
							<button type="submit" id="hantar" class="btn btn-primary">
								Hantar
							</button>
							<button type="button" class="btn" onclick="this.form.reset()" >
								Batal
							</button>
						</div>
					</div>
				 </div>	
				</form>

			</div>
		</div>
		<div id="cari" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-folder-open"></i>
				<h5>Carian</h5>

			</div>
			<div class="box-content">
				<form class="contact-us form-horizontal" method="post" id="cari">
					<div class="control-group">
						<label class="control-label">Buat Carian</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input class="span8" id="carian" type="text" >
							<!--
								<button type="submit" id="hantar" class="btn btn-primary">
								Cari
							</button>
							-->
							</div>
						</div>
						<br/>
						<div id="keputusan"></div>
					</div>
				
				</form>
			</div>
		</div>
		<div id="panduan" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-folder-open"></i>
				<h5>Panduan</h5>

			</div>
			<div id="panduan_contant" class="box-content">
			</div>
			<!--
			<textarea name="panduan_contant_edit" id="panduan_contant_edit" rows="10" cols="80">
               
            </textarea>
            -->
            <script>
                
                //CKEDITOR.replace( 'panduan_contant_edit' );
            </script>
		</div>
		
		<!--- admin -->
		<?php if ($admin == 1) { ?>
			<div id="admin" class="box" style='display:none'>
			<div class="box-header">
				<i class="icon-inbox"></i>
				<h5>Admin Latihan</h5>
			</div>
			<div id="adminc" class="box-content">
			
				  
			
			</div>
		</div>
		
		
		
		<?php } ?>
	</div>
</div>

<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/jquery/jquery-chosen.js" type="text/javascript" ></script>
<script src="<?=base_url()?>asset/js/jquery/virtual-tour.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?=base_url()?>asset/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<script type="text/javascript">
	
$(document).ready(function() {			
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		 
		var checkin = $('#tarikh_dari').datepicker({
		  onRender: function(date) {
		    return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
		    var newDate = new Date(ev.date)
		    newDate.setDate(newDate.getDate() + 1);
		    checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#tarikh_hingga')[0].focus();
		}).data('datepicker');
		var checkout = $('#tarikh_hingga').datepicker({
		  onRender: function(date) {
		    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  checkout.hide();
		}).data('datepicker');
		
});
</script>

<script type="text/javascript">
	$('.clockpicker').clockpicker().find('input').change(function() {
		console.log(this.value);
	});
	$('#jam').clockpicker({
		autoclose : true
	});

	if (something) {
		$('#jam').clockpicker('show').clockpicker('toggleView', 'minutes');
	}
</script>

<script type="text/javascript">
	$('.clockpicker').clockpicker().find('input').change(function() {
		console.log(this.value);
	});

	$('#jam2').clockpicker({
		autoclose : true
	});

	//if (something) {
		//$('#jam2').clockpicker('show').clockpicker('toggleView', 'minutes');
	//}
</script>