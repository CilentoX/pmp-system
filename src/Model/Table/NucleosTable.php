<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nucleos Model
 *
 * @property \App\Model\Table\ModalidadesTable&\Cake\ORM\Association\BelongsToMany $Modalidades
 *
 * @method \App\Model\Entity\Nucleo newEmptyEntity()
 * @method \App\Model\Entity\Nucleo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nucleo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Nucleo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nucleo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nucleo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nucleo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nucleo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nucleo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Nucleo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NucleosTable extends Table
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

        $this->setTable('nucleos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Modalidades', [
            'foreignKey' => 'nucleo_id',
            'targetForeignKey' => 'modalidade_id',
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

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 255)
            ->allowEmptyString('endereco');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 255)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        return $validator;
    }
}
