<?php
namespace App\Model\Table;

use App\Model\Entity\Paciente;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pacientes Model
 *
 */
class PacientesTable extends Table
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

        $this->table('pacientes');
        $this->displayField('nome');
        $this->primaryKey('id');
        
         $this->hasMany('Retiradas', [
            'foreignKey' => 'id_pacientes'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('cpf', 'create')
            ->notEmpty('cpf');

        $validator
            ->add('dataNascimento', 'valid', ['rule' => 'datetime'])
            ->requirePresence('dataNascimento', 'create')
            ->notEmpty('dataNascimento');

        $validator
            ->requirePresence('telefone', 'create')
            ->notEmpty('telefone');

        $validator
            ->requirePresence('cartaoSus', 'create')
            ->notEmpty('cartaoSus');

        return $validator;
    }
}
