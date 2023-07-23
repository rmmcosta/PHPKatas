<?php

namespace json_try_outs;

use subclasses\json_try_outs\JsonTryOuts;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertTrue;

class JsonTryOutsTest extends TestCase
{
    public function testShouldAllowToSeeJsonDump()
    {
        JsonTryOuts::jsonDeserializeDump('
        {
    "family": [
        {
            "name": "Ricardo",
            "surname": "Costa"
        },
        {
            "name": "Ana",
            "surname": "Ramos"
        }
    ]
}'
        );
        assertTrue(true);
    }

    public function testShouldReturnNullForInvalidJson()
    {
        $return = JsonTryOuts::jsonDeserializeDump('{
    "family": [
        {
            "name": "Ricardo",
            "surname": "Costa"
        },
        {
            "name": "Ana",
            "surname": "Ramos"
        }
    ]');
        self::assertNull($return);
    }

    public function testShouldNotReturnNullForValidJson()
    {
        $return = JsonTryOuts::jsonDeserializeDump('{
    "family": [
        {
            "name": "Ricardo",
            "surname": "Costa"
        },
        {
            "name": "Ana",
            "surname": "Ramos"
        }
    ]
}');
        self::assertNotNull($return);
    }

    public function testShouldDumpJsonEncode()
    {
        $obj = new \stdClass();
        $obj->fruits = ['bananas', 'strawberry', 'apples', 'pears',
        ];
        $obj->qty = [10, 20, 30, 5,
        ];
        JsonTryOuts::jsonSerializeDump($obj);
        assertTrue(true);
    }
}
