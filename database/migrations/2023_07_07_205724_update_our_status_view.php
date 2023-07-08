<?php

use Illuminate\Database\Migrations\Migration;

class UpdateOurStatusView extends Migration
{
    public function up()
    {
        \DB::statement($this->dropView());
        \DB::statement($this->updateView());
    }

    public function down()
    {
        \DB::statement($this->dropView());
        (new CreateOurStatusView())->up();
    }

    private function updateView(): string {
        return <<<SQL
            CREATE VIEW our_status_view AS
                SELECT 01 AS countries
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
