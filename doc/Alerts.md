# DofusAPI - Alerts
* Edit C.ALERTY_LINK : 
	```
	C.ALERTY_LINK = String("http://mysite.com/api/alert.%CMNTT%.xml");
	```

* Database :
	* Table name : **alerts**
	* Fields :
		* title : Alert title
		* ignore_versions : Game versions that will not display this alert. Separate them with a |
		* content : Alert content
		* cmntt : Community (fr, en, es ...)
		* created_at : Creation date (autoupdate)
