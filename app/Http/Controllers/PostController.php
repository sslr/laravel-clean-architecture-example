<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

use Onion\Controller\PostDeleteHandler;
use Onion\Controller\PostIndexHandler;
use Onion\Controller\PostStoreHandler;
use Onion\Controller\PostShowHandler;

use Onion\Driver\PostEloquentRepository;
use Onion\Driver\PostStaticEloquentRepository;
use Onion\Driver\PostStaticRepository;
use Onion\UseCase\PostService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Response((new PostIndexHandler(new PostService(new PostEloquentRepository())))->handle($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        return Response((new PostStoreHandler(new PostService(new PostEloquentRepository())))->handle($request));
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Response((array)(new PostShowHandler(new PostService(new PostEloquentRepository())))->handle($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Response((new PostDeleteHandler(new PostService(new PostEloquentRepository())))->handle($request));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function staticIndex(Request $request)
    {
        return Response((new PostIndexHandler(new PostService(new PostStaticRepository())))->handle($request));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function staticEloquentIndex(Request $request)
    {
        return Response((new PostIndexHandler(new PostService(new PostStaticEloquentRepository())))->handle($request));
    }


}
