<?php
namespace App\Model\Table;

use App\Model\Entity\Retirada;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Retiradas Model
 *
 */
class RetiradasTable extends Table
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

        $this->table('retiradas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'id_users',
            'propertyName' => 'user',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Lotes', [
            'foreignKey' => 'id_lotes',
            'propertyName' => 'lote',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Pacientes', [
            'foreignKey' => 'id_pacientes',
            'propertyName' => 'paciente',
            'joinType' => 'INNER'
        ]);

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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('qtde', 'valid', ['rule' => 'numeric'])
            ->requirePresence('qtde', 'create')
            ->notEmpty('qtde');

        $validator
            ->add('id_users', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_users', 'create')
            ->notEmpty('id_users');

        $validator
            ->add('id_lotes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_lotes', 'create')
            ->notEmpty('id_lotes');

        $validator
            ->add('id_pacientes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_pacientes', 'create')
            ->notEmpty('id_pacientes');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['id_users'], 'Users'));
        $rules->add($rules->existsIn(['id_lotes'], 'Lotes'));
        $rules->add($rules->existsIn(['id_pacientes'], 'Pacientes'));
        return $rules;
    }
}
