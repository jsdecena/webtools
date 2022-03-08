# Webtools Health Laravel Example Application

## Install via Docker

- Download and install docker in your system. [Download here](https://www.docker.com/get-started)

- Download composer [here](https://getcomposer.org/doc/00-intro.md) if you haven't

- Run in your root folder `docker-compose up -d` and wait until it finishes

- Run composer install: Go to `<root>/project` and run `composer install`

- Run migration and seeder: Go to `<root>/project` and run `php artisan migrate --seed`

- Copy `.env.example` to `.env`

- Open your browser in [http://localhost:8000](http://localhost:8000)


### Frontend v2 with VueJS

- Go to `/frontend` and run `npm install`

- Then, run `npm run serve`

> SPA is created to simulate the task as the blade curly braces interfere with that of VueJs

### Login Credentials on v1 dashboard

- email: `john@doe.com`
- password: `password`

### Screenshot

#### Login
![login](https://i.imgur.com/qv9Tvth.png)

#### Patients
![login](https://i.imgur.com/O65s7P2.png)

#### Patient profile
![login](https://i.imgur.com/zfZek7c.png)

#### Patient edit
![login](https://i.imgur.com/8CWXjr2.png)
