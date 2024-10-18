<?php

namespace App\Http\Controllers\Api;

//import model Post
use App\Models\Guru;

use App\Http\Controllers\Controller;

//import resource PostResource
use App\Http\Resources\GuruResource;

class GuruController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all gurus
        $gurus = Guru::latest()->paginate(5);

        //return collection of posts as a resource
        return new GuruResource(true, 'List Data Gurus', $gurus);
    }
}