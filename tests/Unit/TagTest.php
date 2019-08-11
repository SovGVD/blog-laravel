<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;

class TagTest extends TestCase
{
    /**
     * Tag should be trimmed
     *
     * @return void
     */
    public function testNormalizationTrim()
    {
        $test_tag = " tag1 ";
        $this->assertEquals("tag1", Tag::normalizeTag($test_tag));
    }

    /**
     * Tag should be lowercased
     *
     * @return void
     */
    public function testNormalizationLowercase()
    {
        $test_tag = "TAG1";
        $this->assertEquals("tag1", Tag::normalizeTag($test_tag));
    }

    /**
     * Tag should be 3 chars or longer
     *
     * @return void
     */
    public function testNormalizationLengthShort()
    {
        $test_tag = "t";
        $this->assertFalse(Tag::normalizeTag($test_tag));
    }

    /**
     * Tag should be 3 chars or longer
     *
     * @return void
     */
    public function testNormalizationLengthLong()
    {
        $test_tag = "tag";
        $this->assertEquals("tag", Tag::normalizeTag($test_tag));
    }

    /**
     * Tag should be 3 chars or longer
     *
     * @return void
     */
    public function testNormalizationLengthLonger()
    {
        $test_tag = "longtag";
        $this->assertEquals("longtag", Tag::normalizeTag($test_tag));
    }
}
