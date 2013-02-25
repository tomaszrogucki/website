<?php
class RelativePath
{
	static public function makePath($origin,$destination)
	{
		$destinationUnchanged = $destination;
		
		$origin = trim(trim($origin),'/');
		$destination = trim(trim($destination),'/');
		
		$originElements = explode('/',$origin);
		$destinationElements = explode('/',$destination);
		

		echo($origin . ' ' . sizeof($originElements) . "<br/>");
		echo($destination . ' ' . sizeof($destinationElements) . "<br/>");
		
		// compare each element and stop if found any difference
		$i = 0;
		while($i < min(sizeof($originElements), sizeof($destinationElements)) && strcasecmp($originElements[$i], $destinationElements[$i]) == 0)
			$i++;
		
		if($i > 0)
		{
			// if the paths have the same root
			$upPath = str_repeat('../',sizeof($originElements) - $i);
			$relPath = implode('/',array_slice($destinationElements, $i));
			$path = $upPath . $relPath;
			// always append '/' to the path
			return rtrim($path, '/') . (strlen($path) > 0 ? '/' : '');
		}
		else
			// if paths are not related
			return rtrim($destinationUnchanged, '/') . (strlen($destinationUnchanged) > 0 ? '/' : '');
	}
}
?>