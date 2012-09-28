<?php
/**
 * @package     evias/dev-box
 * @category    core/module
 * @author      Grégory Saive <saive.gregory@gmail.com>
 */

namespace core\module;

class Module
    implements Modulable
{
    /**
     *
     */
    private $_options = array();

    /**
     *
     */
    public function __construct(array $opts)
    {
        $this->setOptions($opts);
    }

    /**
     *
     */
    public function getOptions()
    {
        return array();
    }

    /**
     *
     */
    public function setOptions(array $opts)
    {
        foreach ($opts as $field => $value) {
            $method = "set" . ucwords(str_replace("_", " ", $field));
            if ( method_exists($this, $method) ) {
                $this->_options[$field] = $value;
                call_user_func(array($this, $method), $value);
            }
        }
    }

    /**
     * XXX method process( $method, array $opts )
     * XXX use output buffering to return request result.
     */

}

