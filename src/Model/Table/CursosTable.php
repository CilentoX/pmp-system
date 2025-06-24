<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cursos Model
 *
 * @property \App\Model\Table\ModalidadesTable&\Cake\ORM\Association\BelongsTo $Modalidades
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 * @property \App\Model\Table\AlunosTable&\Cake\ORM\Association\BelongsToMany $Alunos
 *
 * @method \App\Model\Entity\Curso newEmptyEntity()
 * @method \App\Model\Entity\Curso newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Curso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Curso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Curso findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Curso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Curso[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Curso|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Curso saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Curso[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CursosTable extends Table
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

        $this->setTable('cursos');
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
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuarios_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('DiasHorarios', [
            'foreignKey' => 'cursos_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('CursosAlunos', [
            'foreignKey' => 'cursos_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsToMany('Alunos', [
            'foreignKey' => 'cursos_id',
            'targetForeignKey' => 'alunos_id',
            'joinTable' => 'cursos_alunos',
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
            ->integer('modalidades_id')
            ->requirePresence('modalidades_id', 'create')
            ->notEmptyString('modalidades_id');

        $validator
            ->integer('nucleos_id')
            ->requirePresence('nucleos_id', 'create')
            ->notEmptyString('nucleos_id');

        $validator
            ->integer('usuarios_id')
            ->requirePresence('usuarios_id', 'create')
            ->notEmptyString('usuarios_id');

        $validator
            ->integer('vagas')
            ->requirePresence('vagas', 'create')
            ->notEmptyString('vagas');

        $validator
            ->integer('idade_minima')
            ->requirePresence('idade_minima', 'create')
            ->notEmptyString('idade_minima');

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
        $rules->add($rules->existsIn('usuarios_id', 'Usuarios'), ['errorField' => 'usuarios_id']);

        return $rules;
    }
}
