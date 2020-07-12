<?php

use yii\db\Migration;

class m200710_093600_create_shop_postal_code_table extends Migration
{

    public function up()
    {
        $this->createTable("{{%location_municipalities}}",
            [
                'zip' => $this->integer()->notNull(),
                'name' => $this->string(255)->defaultValue(null),
                'longitude' => $this->decimal(15, 7)->defaultValue(null),
                'latitude' => $this->decimal(15, 7)->defaultValue(null),
            ],
            'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
        );
    }

    public function down()
    {
        $this->dropTable('{{%location_municipalities}}');
    }
}