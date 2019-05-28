import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;

import static org.junit.Assert.*;

public class SeleniumTest {
    WebDriver browser;

    @Before
    public void setUp() throws Exception {
        System.setProperty("webdriver.chrome.driver",
                "C:\\Users\\moksleivis\\Desktop\\Selenium-darbas\\Selenium5\\libs\\chromedriver.exe");
        browser = new ChromeDriver();

    }
    @Test
    public void InsertNew(){
        browser.get("http://algirdaskuslys.000webhostapp.com/selenium/filmai.php");

        String fieldQuery = "Naujas";
        Selenium.waitForElementById(browser, "sb_form_q");
        WebElement searchField = browser.findElement(By.id("sb_form_q"));
        searchField.sendKeys(fieldQuery);
        searchField.sendKeys(Keys.ENTER);

        Selenium.waitForElementByClassName(browser, "sb_count");


    }

}
    @After
    public void tearDown() throws Exception {
        browser.close();
    }
}