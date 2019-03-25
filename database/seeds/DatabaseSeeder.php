<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Type;
use App\Admins;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $role = new Role();
        $role->name = 'user';
        $role->slug = 'regular user';
        $role->save();

        $role2 = new Role();
        $role2->name = 'admin';
        $role2->slug = 'admin';
        $role2->save();

        $type = new Type();
        $type->slug = 'primary';
        $type->save();

        $type1 = new Type();
        $type1->slug = 'promotions';
        $type1->save();

        $users = array(
            ['name' => 'Kailashnath N', 'username' => 'knn', 'password' => bcrypt('password')],
            ['name' => 'Deepak Rao', 'username' => 'deepak', 'password' => bcrypt('password')],
            ['name' => 'Pavithra O', 'username' => 'pavi', 'password' => bcrypt('password')],
            ['name' => 'Snigdha PST', 'username' => 'snigdha', 'password' => bcrypt('password')],
        );
        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
            if($user['username'] == 'knn') {
                $user1 = User::where('username', '=', $user['username'])->first();
                $rolem = Role::where('slug', '=', 'admin')->first();
                $user1->role = ($rolem->id);
                $user1->save();
            }
        }

        $admins = array(
            ['name' => 'Kailashnath N', 'email' => 'kailashnath1998@gmail.com'],
        );

        foreach ($admins as $user)
        {
            Admins::create($user);
        }




    }
}
