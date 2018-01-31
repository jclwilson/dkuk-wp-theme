# dkuk-wp-theme
The WordPress theme for DKUK Salon, London.

[dkuk.biz](http://dkuk.biz)

## Aims

This project needs to address the existing problems:
* The slow loading speed of the site
  * Largely the result of many requests being made.
  * Potentially the result of a number of poorly coded plugins being used.
* The functionality of the backend
  * Particularly the ability to add news posts and exhibitions.
* Some front end issues
  * Mobile view
  * Infinite scrolling broken

## Contact

* Jacob Charles Wilson
  * @jclwilson
  * hello@jacobcharleswilson.com

## Installation

* This is designed for a web developer. If you need guidance, use the contact details above.
* The `dist` directory is ignored from this repository, it only exists after building.

### Requirements

* `npm`
* `docker`
* `docker-compose`

1. Run `sudo docker-compose up` to install WordPress and mysql.
    * Afterwards, use `sudo docker-compose stop` or `sudo docker-compose start` to turn the servers on and off, **do not** use ~~`sudo docker-compose down`~~, or you'll delete the data and regret it later!
2. Run `npm install -g` to install all development dependencies globally.
    * Production dependencies are currently bundled at a fixed version.
3. Run `npm run zip` to build the `dist` directory and an installable theme zip file.
    * This runs
