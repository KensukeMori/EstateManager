<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Room Model
 *
 * @method \App\Model\Entity\Room get($primaryKey, $options = [])
 * @method \App\Model\Entity\Room newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Room[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Room|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Room[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Room findOrCreate($search, callable $callback = null, $options = [])
 */
class RoomTable extends Table
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

        $this->setTable('room');
        $this->setDisplayField('roomId');
        $this->setPrimaryKey('roomId');
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
            ->integer('roomId')
            ->allowEmptyString('roomId', 'create');

        $validator
            ->integer('roomName')
            ->requirePresence('roomName', 'create')
            ->allowEmptyString('roomName', false);

        $validator
            ->integer('building')
            ->requirePresence('building', 'create')
            ->allowEmptyString('building', false);

        $validator
            ->numeric('roomSize')
            ->requirePresence('roomSize', 'create')
            ->allowEmptyString('roomSize', false);

        $validator
            ->scalar('roomType')
            ->maxLength('roomType', 10)
            ->requirePresence('roomType', 'create')
            ->allowEmptyString('roomType', false);

        $validator
            ->numeric('rent')
            ->requirePresence('rent', 'create')
            ->allowEmptyString('rent', false);

        $validator
            ->integer('resident')
            ->requirePresence('resident', 'create')
            ->allowEmptyString('resident', false);

        return $validator;
    }
}
