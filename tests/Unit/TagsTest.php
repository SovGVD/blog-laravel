<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;

class TagsTest extends TestCase
{
    /**
     * Comma separated tags-as-string convert to array
     *
     * @return void
     */
    public function testToArray()
    {
        $test_string = "tag1, tag2, tag3";
        $this->assertEquals(["tag1", "tag2", "tag3"], Tag::normalize($test_string));
    }

    /**
     * Comma separated tags-as-string should be unique
     *
     * @return void
     */
    public function testUnique()
    {
        $test_string = "tag1, tag1, tag2, tag3";
        $this->assertEquals(["tag1", "tag2", "tag3"], Tag::normalize($test_string));
    }
    
    /**
     * Comma separated tags-as-string should be sorted
     *
     * @return void
     */
    public function testSort()
    {
        $test_string = "tag3, tag1, tag2";
        $this->assertEquals(["tag1", "tag2", "tag3"], Tag::normalize($test_string));
    }
}
