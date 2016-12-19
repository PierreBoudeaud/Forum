<?php
	require_once(VIEW."layout/header.php");
	require_once(VIEW."layout/userpanel.php");
	require_once(VIEW."layout/footer.php");
        setlocale(LC_TIME, 'fr_FR.utf8','fra');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS.$this->layout.".css" ?>">
		<meta charset="utf-8">
		<title></title>
	</head>
	
	<body>
		<div id='header'>
			<?php echo $header; ?>
			<div id='userpanel'>
				<?php 
					echo $userpanel
					."<script>$(document).ready(function(){
						$( function() {
							$( '#dialog').dialog({
								autoOpen: false,
								rezisable: true,
								width: 400,
								show: {
									effect: 'blind',
									duration: 250
								},
								hide: {
									effect: 'explode',
									duration: 250
								},
								buttons: {
									'Connexion': function(){
									if ($('#pseudo').val() == '' || $('#mdp').val() == ''){
										$('.obligatoire').show().effect('bounce', {}, 500);
										$('#obligatoireDesc').show();
									}else{
										$('#connexion-form').submit();
									}
								},
								'Fermer': function(){
								$(this).dialog('close');
								}
					
								}
							});
					
								$( '#connexion' ).on( 'click', function() {
									$( '#dialog' ).dialog( 'open' );
								});
					
									$( '#creation' ).on( 'click', function() {
										window.location.href = '".WEBROOT."utilisateur/newf';
									});
					
										$( '#deconnexion' ).on( 'click', function() {
											window.location.href = '".WEBROOT."utilisateur/deconnexion';
						    });
						});
					
					});</script>";
				?>
			</div>
		</div>
            
		<div id='content'>
			<?php echo $content; ?>
		</div>
		
		<div id="footer">
			<?php echo $footer; ?>
		</div>
	</body>
</html>