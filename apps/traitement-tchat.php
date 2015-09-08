<?php
$manager = new TchatManager($link);
if(isset($_POST['submit'])){

	if(!empty($_POST['message'])){
		$tchat = $manager->create($_POST['message']);
	}
	else{
		echo "Veuillez entrer un message";
	}
	exit;
}
else if (isset($_GET['refresh']))
{
	$list = $manager->selectLast();
	$i = 0;
	$res = '';
	while (isset($list[$i]))
	{
		$message = $list[$i];
		$res .= '<p>
				<span class="tchat_date">['.$message->getFormatDate().']</span>
				<span class="tchat_auteur">'.$message->getAuteur()->getLogin().'</span> : 
				<span class="tchat_message">'.$message->getMessage().'</span>
			</p>';
		$i++;
	}
	echo $res;
	exit;
}
?>