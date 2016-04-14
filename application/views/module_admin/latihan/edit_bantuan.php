<script src="http://skor.dosh.gov.my/asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>

<script>
	$(document).ready(function(){
		
			$("#butang").click(function(event){
				
				 var datax = CKEDITOR.instances.panduan_contant_edit.getData();
				
				$.post("<?=base_url()?>index.php/panel/simpan_manual",{rekod : datax ,jenis : 'panduan'  },
				function(data){
					
					
					//$("#papar").text(data).show();
					$( "#papar" ).text( "Kemasukkan Data telah di hantar" ).show().fadeOut( 10000 );
				});
				event.preventDefault();
				
				
			});
	});
	
</script>

<!-- <form name="borang" id="hantar" method="post" > -->
<div id="papar">
	<textarea name="panduan_contant_edit" id="panduan_contant_edit" rows="10" cols="80">
               <?=$rekod?>
            </textarea>
            
            <script>
                
                CKEDITOR.replace( 'panduan_contant_edit' );
    
            </script>
    <div class="input-prepend">
	<br />
 	<button class="btn" id="butang" > Kemaskini </button>                                      	
   </div>
         
</div>            
<!-- </form> -->			
			
			