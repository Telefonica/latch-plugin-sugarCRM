#LATCH INSTALLATION GUIDE FOR SUGARCRM


##PREREQUISITES 
* SugarCRM version 6.5.

* Curl extensions active in PHP (uncomment "extension=php_curl.dll" or "extension=curl.so" in Windows or Linux php.ini respectively. 

* To get the **"Application ID"** and **"Secret"**, (fundamental values for integrating Latch in any application), it’s necessary to register a developer account in [Latch's website](https://latch.elevenpaths.com"https://latch.elevenpaths.com"). On the upper right side, click on **"Developer area"**.

 
##DOWNLOADING THE SUGARCRM PLUGIN
 * When the account is activated, the user will be able to create applications with Latch and access to developer documentation, including existing SDKs and plugins. The user has to access again to [Developer area](https://latch.elevenpaths.com/www/developerArea"https://latch.elevenpaths.com/www/developerArea"), and browse his applications from **"My applications"** section in the side menu.

* When creating an application, two fundamental fields are shown: **"Application ID"** and **"Secret"**, keep these for later use. There are some additional parameters to be chosen, as the application icon (that will be shown in Latch) and whether the application will support OTP  (One Time Password) or not.

* From the side menu in developers area, the user can access the **"Documentation & SDKs"** section. Inside it, there is a **"SDKs and Plugins"** menu. Links to different SDKs in different programming languages and plugins developed so far, are shown.

* The **“SugarCRM”** button will redirect the user to the GitHub repository with the plugin’s source code. 

* To obtain the plugin and install it, go to the **"release"** section. Next, tap the **"SugarCRM.zip"** button to get the plugin. 


##INSTALLING THE PLUGIN IN SUGARCRM
* Once the administrator has obtained the module, they must access the application as an administrator and go to the **"Admin"** panel.

* From this panel, access the module loader using the **"Module Loader"** link, under the **"Developer Tools"** section.

* From this new window, add the module in the same way it was downloaded, that is, in .zip format.
 
* After it is added, the lower portion of such module will show that it's ready for installation.

* After tapping the **"Install"** button and accepting the license conditions, installation will take place.

* Next, the SugarCRM templates must be rebuilt for the module to function correctly. To do so, the administrator must return to the **"Admin"** panel and tap on the **"Repair**" link.

* From the opened window, tap on the **"Quick Repair and Rebuild"** link to initiate the rebuild.

###Configuring the installed plugin 
* Once the process is completed, SugarCRM will rebuild the application and the Latch module can now be set up. From the **"Admin"** panel tap the new **"Latch Configuration"** link, located in the lower portion.

* In the new window that opens, add the previously created *Application Id* and *Application Secret*.


##UNINSTALLING THE PLUGIN IN SUGARCRM
From the **"Admin"** panel, access the module loader by using the **"Module Loader"** link, and tap the **"Uninstall"** button on the line corresponding to **"Latch Authentication module"**. Next, tap the **"Commit"** button to initiate the uninstallation.
Lastly, to return the application to its previous state the SugarCRM templates must be rebuilt. To do so, the administrator must return to the **"Admin"** panel and tap on the **"Repair"** link, then tap on the **"Quick Repair and Rebuild"** link.


##USE OF LATCH MODULE FOR THE USERS
**Latch does not affect in any case or in any way the usual operations with an account. It just allows or denies actions over it, acting as an independent extra layer of security that, once removed or without effect, will have no effect over the accounts, that will remain with its original state.**

###Pairing a user in SugarCRM
The user needs the Latch application installed on the phone, and follow these steps:

* **Step 1:** Logged in your own  SugarCRM account and go to **"Pair with Latch"**.

* **Step 2:** From the Latch app on the phone, the user has to generate the token, pressing on **“Add a new service"** at the bottom of the application, and pressing **"Generate new code"** will take the user to a new screen where the pairing code will be displayed.

* **Step 3:** The user has to type the characters generated on the phone into the text box displayed on the web page. Click on **"Pair"** button.

* **Step 4:** Now the user may lock and unlock the account, preventing any unauthorized access.

###Unpairing a user in SugarCRM
* The user has to log in to his SugarCRM account and click on the link **“Pair with Latch”**. In the new window the user has to click the **“Unpair“** button. He will receive a notification indicating that the service has been unpaired.




##RESOURCES
- You can access Latch´s use and installation manuals, together with a list of all available plugins here: [https://latch.elevenpaths.com/www/developers/resources](https://latch.elevenpaths.com/www/developers/resources)

- Further information on de Latch´s API can be found here: [https://latch.elevenpaths.com/www/developers/doc_api](https://latch.elevenpaths.com/www/developers/doc_api)

- For more information about how to use Latch and testing more free features, please refer to the user guide in Spanish and English:
	1. [English version](https://latch.elevenpaths.com/www/public/documents/howToUseLatchNevele_EN.pdf)
	1. [Spanish version](https://latch.elevenpaths.com/www/public/documents/howToUseLatchNevele_ES.pdf)

