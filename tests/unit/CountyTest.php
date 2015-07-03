<?php

use NorwegianZipCodes\Models\County;

class CountyTest extends ZipCodeTestCase {
	public function testIdIsAlwaysFourDigits() {
		$model = new County(['id' => 1, 'name' => 'Test']);
		$this->assertTrue('01' === $model->id);
	}

	public function testIdSetter() {
		$model = new County(['id' => 1, 'name' => 'Test']);
		$this->assertTrue('01' === $model->getAttributes()['id']);
	}

	public function testFindCounty() {
		County::create(['id' => 1, 'name' => 'Akershus']);
		$this->assertInstanceOf(County::class, County::find('01'));
		$this->assertInstanceOf(County::class, County::find(1));
	}

	public function testFindCountyArray() {
		County::create(['id' => 1, 'name' => 'Akershus']);
		County::create(['id' => 2, 'name' => 'Østfold']);
		$this->assertCount( 2, County::find( [ 1, 2 ] ) );
	}

}
