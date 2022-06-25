<?php
/**
*  CREATE TABLE users (
*     id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
*     name varchar(100) NOT NULL COMMENT 'Name',
*     username varchar(255) NOT NULL COMMENT 'Username',
*     password varchar(255) NOT NULL COMMENT 'Password',
*     email varchar(255) NOT NULL COMMENT 'Email Address',
*     PRIMARY KEY (id)
* ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=1;
* INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`) VALUES (1, 'Paul Bettany', 'paul_bettany', '1234','paul@gmail.com')
 */
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBlog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_fullname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_username' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'user_pass' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'user_' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}