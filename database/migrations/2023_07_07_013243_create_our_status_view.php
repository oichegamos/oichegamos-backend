<?php

use Illuminate\Database\Migrations\Migration;

class CreateOurStatusView extends Migration
{
    public function up()
    {
        \DB::statement($this->createView());
    }

    public function down()
    {
        \DB::statement($this->dropView());
    }

    private function createView(): string {
        return <<<SQL
            CREATE VIEW our_status_view AS
                SELECT 01 AS coutries
                     , 02 AS states
                     , 07 AS cities
                     , 40 AS photos
            SQL;
    }

    private function dropView(): string {
        return <<<SQL
            DROP VIEW IF EXISTS `our_status_view`;
            SQL;
    }
}
