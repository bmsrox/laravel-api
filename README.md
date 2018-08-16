## Building RESTful APIs in Laravel

This is a repo based on linkedin course.

### RUN

    docker-compose up -d
    
### Config Project

Access container API and client-server

    docker container exec -it CONTAINER_NAME bash

run the command for both containers

    composer install

and run the commands into API container

    php artisan migrate:refresh
    php artisan db:seed
    
Creating a Passport Client
    
    php artisan passport:client
    
PS: Answer the shell questions and Set the redirect request using de HOST IP

Copy the client ID and Secret and config the in the Client-Server Project and add the Routes

```
Route::get('/redirect', function () {

    $query = http_build_query([
        'client_id' => 'CLIENT_ID',
        'redirect_uri' => 'http://HOST_IP:8001/callback',
        'response_type' => 'code',
        'scope' => ''
    ]);

    return redirect('http://HOST_IP:8000/oauth/authorize?'.$query);
});

Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('http://HOST_IP:8000/oauth/token', [
        'form_params' => [
            'client_id' => 'CLIENT_ID',
            'client_secret' => 'CLIENT_SECRET',
            'grant_type' => 'authorization_code',
            'redirect_uri' => 'http://HOST_IP:8001/callback',
            'code' => $request->code,
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
}); 
```

Access the address to authenticate

    http://HOST_IP:8001/redirect
    
Copy the access_token and use into your preferable REST Client