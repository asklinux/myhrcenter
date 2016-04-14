 <script src="<?=base_url()?>asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>

<script>
	$(document).ready(function(){
    	$("#bbaru").click(function(){
        	$("#baru").show();
        	$("#status").hide();
        	$("#cari").hide();
    	});
    	
    	$("#bstatus").click(function(){
        	$("#status").show();
        	$("#baru").hide();
        	$("#cari").hide();
    	});
    	$("#bcari").click(function(){
        	$("#status").hide();
        	$("#baru").hide();
        	$("#cari").show();
    	});
    	
    	$("#carian").keyup(function(ec)
		{
		$.post("<?=base_url()?>index.php/panel/cari_dir",{ cari : $("#carian").val() , uid : "<?=$this->session->userdata['logged_in']['username']?>"},
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
 					<h4>Direktori Kakitangan</h4> 
 				</div>
 			</div>
           
			<div class="span16">
 				<div id="status" class="box">
                            <div class="box-header">
                                <i class="icon-folder-open"></i>
                                <h5>Direktori Kakitangan</h5>
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
                        
                       
			</div>
</div>