<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RetiradasFixture
 *
 */
class RetiradasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'qtde' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_users' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_lotes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_pacientes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_retiradas_users_idx' => ['type' => 'index', 'columns' => ['id_users'], 'length' => []],
            'fk_retiradas_lotes_idx' => ['type' => 'index', 'columns' => ['id_lotes'], 'length' => []],
            'fk_retiradas_pacientes_idx' => ['type' => 'index', 'columns' => ['id_pacientes'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'retiradas_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_users'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retiradas_ibfk_3' => ['type' => 'foreign', 'columns' => ['id_lotes'], 'references' => ['lotes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'retiradas_ibfk_4' => ['type' => 'foreign', 'columns' => ['id_pacientes'], 'references' => ['pacientes', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'qtde' => 1,
            'id_users' => 1,
            'id_lotes' => 1,
            'id_pacientes' => 1,
            'created' => '2023-11-11 19:17:37',
            'modified' => '2023-11-11 19:17:37'
        ],
    ];
}
