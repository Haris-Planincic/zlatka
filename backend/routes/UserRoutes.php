<?php

Flight::route('GET /users', function () {
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);
    Flight::json(Flight::userService()->getAll());
});

Flight::route('GET /users/@id', function ($id) {
    Flight::json(Flight::userService()->getById($id));
});

Flight::route('POST /users', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->createUser($data));
});

Flight::route('PUT /users/@id', function ($id) {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->update($id, $data));
});

Flight::route('DELETE /users/@id', function ($id) {
    Flight::json(Flight::userService()->delete($id));
});
