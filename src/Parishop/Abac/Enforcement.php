<?php
namespace Parishop\Abac;

/**
 * Class Enforcement
 * @package Parishop\Abac
 */
class Enforcement
{
    /**
     * @var Decision
     */
    protected $decision;

    /**
     * @var Algorithms
     */
    protected $algorithms;

    /**
     * @var \PHPixie\ORM\Models\Type\Database\Implementation\Entity
     */
    protected $object;

    /**
     * @var \PHPixie\Slice\Type\ArrayData\Slice
     */
    protected $environment;

    /**
     * @var \PHPixie\ORM\Models\Type\Database\Implementation\Entity
     */
    protected $subject;

    /**
     * @var array
     */
    private $attributes;

    /**
     * @param Decision                                                $decision
     * @param Algorithms                                              $algorithms
     * @param \PHPixie\ORM\Models\Type\Database\Implementation\Entity $subject
     * @param \PHPixie\Slice\Type\ArrayData                           $environment
     * @param \PHPixie\ORM\Models\Type\Database\Implementation\Entity $object
     */
    public function __construct(Decision $decision, Algorithms $algorithms, $subject, $environment, $object = null)
    {
        $this->decision    = $decision;
        $this->algorithms  = $algorithms;
        $this->subject     = $subject;
        $this->environment = $environment;
        $this->object      = $object;
    }

    /**
     * @param string $target
     * @param array  $attributes
     * @return bool
     */
    public function enforce($target, array $attributes = [])
    {
        $result          = $this->decision->enforce($target, array_merge($this->attributes(), $attributes));
        $algorithm       = $this->algorithms->get('deny-unless-allow');
        $algorithmResult = $algorithm->result($result);
        try {
            if(is_array($result->obligations)) {
                /** @var Obligations\Obligation $obligation */
                foreach($result->obligations as $obligation) {
                    $obligation->execute();
                }
            }
        } catch(Exception $e) {
            return $algorithm->defaultResult();
        }
        try {
            if(is_array($result->recommends)) {
                /** @var Recommends\Recommend $recommend */
                foreach($result->recommends as $recommend) {
                    $recommend->execute();
                }
            }
        } catch(Exception $e) {
        }

        return $algorithmResult;
    }

    protected function attributes()
    {
        if($this->attributes === null) {

            $this->attributes = [];
            foreach($this->subject->asObject() as $property => $value) {
                $this->attributes['subject.' . $property] = $value;
            }
            foreach($this->environment->get() as $property => $value) {
                $this->attributes['environment.' . $property] = $value;
            }
            if($this->object instanceof \PHPixie\ORM\Drivers\Driver\PDO\Entity) {
                foreach($this->object->asObject() as $property => $value) {
                    $this->attributes['object.' . $property] = $value;
                }
            }
        }

        return $this->attributes;
    }

}

