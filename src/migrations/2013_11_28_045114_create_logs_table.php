<?php

use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

	protected $table;

	public function __construct()
	{
		$this->table = \Config::get('monosql::config.table');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->table, function($table)
		{
			$table->engine = 'InnoDB';

			$table->bigIncrements('id');
			$table->string('channel', 50)->index();
			$table->string('level', 50)->index();
			$table->string('level_name', 100);
			$table->text('url');
			$table->string('method', 10);
			$table->text('message');
			$table->string('ip_address', 50);
			$table->text('ref_url');
			$table->text('session');
			$table->text('input');
			$table->text('context');
			$table->text('formatted');
			$table->dateTime('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($this->table);
	}

}