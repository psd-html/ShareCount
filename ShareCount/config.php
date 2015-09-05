<?php if (!defined('PLX_ROOT')) exit; 
# Control du token du formulaire
plxToken::validateFormToken($_POST);
if(!empty($_POST)) {
	$plxPlugin->setParam('url', $_POST['url'], 'cdata');
	$plxPlugin->saveParams();
	header('Location: parametres_plugin.php?p=ShareCount');
	exit;
}
?>

<p>
	Pour afficher un compteur pour connaître la popularité de votre site
</p>

<code>&lt;?php eval($plxShow->callHook('ShareCount')); ?&gt;</code>

<style>
	input, textarea {border-radius: 5px;width: 40%}
	textarea {min-height: 50px}
	label{font-style: italic}
</style>

<form action="parametres_plugin.php?p=ShareCount" method="post">

	<p>
		<label for="url">Votre site : ( Ex: http://nextum.fr )</label>
		<input id="url" name="url"  maxlength="255" value="<?php echo $plxPlugin->getParam("url"); ?>">
	</p>	

	
	<p>
		<?php echo plxToken::getTokenPostMethod() ?>
		<input type="submit" name="submit" value="Valider" />
		
	</p>

</form>