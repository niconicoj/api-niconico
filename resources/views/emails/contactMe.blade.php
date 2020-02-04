<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
        <p>nom : {{$contact->name}}</p>
        <p>mail : {{$contact->mail}}</p>
        <p>message : </p>
        <p>{{$contact->message}}</p>
    </body>
</html>
