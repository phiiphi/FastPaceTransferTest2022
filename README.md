Name: Robert Baidoo
Email: Kofibaidoo1993@gmail.com
Phone: +233555060676
Position: Software Engineer

## FastPaceTransferTest 2022

This is web based REST API created in [Laravel](https://laravel.com/) that perform CRUD (CREAT, READ, UPDATE DELETE) functionality on various types of models. The project is seeded with database seeder which contains super admin resposible for creating or registering subsequent admins. The admin on the other hand can perform all CRUD functions except CRUD functionality on creating other Admins or users, this task is only reserved from the super admin. The project is also seeded with various questions to enhance easier testing using [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/).

---

![Default Users Seeders screenshot](https://drive.google.com/uc?export=view&id=1blmwLQCe2ZwXAnWn2C4BY8TOyC3ip4A7)

The following API link can be copied for testing using [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/).
## PUBLIC API's ROUTES
**HTTP METHOD**: `GET`
-   See all Questions; Copy `http://127.0.0.1:8000/api/questions`

**HTTP METHOD**: `POST`
-   Login; Copy `http://127.0.0.1:8000/api/login`
-   Student Registration;Copy:`http://127.0.0.1:8000/api/register`

## PROTECTED API's ROUTES

**HTTP METHOD**: `GET`

-   Get all questions; Copy `http://127.0.0.1:8000/api/admin`
-   Get all students answereds to question based on question number; Copy:`http://127.0.0.1:8000/api/students/answer/1`
-   Show question based on id; Copy:`http://127.0.0.1:8000/api/questions/1`

**HTTP METHOD**: `POST`
-   Create Questions; Copy `http://127.0.0.1:8000/api/questions`
-   Logout User; Copy `http://127.0.0.1:8000/api/logout`
-   Register Admin; Copy`http://127.0.0.1:8000/api/admin/register`

**HTTP METHOD**: `PUT`
-   admin to update question; Copy `http://127.0.0.1:8000/api/questions/1`
-   students to answer questions based on id Copy `http://127.0.0.1:8000/api/answer/1`

**HTTP METHOD**: `DELETE`

-   Admin Delete question `http://127.0.0.1:8000/api/questions/1`
-   Super admin to delete user/admin `http://127.0.0.1:8000/api/admin/delete/1`

## Usage

This is not a package - it's a full [Laravel](https://laravel.com/) web API with CRUDS functionality.

-   Clone the repository with `git clone`
-   Create `.env` file by using the terminal command `touch .env`
-   Copy `.env.example` file to `.env` and edit database credentials there
-   Run `composer install`
-   Run `php artisan key:generate`
-   Run `php artisan migrate --seed` (it has some seeded data - see below)
-   **Super Admin Logins** Email: `admin@fastpacetransfer.com` - Password:`password`
-   **Students Logins**: Email: `johnDoe@gmail.com.com` - Password:`password`


This boilerplate has one role (`Super Administrator`), who can create other Admins and three pre-populated students users. It also have pre-populated **one** question answered by **three** students

## Images of some API's links tested using Postman

![User Login After Registration](https://drive.google.com/uc?export=view&id=13WzPUbPsTry3HbONQp40fnrGeuSlieNl)

![Admin trying to Create User which Only Super Admin can do](https://drive.google.com/file/d/1DZ7hDkTNIlM_QMLTjeBpS-tjQkVC54OS/edit)

![User Password hashed with Bycrypt to prevent reverse engineering if access by unauthorised user](https://drive.google.com/uc?export=view&id=1ul2uGp_4Ww9UKqGb6XKZJvlDh9hFBHZH)

## License

The [MIT license](http://opensource.org/licenses/MIT).

## Notice

The **Super Admin** is given priviledge to all CRUD functionality of all aspects of the system, whereras **Admin** created by the super admin have restricted **priviledges** except given by super admin

---
