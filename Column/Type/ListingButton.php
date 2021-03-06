<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 2015-01-16
 * Time: 20:02
 */

namespace PawelLen\DataTablesListing\Column\Type;


class ListingButton extends ListingColumnType
{
    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name, array $options = array())
    {
        parent::__construct($name, $options);
    }


    /**
     * @inheritdoc
     */
    public function getValues($row)
    {
        // Build parameters:
        $parameters = array();
        if (isset($this->options['parameters'])) {
            foreach ($this->options['parameters'] as $name => $propertyPath) {
                $parameters[$name] = $this->getPropertyValue($row, $propertyPath);
            }
        }

        return array(
            'route' => $this->options['route'],
            'parameters' => $parameters,
            'options' => $this->options,
            'name' => $this->name,
            'label' => $this->options['label'],
        );
    }


    /**
     * @return string
     */
    public function getType()
    {
        return 'button';
    }

}