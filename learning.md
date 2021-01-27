1.Сущность User

    таблицы
    1.users
    -id, uuid, surname, first_name, patronymic, login, password, role(default user), photo
    2.auth_logs
    -id, uuid, user_uuid, token, user_agent
    контроллеры
    -1.RegisterController
    -2.LoginController
    -3.AuthController
    -4.UserController
    middleware
    -1.AuthToken

1.2.Связанные с сущностью User

    -post
    -photo
    -roles

2.Сущность Roles

    таблица roles
    -id, name, slug

3.Сущность Post 

    таблица posts
    -id, uuid, title, description, user_uuid
    контроллеры
    PostController

4.Сущность Photo

    таблица photos
    -id, name
    контроллеры
    PhotoController

