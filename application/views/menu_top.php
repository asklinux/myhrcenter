<script>
$(function(){
    $('#menu li a').on('click', function(e){
        e.preventDefault();
        var page_url=$(this).prop('href');
        	$('#content').text('Sila tunggu, memuat ...').show();
        	$('#content').load(page_url);

    });
    $('#menu_admin li a').on('click', function(e){
        e.preventDefault();
        var page_url=$(this).prop('href');
        	$('#content').text('Sila tunggu, memuat ...').show();
        	$('#content').load(page_url);

    });
    
});
</script>
<div id="body-container">
            <div id="body-content">
                
                    <div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul id="menu">
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/dashboard">
                                        <i class="icon-dashboard icon-large"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/jadual">
                                        <i class="icon-calendar icon-large"></i> Jadual
                                    </a>
                                </li>
		        				<li>
                                    <a href="<?=base_url()?>index.php/panel/profile">
                                        <i class="icon-user icon-large"></i> Profile
                                    </a>
                                </li>
                                <!--
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/pusatsistem">
                                        <i class="icon-list-alt icon-large"></i>Pusat Sistem
                                    </a>
                                </li>
                                -->
                                 <li>
                                    <a href="<?=base_url()?>index.php/panel/ict">
                                        <i class="icon-inbox icon-large"></i>Pinjaman ICT
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url()?>index.php/panel/bilik">
                                        <i class="icon-time icon-large"></i>Tempahan Bilik
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/makan">
                                        <i class="icon-glass icon-large"></i>Tempah Makan
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url()?>index.php/panel/alatulis">
                                        <i class="icon-paper-clip icon-large"></i>Alatan Pejabat
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/kenderaan">
                                        <i class="icon-truck icon-large"></i>Kenderaan
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url()?>index.php/panel/pergerakan">
                                        <i class="icon-magnet icon-large"></i>Pegerakan
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/kedatangan">
                                        <i class="icon-briefcase icon-large"></i>Kedatangan
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/perpustakaan">
                                        <i class="icon-book icon-large"></i>Perpustakaan
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url()?>index.php/panel/latihan">
                                        <i class="icon-certificate icon-large"></i>Latihan
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>index.php/panel/direktori">
                                        <i class="icon-phone-sign icon-large"></i>Direktori
                                    </a>
                                </li>
                                 <li>
                                    <a href="<?=base_url()?>index.php/panel/shop">
                                        <i class="icon-shopping-cart icon-large"></i>Staff Shop
                                    </a>
                                </li>
				
                                                           </ul>
                        </div>
                    </div>
                
        <section class="nav nav-page">

        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3>Dashboard <?=$username?><br/>
                            <small><?php print_r($id_bahagian); ?></small>
                        </h3>
                    </header>
                </div>
                <div class="page-nav-options">
                    <div class="span9">
                    	<!--
                        <ul class="nav nav-pills">
                            <li>
                                <a href="#"><i class="icon-home icon-large"></i></a>
                            </li>
                        </ul>
                       -->
                        <ul id="menu_admin" class="nav nav-tabs">
                            <li class="active">
                                <a href="#"><i class="icon-home"></i>Home</a>
                            </li>
                            <li><a href="<?=base_url()?>index.php/panel/appcenter">Pusat Aplikasi</a></li>
			    <?php if ($jenis == 1){ ?>	
                            <li><a href="<?=base_url()?>index.php/panel/sadmin">Admin</a></li>
			    <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>