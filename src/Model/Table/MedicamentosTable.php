<?php
namespace App\Model\Table;

use App\Model\Entity\Medicamento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medicamentos Model
 *
 */
class MedicamentosTable extends Table
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

        $this->table('medicamentos');
        $this->displayField('descricao');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->hasMany('Lotes', [
            'foreignKey' => 'id_medicamento'
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->requirePresence('principioAtivo', 'create')
            ->notEmpty('principioAtivo');
        

        return $validator;
    }
    
}
