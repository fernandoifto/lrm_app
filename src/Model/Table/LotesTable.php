<?php
namespace App\Model\Table;

use App\Model\Entity\Lote;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lotes Model
 *
 */
class LotesTable extends Table
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

        $this->table('lotes');
        $this->displayField('numero');
        $this->primaryKey('id');

        $this->belongsTo('Medicamentos', [
            'foreignKey' => 'id_medicamento',
            'propertyName' => 'medicamento',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('FormasFarmaceuticas', [
            'foreignKey' => 'id_forma_farmaceutica',
            'propertyName' => 'formafarmaceutica',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('TiposMedicamentos', [
            'foreignKey' => 'id_tipo_medicamento',
            'propertyName' => 'tipomedicamento',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Retiradas', [
            'foreignKey' => 'id_lotes'
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
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->add('dataVencimento', 'valid', ['rule' => 'datetime'])
            ->requirePresence('dataVencimento', 'create')
            ->notEmpty('dataVencimento');

        $validator
            ->add('dataFabricacao', 'valid', ['rule' => 'datetime'])
            ->requirePresence('dataFabricacao', 'create')
            ->notEmpty('dataFabricacao');

        $validator
            ->add('qdte', 'valid', ['rule' => 'numeric'])
            ->requirePresence('qdte', 'create')
            ->notEmpty('qdte');

        $validator
            ->add('id_medicamento', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_medicamento', 'create')
            ->notEmpty('id_medicamento');

        $validator
            ->add('id_forma_farmaceutica', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_forma_farmaceutica', 'create')
            ->notEmpty('id_forma_farmaceutica');

        $validator
            ->add('id_tipo_medicamento', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_tipo_medicamento', 'create')
            ->notEmpty('id_tipo_medicamento');

        return $validator;
    }
    
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['id_medicamento'], 'Medicamentos'));
        $rules->add($rules->existsIn(['id_tipo_medicamento'], 'tiposmedicamentos'));
        $rules->add($rules->existsIn(['id_forma_farmaceutica'], 'formasfarmaceuticas'));
        return $rules;
    }
    
}
