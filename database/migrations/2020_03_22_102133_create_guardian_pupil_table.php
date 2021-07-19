    <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardianPupilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardian_pupil', function (Blueprint $table) {
            $table->primary(['guardian_id','pupil_id']);
            $table->unsignedBigInteger('pupil_id');
            $table->unsignedBigInteger('guardian_id');
            $table->timestamps();

            $table->foreign('pupil_id')->references('id')->on('pupils')->onDelete('cascade');
            $table->foreign('guardian_id')->references('id')->on('guardians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardian_pupil');
    }
}
