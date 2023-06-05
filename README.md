## About This Project

This is a simple implementation of API using Laravel 10.

It uses Open Weather Map's API (https://openweathermap.org/)
to access current weather and weater forecast for a particular
location.

It also uses FourSquare's v3 API (https://foursquare.com/)
to search for venues in a particular area.

It tries to apply the SOLID design principles while also
trying to stay withing the design principle of Laravel.

In the .env file, I added the values for URLs and keys. 
These values is used in \config\services.php. The config values
are used within the service implemention in the code.
I normally do not all the .env file in repositories for security.
I believe that each member of the team should have their own .env
files where sensitive information written both personal for testing
and for a team that has more junior members.

In the Controllers VenueController and WeatherController, 
VenueInterface and WeatherInterface interfaces were injected.
You can see the bindings in the AppServiceProvider class.
Using this approach, it will be easier to swap services in the
future. Let's say, when we choose to transfer resource APIs, 
we can just create a new class that implements one of these interfaces.
The changes to the code will be minimal compared to not implementing
interfaces at all. Minimal code changes and loose coupling ensures
that the code will have lesser bugs and easier to maintain in the long run.
Also in my experience with testing, using interfaces makes it easier to test 
components.

Inside the app\Services directory, I added the 3rd party API requests.
I added subfolders to make the code neater and easier to understand.
Inside each subfolder, I also added a DTO (Data Transfer Object) folder
wherein I stored DTO files to be used in retrieving data from the APIs.
Each object inside implements the DtoInterface which requires the implementing
classes to have a set of data manipulation methods. 
I believe that data restructuring should happen inside these classes.
Each DTO object also extends a baseDTO class. This is used so that the
interfaces doesn't need to know the specific class name of the DTO
that it should return. This supports
the Interface design mentioned about the controllers.

I also used a trait (HttpRequest.php) for code reuse.

## Installation

You can either download the zip version or clone the code from
the repository.

Run "composer install" in the same directory using terminal to
get the vendor folder as it is not included in the repository.

This project is using Laravel's Sail. 
You will need to install Docker in your machine.

You can use "./vendor/bin/sail up" on the terminal to start 
this project on your local machine.

You can use "./vendor/bin/sail down" to stop the project.

## About This Repository

I implemented a simpler git flow for this project using
a branch for each feature that were merged directly into the main branch.

