<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modalidades Model
 *
 * @method \App\Model\Entity\Modalidade newEmptyEntity()
 * @method \App\Model\Entity\Modalidade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Modalidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modalidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modalidade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Modalidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modalidade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modalidade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modalidade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modalidade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Modalidade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Modalidade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Modalidade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModalidadesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('modalidades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Nucleos', [
            'foreignKey' => 'modalidade_id',
            'targetForeignKey' => 'nucleo_id',
            'joinTable' => 'modalidades_nucleos',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 80)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        return $validator;
    }
}
