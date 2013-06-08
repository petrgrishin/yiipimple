<?php
/**
 * (c) http://www.yiiframework.com/forum/index.php/topic/40694-yii-dependency-injection-container-tutorial/
 */
class WebApplication extends CWebApplication
{
    /**
     * @var \Pimple dependency injection container
     */
    protected $_container = null;

    /**
     * Configure DiC.
     * 
     * @param array $config configuration parameters
     * it consists of two main parameters:
     * <pre>
     * array(
     *     'class' => 'CContainer',
     *     'services' => array(
     *         's1' => function($c) {
     *             return new S1();
     *         },
     *         's2' => function($c) {
     *             return new S2($c['s1');
     *         }
     *     ),
     * )
     * </pre>
     * @return void
     */
    public function setContainer(array $config)
    {
        $container = isset($config['class']) && !empty($config['class']) ? $config['class'] : 'CContainer';
        $services = isset($config['services']) && is_array($config['services']) && !empty($config['services'])
            ? $config['services']
            : array();
        $this->_container = new $container($services);
    }

    /**
     * Retrieve the DiC container.
     * 
     * @return CContainer
     */
    public function getContainer()
    {
        if ($this->_container === null) {
            $this->_container = new CContainer();
        }
        return $this->_container;
    }
}
