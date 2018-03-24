<?php
			require 'class/Autoloader.php';
			Autoloader::register();

			if (isset($_GET['p']))
			{
				$p=$_GET['p'];
			}
			else
			{
				$p='log';
			}

			$db= New Database();
			
			ob_start();

			if ($p ==='log')
			{
				require 'log.php';
			}
			elseif($p ==='register')
			{
				require 'register.php';
			}
			elseif($p === "login_success")
			{
				require 'login_success.php';
			}
			
			
			
			else
			{
				echo 'The page that you requested does not exist!!!.';
				echo '<a href=\'index.php\'>Return to the home page</a>';
			}

			$content=ob_get_clean();
			require 'templates/template1.php';