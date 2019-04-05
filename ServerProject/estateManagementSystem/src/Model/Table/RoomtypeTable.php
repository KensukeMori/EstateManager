<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Roomtype Model
 *
 * @method \App\Model\Entity\Roomtype get($primaryKey, $options = [])
 * @method \App\Model\Entity\Roomtype newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Roomtype[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Roomtype|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Roomtype|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Roomtype patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Roomtype[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Roomtype findOrCreate($search, callable $callback = null, $options = [])
 */
class RoomtypeTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('roomtype');
        $this->setDisplayField('roomTypeId');
        $this->setPrimaryKey('roomTypeId');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('roomTypeId')
            ->allowEmptyString('roomTypeId', 'create');

        $validator
            ->scalar('roomType')
            ->maxLength('roomType', 10)
            ->requirePresence('roomType', 'create')
            ->allowEmptyString('roomType', false);

        return $validator;
    }
}
