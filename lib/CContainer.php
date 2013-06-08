<?php 
/**
 * (c) http://www.yiiframework.com/forum/index.php/topic/40694-yii-dependency-injection-container-tutorial/
 */
class CContainer extends \Pimple
{
    /**
     * Retrieve parameter/service.
     *
     * @param string $id id of parameter/service
     * to retrieve Yii specific param/service just use an id like "yii.core.paramName"
     *
     * @return mixed
     */
    public function get($id)
    {
        $element = null;
        if (strpos($id, 'yii.core.') !== false) {
            $id = str_replace('yii.core.', '', $id);
            $element = Yii::app()->{$id};
        } else {
            $element = $this[$id];
        }
        return $element;
    }

    /**
     * Set a new parameter/service
     * 
     * @param string $id    id of parameter/service
     * @param mixed  $value value or callable
     * 
     * @return void
     */
    public function set($id, $value)
    {
        $this[$id] = $value;
    }
}
