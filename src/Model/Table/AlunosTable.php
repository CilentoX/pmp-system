<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alunos Model
 *
 * @property \App\Model\Table\CursosTable&\Cake\ORM\Association\BelongsToMany $Cursos
 *
 * @method \App\Model\Entity\Aluno newEmptyEntity()
 * @method \App\Model\Entity\Aluno newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Aluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aluno findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Aluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aluno|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Aluno[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlunosTable extends Table
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

        $this->setTable('alunos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Cursos', [
            'foreignKey' => 'alunos_id',
            'targetForeignKey' => 'cursos_id',
            'joinTable' => 'cursos_alunos',
        ]);

        $this->hasMany('CursosAlunos', [
            'foreignKey' => 'alunos_id',
            'joinType' => 'LEFT'
        ]);

        $this->hasOne('AlunosSaudes', [
            'foreignKey' => 'alunos_id',
            'joinType' => 'INNER',
        ]);

        $this->hasOne('Questionarios', [
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('rg')
            ->maxLength('rg', 80)
            ->requirePresence('rg', 'create')
            ->notEmptyString('rg');

        $validator
            ->scalar('cpf')
            ->requirePresence('cpf', 'create')
            ->notEmptyString('cpf');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create')
            ->notEmptyDate('data_nascimento');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 20)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 80)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 100)
            ->requirePresence('bairro', 'create')
            ->notEmptyString('bairro');

        $validator
            ->scalar('municipio')
            ->maxLength('municipio', 100)
            ->requirePresence('municipio', 'create')
            ->notEmptyString('municipio');

        $validator
            ->scalar('como_soube')
            ->maxLength('como_soube', 255)
            ->requirePresence('como_soube', 'create')
            ->notEmptyString('como_soube');

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
        $rules->add($rules->isUnique(['cpf'], __('Este CPF já está sendo usado.')));
        return $rules;
    }
}
