<?php
class MakeStyle
{
	public static function compileFile($cssCrush, $cssDef, $cssStyle, $defStr)
	{
		$compiledFile = '';
		$failed = false;
		
		try
		{
			$file = fopen($cssDef, "w+");
			
			if (flock($file, LOCK_EX))
			{
			    fwrite($file, $defStr);
			    flock($file, LOCK_UN);
			}
			else
			{
			    echo('MakeStyle::compileFile() : Couldn\'t lock ' . $cssDef .' !');
			    $failed = true;
			}
			
			fclose($file);
		}
		catch(Exception $e)
		{
		    echo('MakeStyle::compileFile() : Operatoin on the file ' . $cssDef .' failed !');
		}

		if ($failed == false)
		{
			require_once($cssCrush);
			$compiledFile = csscrush_file($cssStyle);
		}

		return $compiledFile;
	}
}


?>