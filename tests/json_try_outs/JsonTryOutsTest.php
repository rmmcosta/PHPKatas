<?php

namespace json_try_outs;

use subclasses\json_try_outs\JsonTryOuts;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertThat;
use function PHPUnit\Framework\assertTrue;
use function PHPUnit\Framework\callback;

require_once('vendor/helmich/phpunit-json-assert/src/Functions.php');

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
        $obj->fruits = ['bananas', 'strawberry', 'apples', 'pears', 'water melon'
        ];
        $obj->qty = [10, 20, 30, 5, 1,
        ];
        $return = JsonTryOuts::jsonSerializeDump($obj);
        self::assertJson($return);
        assertThat($return, matchesJsonConstraints([
            '$.fruits'    => callback(function($a) { return count($a) == 5; }),
            '$.qty'    => callback(function($a) { return count($a) == 5; })
        ]));
    }
}
