# DofusAPI - News RSS
* Edit C.RSS_LINK : 
	```
	C.RSS_LINK = String("http://mysite.com/api/rss/rss.game.%CMNTT%.xml");
	```

* Database :
	* Table name : **rss**
	* Fields :
		* title : News tite
		* link : The URL that will be opened on click.
		* icon : Icon display in client
		* cmntt : Community (fr, en, es ...)
		* created_at : Creation date (autoupdate)
		* updated_at : Updated date (autoupdate)
