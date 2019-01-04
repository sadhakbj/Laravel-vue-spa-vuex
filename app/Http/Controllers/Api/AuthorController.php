<?php

namespace App\Http\Controllers\Api;

use App\Author;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * @var Author
     */
    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        $authors = $this->author->all();

        return response()->json([
            'success' => true,
            'data'      => $authors,
        ]);
    }

    /**
     * @param AuthorRequest $request
     */
    public function store(AuthorRequest $request)
    {
        $inputData = $request->all();
        try{
            $author = $this->author->create($inputData);
        } catch (\Exception $exception) {
            logger()->error($exception);

            return response()->json([
                'success' => false,
                'message' => 'Unable to create new author.'
            ]);
        }
        
    }
}
