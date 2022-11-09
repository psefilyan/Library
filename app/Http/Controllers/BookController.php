<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Author;
use App\Http\Controllers\ApiController;

use function PHPUnit\Framework\isEmpty;

class BookController extends ApiController
{
    public function search(SearchRequest $request){

   $result = Author::join('books','book_id','books.id')->where('name','LIKE','%'.$request['name'].'%')->orWhere('surname','LIKE','%'.$request['name'].'%')->orWhere('title','LIKE','%'.$request['name'].'%')->paginate(16,['title','name','surname']);
   if(!isEmpty($result))
   return $this->respondSuccess([...$result]);
   else
       return $this->respondNoContent();
    }
}
