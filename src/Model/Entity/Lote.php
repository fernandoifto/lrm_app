<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lote Entity.
 *
 * @property int $id
 * @property string $numero
 * @property \Cake\I18n\Time $dataVencimento
 * @property \Cake\I18n\Time $dataFabricacao
 * @property int $qdte
 * @property int $id_medicamento
 * @property int $id_forma_farmaceutica
 * @property int $id_tipo_medicamento
 */
class Lote extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
