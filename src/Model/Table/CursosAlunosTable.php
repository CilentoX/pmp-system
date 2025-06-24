<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CursosAlunos Model
 *
 * @property \App\Model\Table\CursosTable&\Cake\ORM\Association\BelongsTo $Cursos
 *
 * @method \App\Model\Entity\CursosAluno newEmptyEntity()
 * @method \App\Model\Entity\CursosAluno newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CursosAluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CursosAluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\CursosAluno findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CursosAluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CursosAluno[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CursosAluno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosAluno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CursosAluno[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CursosAlunosTable extends Table
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

        $this->setTable('cursos_alunos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'cursos_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn('cursos_id', 'Cursos'), ['errorField' => 'cursos_id']);
        $rules->add($rules->existsIn('alunos_id', 'Alunos'), ['errorField' => 'alunos_id']);

        return $rules;
    }
}
