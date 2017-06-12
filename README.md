Fausto CMS
===================
**Flat-file ultra-simple JSON CMS**

1) Download Fausto CMS
2) Create a config.php
3) Define your content types
4) Enjoy!

----------


Content Types
-------------

Define your content types a JSON files. 
Example of hotels.json:

```
{
	"type": "hotels",
	"label": "Hotels",
	"single": "Hotel",
	"icon": "glyphicon-home",
	"multi": true,
	"fields": [
		{"name": "Property ID", "id": "prop-id", "type": "number", "index": true, "list": true},
		
		{"name": "Name", "id": "name", "type": "text", "hint": "Complete porperty name", "list": true},

		
		{"name": "Picture", "id": "picture", "type": "url", "hint": "Image URL"},
		{"name": "Address", "id": "address", "type": "text"},
		{"name": "Description", "id": "description", "type": "multiline"},
		{"name": "Stars", "id": "stars", "type": "number"},

		{"name": "Photos", "id": "photos_url", "type": "url"},
		{"name": "Videos", "id": "videos_url", "type": "url"},
		{"name": "View More", "id": "view_more_url", "type": "url"},
		{"name": "Book Now", "id": "book_now", "type": "url"},

		{"name": "Country", "id": "country", "type": "text"},
		{"name": "State", "id": "state", "type": "text"},
		{"name": "City", "id": "city", "type": "text"}
		
	]
}
```

Add your data
-------------
Login to Fausto (using your config.php defined user and password) and you will see in the topbar the links to edit your content types.

EndPoints
-------------

Now you can access http://yourdomain.com/FAUSTO_FOLDER/data.php?get=hotels
