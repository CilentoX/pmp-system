<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ModalidadesNucleos Model
 *
 * @property \App\Model\Table\ModalidadesTable&\Cake\ORM\Association\BelongsTo $Modalidades
 * @property \App\Model\Table\NucleosTable&\Cake\ORM\Association\BelongsTo $Nucleos
 *
 * @method \App\Model\Entity\ModalidadesNucleo newEmptyEntity()
 * @method \App\Model\Entity\ModalidadesNucleo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ModalidadesNucleo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModalidadesNucleosTable extends Table
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

        $this->setTable('modalidades_nucleos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Modalidades', [
            'foreignKey' => 'modalidades_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Nucleos', [
            'foreignKey' => 'nucleos_id',
            'joinType' => 'INNER',
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('modalidades_id', 'Modalidades'), ['errorField' => 'modalidades_id']);
        $rules->add($rules->existsIn('nucleos_id', 'Nucleos'), ['errorField' => 'nucleos_id']);

        return $rules;
    }
}
