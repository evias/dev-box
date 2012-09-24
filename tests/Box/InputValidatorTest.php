<?php
class Box_InputValidatorTest
    extends PHPUnit_Framework_TestCase
{
    /**
     * XXX
     */
    static public function provideValidData()
    {
        return array(
            /* Test numeric validator */
            array(
                array("type"  => "numeric",
                      "value" => 123),
                true),
            /* Test string validator */
            array(
                array("type"  => "string",
                      "value" => "my string value"),
                true),
        );
    }

    /**
     * XXX
     */
    static public function provideInvalidData()
    {
        return array(
            /* Test numeric validator */
            array(
                array("type"  => "numeric",
                      "value" => "not numeric at all!"),
                false),
            array(
                array("type"  => "numeric",
                      "value" => "012not numeric!"),
                false),
            array(
                array("type"  => "numeric",
                      "value" => "12;23"),
                false),
            /* Test string validator */
            array(
                array("type"  => "string",
                      "value" => true),
                false),
        );

    }

    /**
     * @dataProvider provideValidData
     */
    public function testValidData(array $data, $expected)
    {
        assert( 'isset($data["type"])' );
        assert( 'isset($data["value"])' );

        $validTypes = array(
            "numeric",
            "string",
            "date",
            "time",
            "datetime",
            "timestamp",
        );
        $this->assertTrue( in_array($data["type"], $validTypes));

        $validator = null;
        switch ($data["type"]) {
            case "numeric":
                $this->assertTrue( is_numeric($data["value"]));
                break;

            case "string":
                $this->assertTrue( is_string($data["value"]));
                break;

            default:
                /* XXX throw */
                $this->assertTrue( null !== $data["value"]);
        }
    }

    /**
     * @dataProvider provideInvalidData
     */
    public function testInvalidData(array $data, $expected)
    {
        assert( 'isset($data["type"])' );
        assert( 'isset($data["value"])' );

        $validTypes = array(
            "numeric",
            "string",
            "date",
            "time",
            "datetime",
            "timestamp",
        );
        $this->assertTrue( in_array($data["type"], $validTypes));

        $validator = null;
        switch ($data["type"]) {
            case "numeric":
                $this->assertFalse( is_numeric($data["value"]));
                break;

            case "string":
                $this->assertFalse( is_string($data["value"]));
                break;

            default:
                throw new RuntimeException(sprintf("Data type '%s' is not supported.", $data["type"]));
        }
    }
}
?>
