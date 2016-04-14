<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>DOSH SKOP PANEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <script src="<?=base_url()?>asset/js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <link href="<?=base_url()?>asset/css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
    <script type="text/javascript" src="<?=base_url()?>asset/js/login.js"></script>
	<script>
				google.load('visualization', '1', {'packages': ['corechart']});
    			google.setOnLoadCallback(drawVisualization);
				function drawVisualization() {
		        visualization_data = new google.visualization.DataTable();
		        
		       
		
		         }
	</script>
    <script src="<?=base_url()?>asset/ckeditor/ckeditor.js"></script>
	
</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?=base_url()?>" class="brand"><img width="25px" src="<?=base_url()?>asset/images/Jata.png" />  DOSH SKOP PANEL</i></a>
                    <div id="app-nav-top-bar" class="nav-collapse">
			<?php if ($login == 1) { ?>
                        <ul class="nav pull-right">
                            <li>
                                <a href="<?=base_url()?>index.php/panel/logout">Logout</a>
                            </li>
                            
                        </ul>
			<?php } ?>

                                            </div>
                </div>
            </div>
        </div>