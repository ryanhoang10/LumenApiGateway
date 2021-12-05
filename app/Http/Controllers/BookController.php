<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use App\Services\BookService;
use App\Services\AuthorService;

class BookController extends Controller
{
    use ApiResponser; 

     /**
     * The service to consume the books microservices
     * @var BookService
     */
    public $bookService;

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
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService      = $bookService;
        $this->authorService    = $authorService;
    }

    /**
     * Return the list of books
     * @return Illuminate\Http\Response
     */
    public function index() 
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create one new books
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->authorService->obtainAuthor($request->author_id);

        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one books
     * @return Illuminate\Http\Response
     */
    public function show($book) 
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * Updates an existing books
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book) 
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    /**
     * Removes an books
     * @return Illuminate\Http\Response
     */
    public function destroy($book) 
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
