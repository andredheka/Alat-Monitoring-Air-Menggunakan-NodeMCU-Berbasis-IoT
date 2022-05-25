#include <ESP8266WiFi.h> 
#include <ESP8266HTTPClient.h>
#include <LiquidCrystal_I2C.h>

LiquidCrystal_I2C lcd(0x27, 16, 2);

byte sensorInt = 0;
byte flowSensor_pin = D3;

float konst = 4.5;

volatile byte count;
unsigned long oldTime;

float debit_air;
float kec_air;
float flow_mlt;
float total_mili;
float liter;
float total_liter;

//SSID and PASSWORD for the AP (swap the XXXXX for real ssid and password )

const char *ssid     = "AndroidADP_3004"; //nama wifi
const char *password = "andredheka"; //password
const char* id = "32002";
const char* host = "192.168.43.46";

WiFiClient client;
const int httpPort = 80;

void setup() {

  Serial.begin(9600);
  
  lcd.begin();  
  //nyalakan lampu pada lcd
  lcd.backlight();
  Serial.print("Monitoring Meteran Air"); 
  lcd.setCursor(0,0);
  lcd.print("Monitoring");
  lcd.setCursor (0,1);
  lcd.print("Meteran Air");
   
  delay(10);
  
  pinMode(flowSensor_pin, INPUT);
  digitalWrite(flowSensor_pin, HIGH);

  count        = 0;
  debit_air    = 0.0;
  kec_air      = 0.0;
  flow_mlt     = 0;
  total_mili   = 0;
  oldTime      = 0;
  liter        = 0.0;


  attachInterrupt(flowSensor_pin, countPulse, RISING);

  //star koneksi
  Serial.println();
  Serial.println();
  Serial.println("Conection to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) { // Wait for the Wi-Fi to connect
        delay(500);
        Serial.print(".");
    }
    Serial.println('\n');
    Serial.println("Wifi Connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP()); // Send the IP address of the ESP8266 to the computer

}


void loop() {
  lcd.begin();  
  //nyalakan lampu pada lcd
  lcd.backlight();

    Serial.print("connecting to ");
    Serial.println(host);
    
  
  if ((millis() - oldTime) > 1000) {
    detachInterrupt(sensorInt);
    debit_air = ((1000.0 / (millis() - oldTime)) * count) / konst;
    kec_air = debit_air;
    oldTime = millis();
    flow_mlt = (debit_air / 60) * 1000;
    total_mili += flow_mlt;
    total_liter = total_mili / 1000;
    liter = total_liter;


    //menampilkan di serial monitor
    
    Serial.print("Debit Air: ");
    Serial.print(int(kec_air));
    Serial.println(" mL/sec");
    
    Serial.print("Jumlah Liter : ");
    Serial.print(liter);
    Serial.println(" Liter");

    //menampilkan di lcd
    
    lcd.setCursor (0,0);
    lcd.print("Deb.Air:");
    lcd.print(int(kec_air));
    lcd.println(" mL/sec");

    lcd.setCursor (0,1);
    lcd.print("Jml.Air:");
    lcd.print(total_liter);
    lcd.println(" L   ");  
  }

    // mengirim ke database
    
    String url;
    HTTPClient http;  
    url ="http://192.168.43.46/projekTA/kirim_sensor.php?";
    url += "&id=";
    url += id;
    url += "&kec_air=";
    url += kec_air;
    url += "&total_liter=";
    url += total_liter;

    http.begin(url);
    http.GET();
    http.end();

    //Serial.println(id);
    // Serial.println("Connected to server");

    count = 0;
    attachInterrupt(sensorInt, countPulse, FALLING);
  }

void countPulse(){
  count++;
}
