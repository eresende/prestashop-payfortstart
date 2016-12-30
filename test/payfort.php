<?php

namespace MyProjectTests;

use \PHPUnit_Framework_TestCase;

class payfort extends PHPUnit_Framework_TestCase {

   /**
    * @var RemoteWebDriver
    */
    protected $webDriver;
    public function setUp() {
        parent::setUp();
        $capabilities    = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = \RemoteWebDriver::create('http://127.0.0.1:4444/wd/hub', $capabilities);
        $this->webDriver->manage()->timeouts()->implicitlyWait(30);
    }
    public function testpayfort() {
        $this->webDriver->get("http://app/");
        $this->webDriver->get("http://app/blouses/2-blouse.html");
        $this->webDriver->findElement(\WebDriverBy::name("Submit"))->click();
        sleep("1000" / 1000);
        $this->webDriver->findElement(\WebDriverBy::linkText("Proceed to checkout"))->click();
        $this->webDriver->findElement(\WebDriverBy::cssSelector(".standard-checkout"))->click();
        $this->webDriver->findElement(\WebDriverBy::id("email"))->click();
        $this->webDriver->findElement(\WebDriverBy::id("email"))->clear();
        $this->webDriver->findElement(\WebDriverBy::id("email"))->sendKeys("de");
        $this->webDriver->findElement(\WebDriverBy::id("email"))->click();
        $this->webDriver->findElement(\WebDriverBy::id("email"))->clear();
        $this->webDriver->findElement(\WebDriverBy::id("email"))->sendKeys("demo@example.com");
        $this->webDriver->findElement(\WebDriverBy::id("passwd"))->click();
        $this->webDriver->findElement(\WebDriverBy::id("passwd"))->clear();
        $this->webDriver->findElement(\WebDriverBy::id("passwd"))->sendKeys("12345678");
        $this->webDriver->findElement(\WebDriverBy::id("SubmitLogin"))->click();
        $this->webDriver->findElement(\WebDriverBy::name("processAddress"))->click();
        if (!$this->webDriver->findElement(\WebDriverBy::id("cgv"))->isSelected()) {
            $this->webDriver->findElement(\WebDriverBy::id("cgv"))->click();
        }
        $this->webDriver->findElement(\WebDriverBy::name("processCarrier"))->click();
        $this->webDriver->findElement(\WebDriverBy::id("click_payfortstart"))->click();
        sleep("1000" / 1000);
        $this->webDriver->switchTo()->frame("beautifulJs");
        sleep("1000" / 1000);
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->sendKeys("4242");
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->sendKeys("4242");
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->sendKeys("4242");
        sleep("1000" / 1000);
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"expiry\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"expiry\"]"))->sendKeys("11");
        sleep("1000" / 1000);
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"expiry\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"expiry\"]"))->sendKeys("20");
        sleep("1000" / 1000);
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"cvc\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"cvc\"]"))->clear();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"cvc\"]"))->sendKeys("123");
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->click();
        $this->webDriver->findElement(\WebDriverBy::xpath("//*[@id=\"number\"]"))->sendKeys("4242");
        $this->webDriver->findElement(\WebDriverBy::xpath("//div/form/div[2]/div[3]/div/button"))->click();
        sleep("5000" / 1000);
        $this->webDriver->get("http://app/order-history");
        sleep("2000" / 1000);
        if (!strstr($this->webDriver->findElement(\WebDriverBy::tagName("html"))->getText(),"Payment accepted")) {
            file_put_contents('php://stderr',"verifyTextPresent failed");
        }
        $this->assertContains("Payment accepted", $this->webDriver->findElement(\WebDriverBy::tagName("html"))->getText());
    }
    public function tearDown() {
        $this->webDriver->close();
        parent::tearDown();
    }
}
