<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name        = "Awan Setiawan";
        $administrator->email       = "sukasari13@gmail.com";
        $administrator->password    = \Hash::make("sukasariweh13");
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
