<?php
/**
 * @package     evias/dev-box
 * @category    core/module
 * @author      Grégory Saive <saive.gregory@gmail.com>
 */

namespace core\module;


interface Modulable
{
    /**
     *
     */
    public function getOptions();

    /**
     *
     */
    public function setOptions(array $opts);
}


