<?php

namespace App\Http\Controllers;

use App\Models\bookmarks;
use App\Http\Requests\StorebookmarksRequest;
use App\Http\Requests\UpdatebookmarksRequest;

class BookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebookmarksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bookmarks $bookmarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bookmarks $bookmarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebookmarksRequest $request, bookmarks $bookmarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bookmarks $bookmarks)
    {
        //
    }
}
