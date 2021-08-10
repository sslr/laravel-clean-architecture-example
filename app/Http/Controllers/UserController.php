<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Models\User;
use Illuminate\Http\Request;

use Onion\Controller\UserDeleteHandler;
use Onion\Controller\UserIndexHandler;
use Onion\Controller\UserPostHandler;
use Onion\Controller\UserStoreHandler;
use Onion\Controller\UserShowHandler;

use Onion\Driver\PostEloquentRepository;
use Onion\Driver\UserEloquentRepository;
use Onion\UseCase\PostService;
use Onion\UseCase\UserService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Response((new UserIndexHandler(new UserService(new UserEloquentRepository())))->handle($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\UserPostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostRequest $request)
    {
        return Response((new UserStoreHandler(new UserService(new UserEloquentRepository())))->handle($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Response((array)(new UserShowHandler(new UserService(new UserEloquentRepository())))->handle($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Response((new UserDeleteHandler(new UserService(new UserEloquentRepository())))->handle($request));
    }

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function userPostsIndex(Request $request)
    {
        return Response((new UserPostHandler(new PostService(new PostEloquentRepository())))->handle($request));
    }

}
