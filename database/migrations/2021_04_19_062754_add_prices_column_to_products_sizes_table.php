<?php
/**
 *  database/migrations/2021_04_19_062754_add_prices_column_to_products_sizes_table.php
 *
 * Date-Time: 19.04.21
 * Time: 10:32
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesColumnToProductsSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_sizes', function (Blueprint $table) {
            $table->string('price')->after('size_id');
            $table->boolean('is_sale')->after('price')->default(false);
            $table->string('sale')->after('is_sale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_sizes', function (Blueprint $table) {
            //
        });
    }
}
