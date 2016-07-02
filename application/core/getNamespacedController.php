<?php

/**
 * Get namespaced controller info
 *
 * @param string $class controller classname in original CodeIgniter
 * @param string $dir   $RTR->directory
 * @return array        [fqcn, class path]
 */
function getNamespacedController($class, $dir = null)
{
	$namespace = config_item('controller_namespace');
	if ($namespace)
	{
		if ($dir)
		{
			$classname = $namespace.'\\'.str_replace('/', '\\', $dir).$class;
		}
		else
		{
			$classname = $namespace.'\\'.$class;
		}
	}
	else
	{
		$classname = $class;
	}

	$path = APPPATH.'controllers/'.$dir.$class.'.php';

	return [
		'fqcn' => $classname,
		'path' => $path,
	];
}
