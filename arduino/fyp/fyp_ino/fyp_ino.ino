#include <LiquidCrystal.h>
#include <Servo.h>
#include <Ethernet.h>
#include <SPI.h>
const String Landloard = "NYP";
const int sensorPin = A0;
Servo myServo;
// room temperature in Celcius
const float baselineTemp = 20.0;
// initialize the library with the numbers of the interface pins
LiquidCrystal lcd(6, 7, 5, 4, 3, 2);

// variable to hold the value of the switchPin
int reply=0;
char server[] = "192.168.1.21"; //ip Address of the server you will connect to

//The location to go to on the server
//make sure to keep HTTP/1.0 at the end, this is telling it what type of file it is
String location = "/chenyu/housestatus.php HTTP/1.0";

IPAddress ip(192, 168, 1, 3); 
// if need to change the MAC address (Very Rare)
byte mac[] = { 0x90,0xA2,0xDA,0x0D,0xF7,0x09}; 
////////////////////////////////////////////////////////////////////////
String pagearduinoValue= "213213" ;
String pageValuecolumn = "pageValue=";
String pageValue;
EthernetClient client;
char inString[32]; // string for incoming serial data
int stringPos = 0; // string index counter
boolean startRead = false; // is reading?

void setup(){
   lcd.begin(16, 2);
  Ethernet.begin(mac,ip);
  Serial.begin(9600);
  delay(1000);
  myServo.attach(9); 
  pinMode(8,OUTPUT);
}

void loop(){
        int sensorVal = analogRead(sensorPin);
  // convert the ADC reading to voltage
  float voltage = (sensorVal/1024.0) * 5.0;
  float temperature = (voltage - .5) * 100;
     reply =connectAndRead().toInt(); //connect to the server and read the output
      // choose a saying to print baed on the value in reply 
      switch(reply){
      case 1:

          myServo.write(0);
           digitalWrite(8,LOW) ;
       lcd.clear();
       lcd.setCursor(0, 0);
      // print some text
      lcd.print("the door status:");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("close");
        delay(1000);
              lcd.clear();
            lcd.setCursor(0, 0);
      // print some text
      lcd.print("the tempreture");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("is: ");
         lcd.print(temperature);
        break;

      case 2:

               myServo.write(0);
           digitalWrite(8,HIGH) ;
                  lcd.clear();
       lcd.setCursor(0, 0);
      // print some text
      lcd.print("the door status:");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("close");
        delay(1000);
              lcd.clear();
            lcd.setCursor(0, 0);
      // print some text
      lcd.print("the tempreture");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("is: ");
         lcd.print(temperature);
        break;
            case 3:
         lcd.print(temperature);
                 myServo.write(90);
           digitalWrite(8,LOW) ;
                  lcd.clear();
       lcd.setCursor(0, 0);
      // print some text
      lcd.print("the door status:");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("open");
        delay(1000);
              lcd.clear();
            lcd.setCursor(0, 0);
      // print some text
      lcd.print("the tempreture");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("is: ");
         lcd.print(temperature);
        break;
            case 4:
                   myServo.write(90);
           digitalWrite(8,HIGH) ;
                  lcd.clear();
       lcd.setCursor(0, 0);
      // print some text
      lcd.print("the door status:");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("open");
        delay(1000);
              lcd.clear();
            lcd.setCursor(0, 0);
      // print some text
      lcd.print("the tempreture");
      // move the cursor to the second line
      lcd.setCursor(0, 1);
        lcd.print("is: ");
         lcd.print(temperature);       
        break;
            default:
            break;

      }
  pageValue =pageValuecolumn+(int)(temperature*100);
  postData();
  delay(1000);
//wait 5 seconds before connecting again
  
}
void postData() {
  // If there's a successful connection, send the HTTP POST request
  if (client.connect(server, 80)) {
    Serial.println("connecting...");

    // EDIT: The POST 'URL' to the location of your insert_mysql.php on your web-host
    client.println("POST /chenyu/insert_mysql.php HTTP/1.1");

    // EDIT: 'Host' to match your domain
    client.println("Host:127.0.0.1");
    client.println("User-Agent: Arduino/1.0");
    client.println("Connection: close");
    client.println("Content-Type: application/x-www-form-urlencoded;");
    client.print("Content-Length: ");
    client.println(pageValue.length());
    client.println();
    client.println(pageValue); 
  } 
  else {
    // If you couldn't make a connection:
    Serial.println("Connection failed");
    Serial.println("Disconnecting.");
    client.stop();
  }
}
String connectAndRead(){
  //connect to the server

  Serial.println("connecting...");

  //port 80 is typical of a www page
  if (client.connect(server, 80)) {
    Serial.println("connected");
    client.print("GET ");
    client.println(location);
    client.println();

    //Connected - Read the page
    return readPage(); //go and read the output

  }else{
    return "connection failed";
  }

}

String readPage(){
  //read the page, and capture & return everything between '<' and '>'

  stringPos = 0;
  memset( &inString, 0, 32 ); //clear inString memory

  while(true){

    if (client.available()) {
      char c = client.read();

      if (c == '<' ) { //'<' is our begining character
        startRead = true; //Ready to start reading the part 
      }else if(startRead){

        if(c != '>'){ //'>' is our ending character
          inString[stringPos] = c;
          stringPos ++;
        }else{
          //got what we need here! We can disconnect now
          startRead = false;
          client.stop();
          client.flush();
          Serial.println("disconnecting.");
          return inString;

        }

      }
    }

  }

}
