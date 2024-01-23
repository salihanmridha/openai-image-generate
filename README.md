# Project Name - Image generate by OpenAI API and DALL E API

## About the project:
This image generation application utilizes the OpenAI API, specifically the DALL·E model. Users input keywords to generate unique images, with a history of creations available for review. The system crafts prompts for image creation through OpenAI API requests, storing them in a database. The resulting images are archived in either an S3 bucket or public storage, offering flexibility. Users require an OpenAI key for seamless integration, accessible through the platform's free tier.



The objective is to build a simple web application to provide this functionality using the following requirements.

## Requirements:
- The main screen has an input box allowing users to enter keywords.
- Display a list of previously generated images.
- Each item on the list should have a "View" button. Clicking this button will display the image in a larger or more detailed view.
- Upon entering a keyword, the application should generate a prompt using this keyword to create an image via the OpenAI API.
- Utilizing the crafted prompt, the system should dispatch a subsequent request to the DALL·E API to render an image
- Save the constructed prompt to a database
- Archive the resulting image in s3 or public storage


### Prerequisite
- Docker Desktop and Docker compose. Install guide: [Docker Desktop](https://docs.docker.com/desktop/)
- In your host file it might required to add localhost with 127.0.0.1 ip `(127.0.0.1       localhost)`
- The application will run in 8018 port and database will run in 3318 port and php will run in 9018 port. So please make sure these ports are not busy with other application in your local machine.
- It may need to **personal access** token during composer install.


### Installation
- Clone the repository (`https://github.com/salihanmridha/openai-image-generate`) in your project directory.
- Navigate by your command prompt to the project directory where **docker-compose.yml** file exist.
- RUN `docker-compose build && docker-compose up -d` command.

#### Application Installation
- RUN `docker-compose exec backend cp .env.docker .env`
- RUN `docker-compose exec backend composer install`
- RUN `docker-compose exec backend chmod -R 777 /var/www/html/bootstrap`
- RUN `docker-compose exec backend chmod -R 777 /var/www/html/storage`
- RUN `docker-compose exec backend php artisan key:generate`
- RUN `docker-compose exec backend php artisan migrate --seed`
- RUN `docker-compose exec backend php artisan storage:link`
- RUN `docker-compose exec backend php artisan queue:work`
- These commands will create the containers and install the project and run all necessary commands like: composer install, migration, seeder etc.
- If you want to run the applications in different port then please update docker-compose.yml, ./Dockerfile, nginx/default.conf files accordingly. And you might also need to update .env file, if your application not  running on http://localhost:8018
- ##### Update the `OPENAI_API_KEY` and `OPENAI_ORGANIZATION` in .env file which you copied from .env.example
- Now Ready to go. Go to browser and run the application with http://localhost:8018/admin/. This will take you to filament admin login page.


##### Default User
user email: `admin@email.com`

password: `12345678`


## Architecture and Design Pattern
I have chosen to use Service and Factory design pattern in my implementation of the Image generate by OpenAI api project. I also used Actions which actually help my service classes to separate specific action event to an action class.

### Service 

The Service Design Pattern was strategically employed in the project to enhance code organization and maintainability. Various services were implemented to encapsulate specific functionalities, such as OpenAI integration and image processing. This modular approach adheres to the Single Responsibility Principle, ensuring that each service class has a distinct purpose, making the codebase more scalable and maintainable.

### Factory
The Factory Design Pattern was strategically implemented in the project, specifically in the context of storage management, to provide a flexible and extensible solution for handling image storage. The primary motivation behind employing this pattern is to anticipate potential future requirements for different storage options beyond the current choices of S3 and public storage.

By incorporating the Factory Design Pattern, the codebase becomes more adaptable to changes in storage preferences or the introduction of new storage solutions. The factory responsible for managing storage encapsulates the instantiation details, allowing the application to easily switch between storage providers without impacting the overall functionality. This design choice aligns with the Open/Closed Principle, enabling the addition of new storage options through the creation of new factory implementations, without modifying existing code.

### Contact
#### Salihan Mridha
[salihanmridha@gmail.com](mailto:salihanmridha@gmail.com)
