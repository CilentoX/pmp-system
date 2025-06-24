<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questionarios Model
 *
 * @property \App\Model\Table\AlunosTable&\Cake\ORM\Association\BelongsTo $Alunos
 *
 * @method \App\Model\Entity\Questionario newEmptyEntity()
 * @method \App\Model\Entity\Questionario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Questionario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Questionario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Questionario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Questionario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Questionario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Questionario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Questionario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Questionario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuestionariosTable extends Table
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

        $this->setTable('questionarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Alunos', [
            'foreignKey' => 'alunos_id',
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

        $validator
            ->boolean('coracao')
            ->requirePresence('coracao', 'create')
            ->notEmptyString('coracao');

        $validator
            ->boolean('dor_peito')
            ->requirePresence('dor_peito', 'create')
            ->notEmptyString('dor_peito');

        $validator
            ->boolean('dor_peito_mes')
            ->requirePresence('dor_peito_mes', 'create')
            ->notEmptyString('dor_peito_mes');

        $validator
            ->boolean('tontura')
            ->requirePresence('tontura', 'create')
            ->notEmptyString('tontura');

        $validator
            ->boolean('articular')
            ->requirePresence('articular', 'create')
            ->notEmptyString('articular');

        $validator
            ->boolean('tratamento')
            ->requirePresence('tratamento', 'create')
            ->notEmptyString('tratamento');

        $validator
            ->boolean('cirurgia')
            ->requirePresence('cirurgia', 'create')
            ->notEmptyString('cirurgia');

        $validator
            ->boolean('outra_razao')
            ->requirePresence('outra_razao', 'create')
            ->notEmptyString('outra_razao');

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
        $rules->add($rules->existsIn('alunos_id', 'Alunos'), ['errorField' => 'alunos_id']);

        return $rules;
    }
}
