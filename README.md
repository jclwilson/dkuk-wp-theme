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
2. Run `npm install` to install all development dependencies.
    * Production dependencies are currently bundled at a fixed version.
    * This also runs the scripts that create the `dist` bundle, including the zipped theme file.

## development

### npm Commands

Below is  a list of some of the most useful basic npm script commands.

* `npm run build`
  * Builds the `dist` directory using the current code in the `src` directory.
* `npm run zip`
  * Runs `npm run build` before zipping the contents of the `dist` directory into a installable WordPress theme ZIP file.
* `npm run server:start`
  * Starts running the local development server.
  * automatically run when using `npm run build`
* `npm run server:stop`
  * Stops running the local development server.
