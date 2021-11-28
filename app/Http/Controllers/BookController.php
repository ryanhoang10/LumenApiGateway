<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;

class BookController extends Controller
{
    use ApiResponser; 
    
    /**
     * Return the list of authors
     * @return Illuminate\Http\Response
     */
    public function index() 
    {

    }

    /**
     * Create one new book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request) 
    {

    }

    /**
     * Obtains and show one book
     * @return Illuminate\Http\Response
     */
    public function show($book) 
    {
        
    }

    /**
     * Updates an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book) 
    {
       
    }

    /**
     * Removes a book
     * @return Illuminate\Http\Response
     */
    public function destroy($book) 
    {
      
    }
}
