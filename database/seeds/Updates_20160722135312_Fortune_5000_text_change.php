<?php

use Illuminate\Database\Seeder;
use App\Models\Benefit;
use App\Models\Conference;

class Updates_20160722135312_Fortune_5000_text_change extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $benefit    = Benefit::where('text', 'like', '%Fortune 100-5000%')->get();
        $text       = str_replace('fortune 100-5000', 'Fortune 100-3000', $benefit[0]->text);
        $text       = str_replace('ΓÇÖ', "'", $text);
        $update	    = Benefit::where('text', 'like', '%Fortune 100-5000%')->update(['text' => $text]);

        $events     = Conference::where('about', 'like', '%Fortune 100-5000%')->get();
        foreach ($events as $event)
        {
            unset($text);
            $text   = str_replace('fortune 100-5000', 'Fortune 100-3000', $event->about);
            $text   = str_replace('ΓÇÖ', "'", $text);
            Conference::where('slug', '=', $event->slug)
                      ->where('about', 'like', '%Fortune 100-5000%')
                      ->update(['about' => $text]);
        }
    }

}
