<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://skor.dosh.gov.my/asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>

<script>
	$(document).ready(function(){ 
		
		
		
	});

	function tambah(id){
		
		//$("#tambah").click(function(){
			
			//id = $("#add").val();
			//alert(id);
			var uid = "'"+id+"'";
			var module = $("#model").val()
			
			$.post("<?=base_url()?>index.php/admin/add_moduleadmin",{ id : id,module :module},function(data){
				
				if (data !== null){
				$('#ladmin').append('<tr id="'+data+'" ><td>'+id+'</td><td><button onclick="buang('+data+')" class="btn btn-small btn-danger"><i class="btn-icon-only icon-remove"></i></button></td></tr>');
				}
				else {
					alert('Gagal');
				}
			})
			
		//});
	}
</script>

<?php if ($users['count'] !== 0) { ?>
	
<table id="sejarah" class="table table-hover table-bordered tablesorter">
                                    <thead>
                                        
                                    </thead>
                                    <tbody>
                                      	<?php foreach ($users as $h ) { ?>
										<?php if ($h['givenname'][0] !== null ){ ?>
										<tr>
                                            <td><?=$h['givenname'][0]?></td>
                                            <td><?=$h['gidnumber'][0]?></td>
                                            <td><?=$h['mail'][0]?></td>
                                           
                                            <td>
                                         <button id="tambah"  onclick="tambah('<?=$h['uid'][0]?>')"
                                         value="<?=$h['uid'][0]?>" class="btn btn-small btn-info">
					<i class="btn-icon-only icon-ok"></i>
				</button></td>
                                        </tr>
										<?php } ?>
										<?php										
										}
										?>
                                        
                                       
                                    </tbody>
</table>
<?php } ?>
