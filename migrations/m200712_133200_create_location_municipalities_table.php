<?php

use yii\db\Migration;

class m200710_093600_create_shop_postal_code_table extends Migration
{

    public function up()
    {
        $this->createTable("{{%shop_postal_code}}",
            [
                'zip' => $this->integer()->notNull(),
                'name' => $this->string(255)->defaultValue(null),
                'longitude' => $this->decimal(15, 7)->defaultValue(null),
                'latitude' => $this->decimal(15, 7)->defaultValue(null),
            ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
        );

        $municipalities = require(__DIR__ . '/data/municipalities_location.php');
        try {
            foreach ($municipalities as $municipality) {
                $this->insert('{{%shop_postal_code}}', [
                    'zip' => $municipality[0],
                    'name' => $municipality[1],
                    'longitude' => $municipality[2],
                    'latitude' => $municipality[3],
                ]);
            }

        } catch (\Exception $e) {
            echo print_r($e->getMessage());
        }
    }

    public function down()
    {
        $this->dropTable('{{%location_municipalities}}');
    }
}