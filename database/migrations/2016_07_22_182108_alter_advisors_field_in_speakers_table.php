<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Speaker;

class AlterAdvisorsFieldInSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speakers', function (Blueprint $table) {
            //
            $table->string('advisor', 32)->change()->nullable();
        });

        $nullable   = Speaker::where('advisor', '=', 0)
                             ->update(['advisor' => null]);

        $national   = Speaker::where('advisor', '=', '1')
                             ->update(['advisor' => '2016/national,2017/national']);

        $advisors   = Speaker::where('conference_slug', '=', '2015/austin')
                             ->where(function($q)
                                 {
                                    $q->where('slug', '=', 'brandt-scott')
                                      ->orWhere('slug', '=', 'fernandes-andrew')
                                      ->orWhere('slug', '=', 'moore-larry')
                                      ->orWhere('slug', '=', 'parnell-lawanda')
                                      ->orWhere('slug', '=', 'smedley-jeff');
                                 })->get();

        $now        = Carbon::now();

        if (count($advisors) > 0)
        {
            foreach ($advisors as $advisor)
            {
                $exists = Speaker::where('slug', '=', $advisor->slug)
                                 ->where('advisor', 'like', '2016/austin%')
                                 ->get();

                if (count($exists) === 0)
                {
                    Speaker::insert([
                            'first_name'    => $advisor->first_name,
                            'last_name'     => $advisor->last_name,
                            'slug'          => $advisor->slug,
                            'title'         => $advisor->title,
                            'title_short'   => $advisor->title_short,
                            'company'       => $advisor->company,
                            'bio'           => $advisor->bio,
                            'tags'          => $advisor->tags,
                            'photo'         => $advisor->photo,
                            'advisor'       => '2016/austin',
                            'published'     => $now,
                        ]);
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speakers', function (Blueprint $table) {
            //
            $national   = Speaker::where('id', '<', 7)
                                 ->update(['advisor' => 1]);

            $advisors   = Speaker::where('advisor', 'like', '%/%')
                                 ->orWhere('advisor', '=', '2016')
                                 ->forceDelete();

            $notnull    = Speaker::where('advisor', '=', null)
                                 ->update(['advisor' => 0]);

            $table->smallInteger('advisor')->tinyInteger('advisor')->unsigned()->change()->default(0);
        });
    }
}
