<?php


namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UrlRequest;
use App\Http\Resources\Client\PageResource;
use App\System\Models\Page;
use App\Jobs\PageParse;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function store(UrlRequest $request)
    {
        $page = new Page();
        $page->fill($request->all());
        $page->user_id = $request->user()->id;
        $page->save();
        PageParse::dispatch($page);
        return response()->json($page);
    }

    public function results(int $id)
    {
        $page = Page::findOrFail($id);
        return PageResource::make($page);
    }

	public function pageResults(Request $request)
	{
	    $pages = Page::where('user_id', $request->user()->id)->paginate(getPaginatePerPage());
        return response()->json([
            'items' => $pages->makeHidden('results'),
            'pagination' => $this->pagination($pages),
        ]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Page::findOrFail($id)->delete();
        return response()->json(['message' => 'deleted']);
    }
}