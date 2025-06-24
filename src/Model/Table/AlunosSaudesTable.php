<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlunosSaudes Model
 *
 * @property \App\Model\Table\AlunosTable&\Cake\ORM\Association\BelongsTo $Alunos
 *
 * @method \App\Model\Entity\AlunosSaude newEmptyEntity()
 * @method \App\Model\Entity\AlunosSaude newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AlunosSaude[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlunosSaude get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlunosSaude findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AlunosSaude patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlunosSaude[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlunosSaude|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlunosSaude saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlunosSaude[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AlunosSaude[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AlunosSaude[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AlunosSaude[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlunosSaudesTable extends Table
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

        $this->setTable('alunos_saudes');
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
            ->boolean('plano_saude')
            ->requirePresence('plano_saude', 'create')
            ->notEmptyString('plano_saude');

        $validator
            ->scalar('plano_saude_qual')
            ->allowEmptyString('plano_saude_qual');

        $validator
            ->scalar('tipo_sanguineo')
            ->maxLength('tipo_sanguineo', 3)
            ->requirePresence('tipo_sanguineo', 'create')
            ->notEmptyString('tipo_sanguineo');

        $validator
            ->boolean('remedio_regular')
            ->requirePresence('remedio_regular', 'create')
            ->notEmptyString('remedio_regular');

        $validator
            ->scalar('remedio_regular_qual')
            ->allowEmptyString('remedio_regular_qual');

        $validator
            ->date('validade_atestado')
            ->allowEmptyDate('validade_atestado');

        $validator
            ->boolean('deficiencia')
            ->requirePresence('deficiencia', 'create')
            ->notEmptyString('deficiencia');

        $validator
            ->scalar('deficiencia_qual')
            ->maxLength('deficiencia_qual', 255)
            ->allowEmptyString('deficiencia_qual');

        $validator
            ->boolean('doenca_respiratoria')
            ->requirePresence('doenca_respiratoria', 'create')
            ->notEmptyString('doenca_respiratoria');

        $validator
            ->scalar('doenca_respiratoria_qual')
            ->maxLength('doenca_respiratoria_qual', 255)
            ->allowEmptyString('doenca_respiratoria_qual');

        $validator
            ->boolean('doenca_historico')
            ->requirePresence('doenca_historico', 'create')
            ->notEmptyString('doenca_historico');

        $validator
            ->scalar('doenca_historico_qual')
            ->maxLength('doenca_historico_qual', 255)
            ->allowEmptyString('doenca_historico_qual');

        $validator
            ->boolean('cirurgia')
            ->requirePresence('cirurgia', 'create')
            ->notEmptyString('cirurgia');

        $validator
            ->scalar('cirurgia_qual')
            ->maxLength('cirurgia_qual', 255)
            ->allowEmptyString('cirurgia_qual');

        $validator
            ->boolean('alergia')
            ->requirePresence('alergia', 'create')
            ->notEmptyString('alergia');

        $validator
            ->scalar('alergia_qual')
            ->maxLength('alergia_qual', 255)
            ->allowEmptyString('alergia_qual');

        $validator
            ->boolean('atividade_fisica')
            ->requirePresence('atividade_fisica', 'create')
            ->notEmptyString('atividade_fisica');

        $validator
            ->scalar('atividade_fisica_qual')
            ->maxLength('atividade_fisica_qual', 255)
            ->allowEmptyString('atividade_fisica_qual');

        $validator
            ->boolean('atividade_fisica_restricao')
            ->requirePresence('atividade_fisica_restricao', 'create')
            ->notEmptyString('atividade_fisica_restricao');

        $validator
            ->scalar('atividade_fisica_restricao_qual')
            ->maxLength('atividade_fisica_restricao_qual', 255)
            ->allowEmptyString('atividade_fisica_restricao_qual');

        $validator
            ->boolean('fuma')
            ->requirePresence('fuma', 'create')
            ->notEmptyString('fuma');

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
