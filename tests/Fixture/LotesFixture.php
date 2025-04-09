<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LotesFixture
 *
 */
class LotesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'numero' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'dataVencimento' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'dataFabricacao' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'qdte' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_medicamento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_forma_farmaceutica' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_tipo_medicamento' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'medicamento_id_fk' => ['type' => 'index', 'columns' => ['id_medicamento'], 'length' => []],
            'tipo_medicamento_id' => ['type' => 'index', 'columns' => ['id_tipo_medicamento'], 'length' => []],
            'forma_farmaceutica_id' => ['type' => 'index', 'columns' => ['id_forma_farmaceutica'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'lotes_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_tipo_medicamento'], 'references' => ['tipos_medicamentos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'lotes_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_forma_farmaceutica'], 'references' => ['formas_farmaceuticas', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'medicamento_id_fk' => ['type' => 'foreign', 'columns' => ['id_medicamento'], 'references' => ['medicamentos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'numero' => 'Lorem ipsum dolor sit amet',
            'dataVencimento' => '2023-11-06 17:08:37',
            'dataFabricacao' => '2023-11-06 17:08:37',
            'qdte' => 1,
            'id_medicamento' => 1,
            'id_forma_farmaceutica' => 1,
            'id_tipo_medicamento' => 1
        ],
    ];
}
