<?php
namespace Parishop\Abac;

class Decision
{
    /**
     * @var Algorithms
     */
    protected $algorithms;

    /**
     * @var Operators
     */
    protected $operators;

    /**
     * @var \PHPixie\ORM
     */
    protected $orm;

    /**
     * @var array
     */
    protected $resultPolicies = [];

    protected $policies       = [];

    /**
     * Decision constructor.
     * @param \PHPixie\ORM $orm
     * @param Algorithms   $algorithms
     * @param Operators    $operators
     */
    public function __construct(\PHPixie\ORM $orm, Algorithms $algorithms, Operators $operators)
    {
        $this->orm        = $orm;
        $this->algorithms = $algorithms;
        $this->operators  = $operators;
    }

    public function enforce($target, array $attributes = [])
    {
        if(!array_key_exists($target, $this->resultPolicies)) {
            $query = $this->orm->query('abacPolicy');
            $query->relatedTo(
                'abacTargets',
                function (\PHPixie\ORM\Conditions\Builder\Container $q) use ($target) {
                    $q->where('alias', $target);
                }
            );
            $resultPolicies = [];
            /** @var \PHPixie\ORM\Models\Type\Database\Implementation\Entity $policy */
            foreach($query->find(['rules']) as $policy) {
                $resultRules = [];
                try {
                    /** @var \PHPixie\ORM\Models\Type\Database\Implementation\Entity $rule */
                    foreach($policy->rules() as $rule) {
                        $attributeName = $rule->getRequiredField('attribute');
                        if(array_key_exists($attributeName, $attributes)) {
                            $operatorName = $rule->getField('operator', 'isEqual');
                            $operator     = $this->operators->get($operatorName);
                            if($operator->result($attributes[$attributeName], $rule->getField('value')) === true) {
                                $effect                             = $rule->getField('effect') ? 'allow' : 'deny';
                                $resultRules[$rule->getField('id')] = (object)[
                                    'result'      => $effect,
                                    'obligations' => [],
                                    'recommends'  => []];
                            }
                        }
                        if(!array_key_exists($rule->getField('id'), $resultRules)) {
                            $resultRules[$rule->getField('id')] = (object)[
                                'result'      => 'indeterminate',
                                'obligations' => [],
                                'recommends'  => []];
                        }
                    }
                } catch(Exception $e) {

                }
                $algorithmName = $policy->getField('algorithm', 'deny-unless-allow');
                $algorithm     = $this->algorithms->get($algorithmName);
                if(!$resultRules) {
                    $resultRules[] = (object)['result' => 'indeterminate', 'obligations' => [], 'recommends' => []];
                }
                $result           = $algorithm->result($resultRules);
                $resultPolicies[] = (object)[
                    'result'      => $result ? 'allow' : 'deny',
                    'obligations' => [],
                    'recommends'  => []];
            }
            // Если для Цели не найдено политик - запрещаем доступ
            if(!$resultPolicies) {
                $resultPolicies = [(object)['result' => 'deny', 'obligations' => [], 'recommends' => []]];
            }
            $this->resultPolicies[$target] = $resultPolicies;
        }

        return $this->resultPolicies[$target];
    }

}