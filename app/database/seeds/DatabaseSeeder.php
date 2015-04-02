<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('PersonTableSeeder');

		// $this->call('UserTableSeeder');
	}
}

class PersonTableSeeder extends Seeder {

	public function run()
	{
		$count= 50;
		$this->command->info("Deleting existing table from database");
		DB::table('person')->delete();

		//initialize faker 

		$faker = Faker\Factory::create('en_GB');
		$faker->addProvider( new Faker\Provider\en_GB\Address($faker));
		$faker->addProvider( new Faker\Provider\en_GB\Internet($faker));
		$faker->addProvider( new Faker\Provider\Uuid($faker));


		$this->command->info('Inserting '.$count.' data records using faker.....');

		for($i=0; $i<=$count; $i++)
		{

			Person::create(array(

				'name'=>$faker->name,
				'email'=>$faker->companyEmail,
				'description' => '<p>'.Implode ('</p><p>', $faker->paragraphs(5)).'</p>',
				'country'=> $faker->country,
				'address' =>$faker->address,
				'postcode' => $faker->postcode,
				'telephone' => $faker->phoneNumber,
                'code' => $faker->uuid





				));
		}
		$this->command->info('Person Table Seeded Using Faker....');

	}


	}








