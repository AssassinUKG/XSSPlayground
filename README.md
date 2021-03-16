# XSSPlayground

A simple place to learn XSS.
Made for myself to learn and to help others (please do use!)

## Disclaimer

This is a works in progress and will change over time. Learn what you can! 

## Updates

15/03/2021 - Added new layout, reworked xss 1,2,3.

## Screenshots

![](/assets/xss.png)

## Setup

Host php

1. Download the index.php file.
2. Add to your /var/www/html folder

*Tip: Make a new folder called 'xss' eg: /var/www/html/xss*

3. Run the php local server
*Have php installed so you can use php in terminal, then start a local server*

```
php -S 127.0.0.1:8000
```

4. Visit the page at http://127.0.0.1:8000/xss/index.php and start testing! 

Host xampp

1. Download the index.php file.
2. Add to your /var/www/html folder or /var/www/html/xss
3. Start xampp server, goto http://127.0.0.1/index.php or http://127.0.0.1/xss/index.php

---

# What is XSS?

Cross-site scripting (XSS) is a web security vulnerability. It that allows an attacker to compromise the interactions that users have with a vulnerable application. Allowing for various attack types (steal cookies, make user accounts (auth permitting) etc)

## Types of XSS

- **Reflected XSS**

This is when the exploits come from the current http request being made (reflected in response)

[More Info](https://portswigger.net/web-security/cross-site-scripting/reflected)
 

- **Stored XSS**

When the exploits are stored in the servers database, accessed on page load or content loading on the website. 

[More Info](https://portswigger.net/web-security/cross-site-scripting/stored)


- **Dom based XSS**

When the expliot is done on the client side ranter then the server. (change the webpage, inject hidden elements etc)

[More Info](https://portswigger.net/web-security/cross-site-scripting/dom-based)

    
    
## Great links (learn)
[Google Gruyer xss](http://google-gruyere.appspot.com/)


## Great links (challanges)

[Xss game pwnfunction - v.good]https://xss.pwnfunction.com/
[xss training]https://xss.challenge.training.hacq.me/
[xss game]http://xss-game.appspot.com/
[xss sudo]http://www.sudo.co.il/xss/

## Great links (cheatsheets)
[Portswigger Cheatsheet](https://portswigger.net/web-security/cross-site-scripting/cheat-sheet)
