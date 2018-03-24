<?php
			require 'class/Autoloader.php';
			Autoloader::register();

			if (isset($_GET['p']))
			{
				$p=$_GET['p'];
			}
			else
			{
				$p='welcome';
			}

			$db= New Database();
			
			ob_start();

			if ($p ==='welcome')
			{
				require 'welcome.php';
			}
			elseif($p === 'comment')
			{
				require 'comment.php';
			}
			
			
			
			else
			{
				echo 'The page that you requested does not exist!!!.';
				echo '<a href=\'index.php\'>Return to the home page</a>';
			}

			$content=ob_get_clean();
			require 'templates/template2.php';