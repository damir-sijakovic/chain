<?php

namespace dsijak;

/*
* Hook
* Set:   hook('delta', function(){ print "<h1>hello delta!</h1>";}, 10);
*        hook('delta', function(){ print "<p>delta text</p>";}, 99);
* Call:  hook('delta');
* Get number of hooks: hook();
*/

function hook($name=null, $function=null, $priority=0)
{
    static $x;
        
    if (isset($x))
    {		
		
		if (empty($name) && empty($function) && empty($priority))
		{
			return count($x);
		}
		
		if (isset($name) && empty($function) && empty($priority))
		{
			if (!is_string($name)){
				return null;
			} 			
					
			$hookFunctions = [];			
			
			for ($i=0; $i<count($x); $i++)
			{
				if ($name == $x[$i][0])
				{
					$hookFunctions[] = $x[$i];
				}
			}
			
			usort($hookFunctions, function($a, $b){
				return strcmp($a[2], $b[2]);
			});
						
			
			for ($i=0; $i<count($hookFunctions); $i++)
			{
				$hookFunctions[$i][1]();
			}
			
		}
		
		if (isset($name) && isset($function))
		{				
			if (is_string($name) && is_callable($function) && is_int($priority)){}else{
				return null;
			} 
									
			$x[] = [$name, $function, $priority];	
		}		
	}
    else
    {
		$x = [];	
		
		if (isset($name) && isset($function))
		{				
			if (is_string($name) && is_callable($function) && is_int($priority)){}else{
				return null;
			} 
									
			$x[] = [$name, $function, $priority];			
		}
		
		else if (isset($name)) 
		{			
			return null; 
		}			
	}
    
}
