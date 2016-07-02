<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

/**
 * Namescpaced version
 */
class CIPHPUnitTestRouter
{
	/**
	 * Get Route including 404 check
	 *
	 * @see core/CodeIgniter.php
	 *
	 * @return array   [class, method, pararms]
	 */
	public function getRoute()
	{
		$RTR =& load_class('Router', 'core');
		$URI =& load_class('URI', 'core');

		$e404 = FALSE;
		$class = ucfirst($RTR->class);
		$method = $RTR->method;

		$classname = getNamespacedController($class, $RTR->directory)['fqcn'];
		$classpath = getNamespacedController($class, $RTR->directory)['path'];

		if (empty($class) OR ! file_exists($classpath))
		{
			$e404 = TRUE;
		}
		else
		{
			require_once($classpath);

			if ( ! class_exists($classname, FALSE) OR $method[0] === '_' OR method_exists('CI_Controller', $method))
			{
				$e404 = TRUE;
			}
			elseif (method_exists($classname, '_remap'))
			{
				$params = array($method, array_slice($URI->rsegments, 2));
				$method = '_remap';
			}
			// WARNING: It appears that there are issues with is_callable() even in PHP 5.2!
			// Furthermore, there are bug reports and feature/change requests related to it
			// that make it unreliable to use in this context. Please, DO NOT change this
			// work-around until a better alternative is available.
			elseif ( ! in_array(strtolower($method), array_map('strtolower', get_class_methods($classname)), TRUE))
			{
				$e404 = TRUE;
			}
		}

		if ($e404)
		{
			// If 404, CodeIgniter instance is not created yet. So create it here.
			// Because we need CI->output->_status
			$CI =& get_instance();
			if ($CI instanceof CIPHPUnitTestNullCodeIgniter)
			{
				CIPHPUnitTest::createCodeIgniterInstance();
			}

			show_404($RTR->directory.$classname.'/'.$method.' is not found');
		}

		if ($method !== '_remap')
		{
			$params = array_slice($URI->rsegments, 2);
		}

		return [$classname, $method, $params];
	}
}
