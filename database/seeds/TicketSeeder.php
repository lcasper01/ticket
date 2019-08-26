<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'title' => 'Windows',
            'slug' => 'windows',
            'body' => 'Прошу заменить жесткий диск и переустановить windows главному бухгалтеру',
            'status' => '0',
            'user_id' => '2',
            'responsible_user' => 'user1',
        ]);
        DB::table('tickets')->insert([
            'title' => 'Телефония',
            'slug' => 'telephonia',
            'body' => 'В тендерном отделе наблюдаются задержке при вызове городских линий, прошу проверить',
            'status' => '0',
            'user_id' => '2',
            'responsible_user' => 'user1',
        ]);
        DB::table('tickets')->insert([
            'title' => 'Принтер',
            'slug' => 'printer',
            'body' => 'В отделе сбыта перестал работать принтер',
            'status' => '0',
            'user_id' => '2',
            'responsible_user' => 'user2',
        ]);
    }
}
