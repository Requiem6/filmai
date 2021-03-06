import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Main {

    private static final int TIME_OUT_IN_SECONDS = 2;

    public static void main(String[] args) {
        System.setProperty("webdriver.chrome.driver",
                "C:\\Users\\moksleivis\\Desktop\\Selenium-darbas\\bing-baranauskas\\dependencies\\chromedriver.exe");

        WebDriver browser = new ChromeDriver();
        browser.get("https://www.bing.com/");

        String fieldQuery = "Baranauskas";

        WebElement searchField = browser.findElement(By.className("b_searchbox"));
        waitForElementByClassName(browser, "b_searchbox");
        searchField.sendKeys(fieldQuery);
        searchField.sendKeys(Keys.ENTER);

        WebElement searchButton = browser.findElement(By.id("sb_form_go"));
        waitForElementById(browser, "sb_form_go");
        //searchButton.click();

        WebElement resultCount = browser.findElement(By.xpath("//*[@id=\"b_tween\"]/span"));
        waitForElementByXpath(browser, "//*[@id=\"b_tween\"]/span");
        String resultString = resultCount.getText();
        int searchQueryNumber = Integer.parseInt(resultString.replaceAll("[^0-9]",""));

        System.out.println(searchQueryNumber);

        if(searchQueryNumber > 50000){
            System.out.println("Rašytojas vis dar populiarus");
        } else {
            System.out.println("Baranauskui laikas išnykt");
        }
    }

    private static void waitForElementById(WebDriver browser, String id){
        WebDriverWait waitSubmit = new WebDriverWait(browser, TIME_OUT_IN_SECONDS);
        waitSubmit.until(ExpectedConditions.visibilityOfElementLocated(By.id(id)));
    }

    private static void waitForElementByClassName(WebDriver browser, String classOfElement){
        WebDriverWait waitSubmit = new WebDriverWait(browser, TIME_OUT_IN_SECONDS);
        waitSubmit.until(ExpectedConditions.visibilityOfElementLocated(By.className(classOfElement)));
    }

    private static void waitForElementByXpath(WebDriver browser, String elmXpath){
        WebDriverWait waitSubmit = new WebDriverWait(browser, TIME_OUT_IN_SECONDS);
        waitSubmit.until(ExpectedConditions.visibilityOfElementLocated(By.xpath(elmXpath)));
    }
}

