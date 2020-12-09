# InnoSensors Civic Hackathon 2020 Submission

This repository containst the code of team InnoSensors submission in in the Civic Hackathon Pakistan 2020. To reiterate, the problem statement and the solution is as follows.

## Problem
Crop health monitoring is plagued with dearth of data, a situation made worse by barriers of relevant institutions limiting accessibility, not only leading to inaccuracies in analysis, research, predictions but also reducing the timeliness of data.

## Solution
In order to increase the data pool, we propose an in house IoT solution created using off the shelf sensors. This hardware would provide data on intervals that can be decided by the user. Furthermore, as the components are low cost and small in size, the solution is economically feasible to be implemented in fields. Thus, we will be creating IoT devices to monitor the real time levels of gases in the atmosphere, air temperature, humidity levels as well as the soil temperature and moisture. These will then be deployed in test fields and the data will be transferred on defined intervals to a web portal, accessible from anywhere at any time. An IoT based solution can provide critical information in a timely and mobile manner as well as improve independence from third party data sources when our devices would be utilized.

# Submission Details
The submission is divided into four sub folders that are visible in the list above. The details are as follows:

### Images
This subfolder contains the images of our inhouse solution deployed at NARC wheat crop fields. 

### Arduino
This subfolder contains the code for the micro controllers that have been deployed at NARC Wheat crop research fields. There are 9 nodes in total( 1 Master and 8 Slaves) powered by solar energy, which send the data to the webportal at 10 seconds interval. The data consists of air moisture, air temperature, soil moisture and soil temperature. The composition of gases is also being detected and uploaded. 

### Webportal
This subfolder contains the code for the webportal that is relevant to our submission at hackathon. The webportal itself is a long term project of ours, and a part of it was submitted in the hackathon. NUST servers are utilized at the backend for processing and storage purposes. The website itself has been built using Sufee HTML5 template. 
The link will direct you directly to the data that is being sent to us by our sensors: http://111.68.101.17/tables-dataview.php

### Forecasting
This subfolder contains a data file and a python notebook, showcasing the relevancy of our work for the forecasting of air and soil properties for the next 7 hours or 7 days, as per farmer/researcher requirements. This model, after further refinement, will be integrated with our webportal. 
