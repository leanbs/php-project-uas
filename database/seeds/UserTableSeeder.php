<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name'        	 => 'admin',
                'address'		 => 'jln admin no 43',
                'no_telp'		 => '086546523545',
                'email' 		 => 'admin@mail.com',
                'password'		 => bcrypt('admin'),
                'role'		 	 => 1,
            ],
            [
                'name'        	 => 'user1',
                'address'		 => 'jln user1 no 43',
                'no_telp'		 => '086546523546',
                'email' 		 => 'user1@mail.com',
                'password'		 => bcrypt('user1'),
                'role'		 	 => 2,
            ],
            [
                'name'        	 => 'user2',
                'address'		 => 'jln user2 no 43',
                'no_telp'		 => '086546523547',
                'email' 		 => 'user2@mail.com',
                'password'		 => bcrypt('user2'),
                'role'		 	 => 2,
            ],
            [
                'name'        	 => 'user3',
                'address'		 => 'jln user3 no 43',
                'no_telp'		 => '086546523548',
                'email' 		 => 'user3@mail.com',
                'password'		 => bcrypt('user3'),
                'role'		 	 => 2,
            ],
        ]);
    }
}
