# ClassAttendance
Used to monitor class attendance. Students check into class by scanning RFID chips over raspberry pi

### DESCRIPTION ####
The raspberry pi is on a loop, detecting RFID chips. When one is detected, it gathers the data for that RFID code and sends it to 
checkIn.php. This php file puts the data into the json file of the current date. If there is not a file for that day yet, it creates one.
The a3.html file displays the data of whichever date is selected.

### WHAT I LEARNED ###
I learned how to how to create detect and create new json files through php. I also learned how to select different json files through
javascript ajax requests. 
