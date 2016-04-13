<?php
namespace Hal\Component\Reflected;


class Argument
{

    const NIL = '<nil>';

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $defaultValue = self::NIL;

    /**
     * @var string
     */
    private $type;

    /**
     * Argument constructor.
     * @param string $name
     * @param mixed $defaultValue
     * @param string $type
     */
    public function __construct($name, $defaultValue = self::NIL, $type = null)
    {
        $this->name = $name;
        $this->defaultValue = $defaultValue;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Argument
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * @param mixed $defaultValue
     * @return Argument
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        return self::NIL === $this->getDefaultValue();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Argument
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}