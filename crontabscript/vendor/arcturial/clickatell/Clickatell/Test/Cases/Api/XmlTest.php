<?php
/**
 * The Clickatell SMS Library provides a standardised way of talking to and
 * receiving replies from the Clickatell API's. It makes it
 * easier to write your applications and grants the ability to
 * quickly switch the type of API you want to use HTTP/XML without
 * changing any code.
 *
 * PHP Version 5.3
 *
 * @category Clickatell
 * @package  Clickatell\Test\Cases\Api
 * @author   Chris Brand <chris@cainsvault.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/arcturial
 */
namespace Clickatell\Test\Cases\Api;

// Add's an autoloader to load test dependencies
require_once __DIR__ . "/../../autoload.php";

use \PHPUnit_Framework_TestCase as PHPUnit_Framework_TestCase;
use Clickatell\Exception\Diagnostic as Diagnostic;

/**
 * Test Suite for testing the API calls on the
 * XML API interface.
 *
 * @category Clickatell
 * @package  Clickatell\Test\Cases\Api
 * @author   Chris Brand <chris@cainsvault.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://github.com/arcturial
 */
class XmlTest extends PHPUnit_Framework_TestCase
{
    /**
     * The transport object used, Instance of XML API
     * @var Clickatell\Api\Xml
     */
    private $_transport = null;

    /**
     * Create a result packet. The result is formed
     * like Clickatell would form it.
     *
     * @param array $param Parameters to create
     *
     * @return string
     */
    private function _createResult(array $param)
    {
        $result = "<clickAPI>";
        $result .= "<response>";

        foreach ($param as $key => $val) {
            $result .= "<".$key.">".$val."</".$key.">";
        }

        $result .= "</response>";
        $result .= "</clickAPI>";  

        return $result;
    }

    /**
     * Setup some default behaviour. We want
     * to mock the curl dependency
     *
     * @return boolean
     */
    public function setUp()
    {
        // Mock the translate interface
        $translate = $this->getMock(
            "Clickatell\Component\Translate\TranslateInterface"
        );

        // Mock only the curl call
        $this->_transport = $this->getMock(
            'Clickatell\Api\Xml',
            array('callApi'),
            array($translate)
        );
    }

    /**
     * Ensures that "sendMsg" XML call is working as 
     * expected and returns the correctly wrapped array 
     * for a successful call.
     *
     * @return boolean.
     */
    public function testSendMessage()
    {
        $to = array(12345);
        $message = "My Message";
        $apiMsgId = "1234567890";

        $this->_transport->expects($this->once())
            ->method('callApi')
            ->will(
                $this->returnValue(
                    $this->_createResult(
                        array('apiMsgId' => $apiMsgId)
                    )
                )
            );

        $result = $this->_transport->sendMessage($to, $message);
        
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['result']['response']['apiMsgId']));
        $this->assertSame($apiMsgId, $result['result']['response']['apiMsgId']);
    }


    /**
     * Ensures that "getBalance" XML call is still working the way it should.
     *
     * @return boolean
     */
    public function testGetBalance()
    {
        $balance = 5;

        $this->_transport->expects($this->once())
            ->method('callApi')
            ->will(
                $this->returnValue(
                    $this->_createResult(
                        array('ok' => $balance)
                    )
                )
            );

        $result = $this->_transport->getBalance();
        
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['result']['response']['balance']));

        $this->assertSame(
            (float) $balance, $result['result']['response']['balance']
        );
    }

    /**
     * Ensures that "queryMsg" XML call is still working as expected and returns the
     * results we want.
     *
     * @return boolean
     */
    public function testQueryMessage()
    {
        $status = "001";
        $status_msg = Diagnostic::getError($status);
        $apiMsgId = "1234567890";

        $this->_transport->expects($this->once())
            ->method('callApi')
            ->will(
                $this->returnValue(
                    $this->_createResult(
                        array('apiMsgId' => $apiMsgId, 'status' => $status)
                    )
                )
            );

        $result = $this->_transport->queryMessage($apiMsgId);
        
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['result']['response']['apiMsgId']));
        $this->assertTrue(isset($result['result']['response']['status']));
        $this->assertTrue(isset($result['result']['response']['description']));
        $this->assertSame($apiMsgId, $result['result']['response']['apiMsgId']);
        $this->assertSame($status, $result['result']['response']['status']);
        $this->assertSame($status_msg, $result['result']['response']['description']);
    }

    /**
     * Tests the "routeCoverage" XML call and ensures the 
     * response is wrapped correctly.
     *
     * @return boolean
     */
    public function testRouteCoverage()
    {
        $message = "My Message";
        $msisdn = "27721234567";
        $charge = 1;

        $this->_transport->expects($this->once())
            ->method('callApi')
            ->will(
                $this->returnValue(
                    $this->_createResult(
                        array('ok' => $message, 'charge' => $charge)
                    )
                )
            );

        $result = $this->_transport->routeCoverage($msisdn);
        
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['result']['response']['charge']));
        $this->assertTrue(isset($result['result']['response']['description']));
        $this->assertSame((float) $charge, $result['result']['response']['charge']);
        $this->assertSame($message, $result['result']['response']['description']);
    }

    /**
     * Tests the "getMsgCharge" XML call.
     *
     * @return boolean
     */
    public function testMessageCharge()
    {
        $status = "001";
        $status_msg = Diagnostic::getError($status);
        $charge = 1;
        $apiMsgId = "1234567890";

        $this->_transport->expects($this->once())
            ->method('callApi')
            ->will(
                $this->returnValue(
                    $this->_createResult(
                        array(
                            'apiMsgId' => $apiMsgId, 
                            'status' => $status, 
                            'charge' => $charge
                        )
                    )
                )
            );

        $result = $this->_transport->getMessageCharge($apiMsgId);
        
        $this->assertTrue(is_array($result));
        $this->assertTrue(isset($result['result']['response']['apiMsgId']));
        $this->assertTrue(isset($result['result']['response']['status']));
        $this->assertTrue(isset($result['result']['response']['description']));
        $this->assertTrue(isset($result['result']['response']['charge']));
        $this->assertSame($apiMsgId, $result['result']['response']['apiMsgId']);
        $this->assertSame($status, $result['result']['response']['status']);
        $this->assertSame($status_msg, $result['result']['response']['description']);
        $this->assertSame((float) $charge, $result['result']['response']['charge']);
    }
}