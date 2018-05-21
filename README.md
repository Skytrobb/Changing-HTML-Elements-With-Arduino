# Changing HTML elements with physical sensors

In this project I wanted to see if it was possible to control different elements of a webpage using analog components.
This is a simple demonstration, only the color of a square is changed however this can be used in many ways. If you 
have a practical use for this feel free to take my code and use it in any way you'd like. The data is in a javascript global variable
so this can be used for any javascript library you can think of. 

## Getting Started

Data is stored in a database with an Arduino behaving like a client. This data is then queried and displayed on a webpage every 750ms
using Jquery and AJAX. I will describe in detail how to get this set up on your machine exactly the way I did. 

### Prerequisites
1. Webserver
2. WiFi enabled Arduino. I use the nodeMCU and have never had any issues with it.
3. Some kind of analog sensor. I used a potentiometer
4. You will need to download the Arduino esp8266Wificlient libraries found here: https://github.com/esp8266/Arduino

### Installing

setup a mysql database called "hydrometer data" with a table called "analogreadings" and two columns called "reading" and "data."

Download the repository and put the .php and .css files in your localhost folder. compile and upload the Arduino code to the nodeMCU
and wire up a potentiometer to the analog 0 pin. Use the serial monitor to make sure all the data is being sent as expected.
Make sure the web server is running

## Using the Website
Access your website with any device and you should see the square on the page change colors as you move the potentiometer.
RGB maxes out at 255 while the potentiometer maxes out at 1024 so color changes will stop happening at about a 1/4th turn.

## Built With

* Jquery
*AJAX


## Contributing
I'm new to web design so I'm sure this project is rife with all kinds of errors. I would love any and all feedback on if this was helpful
for you and what I could improve on for future projects.

## Authors

* **Skyler Robbins**


## Acknowledgments
* Circuits4you.com has a great tutorial on sending POST requests with arduino's. I used most of the code they created for the nodeMCU
 to send data to the server. 

