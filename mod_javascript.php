<?php
	defined('_JEXEC') or die;
	require_once dirname(__FILE__).'/helper.php';
	$hello = modJavascript::addLibraries($params);
	use Joomla\CMS\Factory;
	$doc = JFactory::getDocument();

	$doc->addStyleSheet('modules/mod_javascript/style.css');
	foreach($hello->get('css') as $u)
	{
		
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
		$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
		//il faut tester si le chemin est absolu (débute par http) ou pas
		if(substr($u->library_css_url,0,4) != 'http')
		{
			$chemin = $CurPageURL.substr($u->library_css_url,1);
		}
		else
		{
			$chemin = $u->library_css_url;
		}
		$doc->addStyleSheet($chemin, array('version'=>'auto')); //C'est bon ca marche !
	}
	
	foreach($hello->get('javascript') as $u)
	{
		
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
		$CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
		//il faut tester si le chemin est absolu (débute par http) ou pas
		if(substr($u->library_javascript_fichier,0,4) != 'http')
		{
			$chemin = $CurPageURL.substr($u->library_javascript_fichier,1);
		}
		else
		{
			$chemin = $u->library_javascript_fichier;
		}
		//echo "Chemin JS : ".$chemin."<br>";
		//$doc->addScript($chemin); 
		$doc->addScript($chemin);
	}
	
	/*
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js'); */
	