<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Author;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the authors microservices
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return the list of authors
     * @return Illuminate\Http\Response
     */
    public function index() 
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create one new author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        return $this->successResponse($this->authorService->createAuthors($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one author
     * @return Illuminate\Http\Response
     */
    public function show($author) 
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    /**
     * Updates an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author) 
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(), $author));
    }

    /**
     * Removes an author
     * @return Illuminate\Http\Response
     */
    public function destroy($author) 
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
