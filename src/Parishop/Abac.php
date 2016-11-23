<?php
namespace Parishop;

class Abac
{
    /**
     * @var \PHPixie\ORM\Models\Type\Database\Implementation\Entity
     */
    protected $subject;

    /**
     * @var \PHPixie\Slice\Type\ArrayData\Slice
     */
    protected $environment;

    /**
     * @var \PHPixie\ORM
     */
    protected $orm;

    /**
     * @var Abac\Algorithms
     */
    private $algorithms;

    /**
     * @var Abac\Decision
     */
    private $decision;

    /**
     * @var Abac\Enforcement[]
     */
    private $enforcements = [];

    /**
     * @var Abac\Operators
     */
    private $operators;

    /**
     * Abac constructor.
     * @param \PHPixie\ORM                                            $orm
     * @param \PHPixie\ORM\Models\Type\Database\Implementation\Entity $subject
     * @param \PHPixie\Slice\Type\ArrayData                           $environment
     */
    public function __construct(\PHPixie\ORM $orm, $subject, \PHPixie\Slice\Type\ArrayData $environment)
    {
        $this->orm         = $orm;
        $this->subject     = $subject;
        $this->environment = $environment;
    }

    /**
     * @return Abac\Algorithms
     */
    public function algorithms()
    {
        if($this->algorithms === null) {
            $this->algorithms = new Abac\Algorithms();
        }

        return $this->algorithms;
    }

    /**
     * @return Abac\Decision
     */
    public function decision()
    {
        if($this->decision === null) {
            $this->decision = new Abac\Decision($this->orm, $this->algorithms(), $this->operators());
        }

        return $this->decision;
    }

    public function enforce($target, $object = null, array $attributes = [])
    {
        return $this->enforcement($object)->enforce($target, $attributes);
    }

    /**
     * @param \PHPixie\ORM\Models\Type\Database\Implementation\Entity $object
     * @return Abac\Enforcement
     */
    public function enforcement($object = null)
    {
        $id = $object !== null ? $object->id() : 0;
        if(!array_key_exists($id, $this->enforcements)) {
            $this->enforcements[$id] = new Abac\Enforcement($this->decision(), $this->algorithms(), $this->subject, $this->environment, $object);
        }

        return $this->enforcements[$id];
    }

    /**
     * @return Abac\Operators
     */
    public function operators()
    {
        if($this->operators === null) {
            $this->operators = new Abac\Operators();
        }

        return $this->operators;
    }

}

