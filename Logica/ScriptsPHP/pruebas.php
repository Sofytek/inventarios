<?php
    require_once ('../Controler/HCDependencia.php');
    session_start();
	$control = new HCDependencia($_SESSION);
	
	//if (isset($_POST['flag_prepare'])) 
	{
   		$flag = $_REQUEST['flagprepare'];
		if($flag)
		{
			$empresa = $control->getEmpre(TRUE);	
			if(json_encode($empresa))
			{
				echo json_encode($empresa);
			}
		}
	}
?>