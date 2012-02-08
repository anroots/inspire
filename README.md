Inspire
=======

Inspire is a small web-app for improvisers _(improvisational theatre practitioners)_.
The app has a list of word categories and can generate random words suitable for scene beginnings.

Features
--------

* Clean and simple design and GUI
* Generate random words with the press of a button
* Uses internal database and dictionary file(s)
* I18n support
* RESTful API
* Unlimited word/lang categories
* Default word database contains words suitable for improvisation
* Visitors can submit their own words
* Bulk file adding from .txt files

Installation
=============

Change settings in _application/bootstrap.php_ and files in the _application/config_ to your needs. Default user account for the admin panel
must be created manually in PMA. Generate the password (after setting your auth key) by calling echo Auth::instance()->hash('MYPASS'); in one of the controllers.

Dependencies
-------------

* Kohana 3.2: The default configuration assumes _/var/www/kohana/3.2/_ folder to exist, _system_ and _modules_ folders should be present.
* Dependency: Kohana Commoneer module: https://github.com/anroots/kohana-commoneer


Development
===========

Created by Ando Roots for Improgrupp Jaa! (http://jaa.ee).
Feel free to fork it, contributions (pull requests) and ideas are always welcome.

Licence
=======

Copyright 2012 Ando Roots

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

 http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.