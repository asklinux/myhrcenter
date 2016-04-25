<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script src="http://skor.dosh.gov.my/asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>

<script>

	function buang(id){
		//alert(id);
		$.post("<?=base_url()?>index.php/admin/remove_moduleadmin",{id : id},function(data){
			
			$('#'+id).remove();
		
		});
		
	}
</script>
<?php if (!empty($senarai)) { ?>
<table class="table table-bordered" id="ladmin">
<?php

		
		foreach ($senarai as $s) {
?>
			<tr id="<?=$s->admin_id?>">
			<td width="90%">
			<?=$s->admin_username?>
			</td>
			<td>
			<button onclick="buang('<?=$s->admin_id?>')" id="padam" class="btn btn-small btn-danger" >
					<i class="btn-icon-only icon-remove"></i>
			</button>
			</td>
			</tr>
<?php
		}
	
?>
</table>

<?php } ?>
