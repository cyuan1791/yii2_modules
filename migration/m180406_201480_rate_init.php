<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * CLass m141208_201480_rate_init
 *
 * Create rate tables.
 *
 * Will be created 3 tables:
 * - `{{%rate_product}}` - Blog product
 * - `{{%rate_review}}` -
 * - `{{%rate_comment}}` -
 */
class m180406_201480_rate_init extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        // MySql table options
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        // table rate_product
        $this->createTable(
            '{{%rate_product}}',
            [
                'id' => Schema::TYPE_PK,
                'url' => Schema::TYPE_STRING . '(255) NOT NULL',
                'page_path' => Schema::TYPE_STRING . '(255) NOT NULL UNIQUE',
                'module' => Schema::TYPE_STRING . '(128) NOT NULL ',
                'name' => Schema::TYPE_STRING . '(255) NOT NULL ',
                'mid' => Schema::TYPE_STRING . '(128) NOT NULL ',
                'owner_email' => Schema::TYPE_STRING . '(255) NOT NULL ',
                'city' => Schema::TYPE_STRING . '(128) NOT NULL ',
                'state' => Schema::TYPE_STRING . '(128) NOT NULL ',
                'country' => Schema::TYPE_STRING . '(255) NOT NULL DEFAULT "USA"',
                'type' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'views' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'rating_ave' => Schema::TYPE_FLOAT . ' NOT NULL DEFAULT 5',
                'status' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL'
            ],
            $tableOptions
        );

        // Indexes
        $this->createIndex('status', '{{%rate_product}}', 'status');
        $this->createIndex('created_at', '{{%rate_product}}', 'created_at');


        // table rate_review
        $this->createTable(
            '{{%rate_review}}',
            [
                'id' => Schema::TYPE_PK,
                'product_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'title' => Schema::TYPE_STRING . '(255) NOT NULL',
                'email' => Schema::TYPE_STRING . '(128) NOT NULL',
                'author' => Schema::TYPE_STRING . '(128) NOT NULL',
                'brief' => Schema::TYPE_TEXT,
                'content' => Schema::TYPE_TEXT . ' NOT NULL',
                'click' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
                'rating' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 5',
                'status' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
            ],
            $tableOptions
        );

        // Indexes
        $this->createIndex('product_id', '{{%rate_review}}', 'product_id');
        $this->createIndex('status', '{{%rate_review}}', 'status');
        $this->createIndex('created_at', '{{%rate_review}}', 'created_at');

        // Foreign Keys
        $this->addForeignKey('{{%FK_review_product}}', '{{%rate_review}}', 'product_id', '{{%rate_product}}', 'id', 'CASCADE', 'CASCADE');


        // table rate_comment
        $this->createTable(
            '{{%rate_comment}}',
            [
                'id' => Schema::TYPE_PK,
                'review_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                'content' => Schema::TYPE_TEXT . ' NOT NULL',
                'author' => Schema::TYPE_STRING . '(128) NOT NULL',
                'email' => Schema::TYPE_STRING . '(128) NOT NULL',
                'url' => Schema::TYPE_STRING . '(128) NULL',
                'status' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 1',
                'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
            ],
            $tableOptions
        );

        // Indexes
        $this->createIndex('review_id', '{{%rate_comment}}', 'review_id');
        $this->createIndex('status', '{{%rate_comment}}', 'status');
        $this->createIndex('created_at', '{{%rate_comment}}', 'created_at');

        // Foreign Keys
        $this->addForeignKey('{{%FK_comment_review}}', '{{%rate_comment}}', 'review_id', '{{%rate_review}}', 'id', 'CASCADE', 'CASCADE');



        // Add super-administrator
        //$this->execute($this->getUserSql());
        //$this->execute($this->getProfileSql());
    }

    /**
    private function getUserSql()
    {
        $time = time();
        $password_hash = Yii::$app->security->generatePasswordHash('admin12345');
        $auth_key = Yii::$app->security->generateRandomString();
        $token = Security::generateExpiringRandomString();
        return "INSERT INTO {{%users}} (`username`, `email`, `password_hash`, `auth_key`, `token`, `role`, `status_id`, `created_at`, `updated_at`) VALUES ('admin', 'admin@demo.com', '$password_hash', '$auth_key', '$token', 'superadmin', 1, $time, $time)";
    }

    private function getProfileSql()
    {
        return "INSERT INTO {{%profiles}} (`user_id`, `name`, `slug`) VALUES (1, 'Administration', 'Site')";
    }
     */

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%rate_comment}}');
        $this->dropTable('{{%rate_review}}');
        $this->dropTable('{{%rate_product}}');
    }
}
