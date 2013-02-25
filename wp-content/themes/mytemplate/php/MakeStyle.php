<?php
// import configuration
require_once('config.php');		

class MakeStyle
{
	public static function compileFile($defStr)
	{
		$compiledFile = '';
		$failed = false;
		
		try
		{
			$file = fopen(SERVER_ROOT . CSSDEF, "w+");
			
			if (flock($file, LOCK_EX))
			{
			    fwrite($file, $defStr);
			    flock($file, LOCK_UN);
			}
			else
			{
			    echo('MakeStyle::compileFile() : Couldn\'t lock ' . SERVER_ROOT . CSSDEF .' !');
			    $failed = true;
			}
			
			fclose($file);
		}
		catch(Exception $e)
		{
		    echo('MakeStyle::compileFile() : Operatoin on the file ' . SERVER_ROOT . CSSDEF .' failed !');
		}

		if ($failed == false)
		{
			require_once(SERVER_ROOT . CSSCRUSH);
			$compiledFile = csscrush_file(SERVER_ROOT . CSSSTYLE);
		}

		return $compiledFile;
	}
}


?>