#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

WiFiClient client;

const char* host="http://localhost"; //website that we'll be connecting to
int reading = 0;

void setup()
{
  Serial.begin(115200);
  Serial.println();

  WiFi.begin("lumbergh", "hunterisbusted"); //enter wifi network and password here

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println();

  Serial.print("Connected, IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  
  reading++; //this specifies which reading we're on. It's basically an index
  String ADCData, readingData, postData;
  int AnalogData;
  AnalogData = analogRead(0);
  ADCData = String(AnalogData);//http requests can only process text. Whatever integer value you have needs to be converted to a string
  
  
  readingData = String(reading);
  
 
 if(WiFi.status()== WL_CONNECTED){   //Check WiFi connection status
 
   HTTPClient http;    //Declare object of class HTTPClient

   postData = "reading=" + readingData + "&data=" + ADCData; //create the string that will be sent in the POST request
 
   http.begin("http://192.168.0.179:80/phptesting.php");      //Specify request destination
   //send it to a .php file which can extract data from POST requests.
   
   http.addHeader("Content-Type", "application/x-www-form-urlencoded");  //Specify content-type header
 
   int httpCode = http.POST(postData);   //Send the request
   String payload = http.getString();                  //Get the response payload
 
   Serial.println(httpCode);   //Print HTTP return code
   Serial.println(payload);    //Print request response payload. If you get anything besides '200' something is up.
 
   http.end();  //Close connection
   Serial.print(AnalogData); //send analog data to serial monitor so we can compare it with the results in the database
   //just to make sure everything is consistent.

   delay(750); //How long to wait in between POST requests.
 
 }else{
 
    Serial.println("Error in WiFi connection");   
 
 }
}

