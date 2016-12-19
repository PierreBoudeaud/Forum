/**
 * 
 */

$(document).ready(function(){
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
	    	alert('".WEBROOT."/utilisateur/deconnexion');
	    });
	  });
		
});